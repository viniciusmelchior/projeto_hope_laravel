<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use App\Models\User;
use Illuminate\Http\Request;

class InstituicaoController extends Controller
{
    public function index(){
        //mostra form
        return view('instituicao.form-cadastro',['title' => 'Cadastrar Instituição']);
    }

    public function cadastrar(Request $request){

        //validar dados
        $request->validate([
            'nome' => 'required',
            'cnpj' => 'required',
            'descricao' => 'required'
        ],
        [
            'nome.required' => 'O campo nome é obrigatorio',
            'cnpj.required' => 'O campo CNPJ é obrigatorio',
            'responsavel.required' => 'O campo responsável é obrigatorio',
            'descricao.required' => 'O campo descricao é obrigatorio'
        ]);

        //pegar id do responsável pela sessão
        $user = User::where('id','=',session('LoggedUser'))->first();
        $responsavel =$user->id;

        $instituicao = new Instituicao();
        $instituicao->nome = $request->nome;
        $instituicao->cnpj = $request->cnpj;
        $instituicao->responsavel = $responsavel;
        $instituicao->descricao = $request->descricao;
        $instituicao->save();

        return redirect('usuario-painel');

    }
}
