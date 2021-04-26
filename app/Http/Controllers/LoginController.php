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
        ]);

        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){

                //se passar por usuario e senha, redirecionar para o perfil
                $request->session()->put('LoggedUser', $user->id);
                return redirect('usuario-painel');


            } else {
                return back()->with('fail', 'invalid password');
            }
        } else {
            return back()->with('fail', 'nenhuma conta vinculada a este email');
        }
    }

    public function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/doe-ja');
        }
    }


}
