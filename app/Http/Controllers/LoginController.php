<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request){

       //validar request 
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ],[
            'email.required' => 'O campo email é obrigatório',
            'password.required' => 'O campo senha é obrigatório',
            'password.min' => 'O campo senha deve ter no mínimo 5 caracteres',
            'password.max' => 'O campo senha deve ter no maximo 12 caracteres'
        ]);

        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){

                //se passar por usuario e senha, redirecionar para o perfil
                $request->session()->put('LoggedUser', $user->id);
                return redirect('usuario-painel');


            } else {
                return back()->with('fail', 'Email e/ou senha inválidos');
            }
        } else {
            return back()->with('fail', 'Email e/ou senha inválidos');
        }
    }

    public function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/doe-ja');
        }
    }


}
