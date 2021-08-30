<?php

namespace App\Http\Controllers;

use App\Mail\UserRegisteredEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegistroController extends Controller
{
    public function index(){
        return view('doe-ja.form-usuario-cadastro', ['title' => 'Cadastro Usuário']);
    }

    public function registrar(Request $request){

        //validando dados do formulário
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12',
            'age'=>'required',
            'cpf'=>'required'
        ],
        [
            'name.required'=>'O campo nome é obrigatório',
            'email.required' => 'O campo email é obrigatório',
            'email.unique' => 'Email digitado já existe em nosso cadastro',
            'password.required' => 'O campo senha é obrigatório',
            'password.min' => 'O campo senha deve ter no mínimo 5 caracteres',
            'password.max' => 'O campo senha deve ter no maximo 12 caracteres',
            'age.required'=>'O campo idade é obrigatório',
            'cpf.required'=>'O campo CPF é obrigatório'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->age =  $request->age;
        $user->cpf = $request->cpf;
        $user->image_path = '';
        $query = $user->save();
        //enviar email de boas vindas
        Mail::to($user->email)->send(new UserRegisteredEmail($user));

        if($query){
           //return back()->with('success', 'Registro realizado com sucesso');
           $request->session()->put('LoggedUser', $user->id);
           return redirect('usuario-painel');
        } else {
            return back()->with('fail', 'Erro no registro');
        }
       
        //salva usuario no banco, faz login e direciona pro painel dele
        
        return redirect()->route('usuario-painel');
    }
}
