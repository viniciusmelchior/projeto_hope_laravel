<?php

namespace App\Http\Controllers;

use App\Models\Doacao;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\File;

class UsuarioController extends Controller
{
    //
    public function index(){

        if(session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $doacoes = Doacao::where('doador', $user->id)->get();
            $data = [
                'LoggedUserInfo' =>$user,
                'doacoes' => $doacoes
            ];
        }

        return view('usuario.index', $data);
    
    }

    public function deletarConta(){

        $user = User::where('id','=',session('LoggedUser'))->first();
        session()->pull('LoggedUser');
        $user->delete();
        return redirect('/');
    }

    public function editarUsuario(){

        $user = User::where('id','=',session('LoggedUser'))->first();
        $data = [
            'LoggedUserInfo' =>$user
        ];
        return view('usuario.form-usuario-editar', $data);
    }

    public function salvarEdicao(Request $request){
        
        //validar dados
        $request->validate([
            'name' =>'required',
            'email'=>'required|email',
            'age'=>'required',
            'image_profile' =>'mimes:jpg,jpeg,png|max:5048'
        ]);
        
        //dd($request->image_profile);
        //$fileExtension = $request->file('image_profile')->getClientOriginalExtension();
        //dd($fileExtension);

        //$newImageName = time().'-'.$request->name.'.'.$fileExtension;

        if($request->image_profile == ''){
            $newImageName = '';
        } else {
           $newImageName = time().'-'.$request->name.'.'.$request->image_profile->extension();
           $request->image_profile->move(public_path('images'), $newImageName);
        }
       

        //$newImageName = time().'-'.'123'.'.'.$request->image_profile->extension();
        
        
        
        $user = User::where('id','=',session('LoggedUser'))->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->image_path = $newImageName;
        $user->save();
        return redirect('usuario-painel');
       
    }

}
