<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        ]);

        //User::create($request->all());

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->age =  $request->age;
        $user->cpf = $request->cpf;
        $user->image_path = '';
        $query = $user->save();

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
