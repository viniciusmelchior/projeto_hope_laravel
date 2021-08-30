<?php

namespace App\Http\Controllers;

use App\Models\Doacao;
use App\Models\Instituicao;
use App\Models\User;
use Illuminate\Http\Request;

class DoacaoController extends Controller
{
    //
    public function index(){

        $instituicoes = Instituicao::all();
        return view('doacao.form-doacao', ['instituicoes' => $instituicoes, 'title' => 'doações']);
    }

    public function minhasDoacoes(){

        //enviar dados para view
        if(session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $doacoes = Doacao::where('doador', $user->id)->get();
            $data = [
                'LoggedUserInfo' =>$user,
                'doacoes' => $doacoes
            ];
        }

    return view('doacao.minhas-doacoes', $data);
       
    }

    public function doar(Request $request){
         //validar dados
         $request->validate([
            'instituicao' =>'required',
            'valor'=>'required|numeric|min:1'
         ],
        [
            'instituicao.required' =>'Selecione uma instituição de destino',
            'valor.required'=>'Insira um valor de transferência',
            'valor.min'=>'Valor mínimo R$ 1'
        ]);
        
        //pegar usuario da sessao
        $user = User::where('id','=',session('LoggedUser'))->first();
        $doador =$user->id;

        $doacao = new Doacao();
        $doacao->doador = $doador;
        $doacao->instituicao = $request->instituicao;
        $doacao->valor = $request->valor;
        
        //atualizar dados no banco

        //pegar saldo do usuario e descontar valor
        $saldoUsuario = User::where('id',$doador)->select('saldo')->first('saldo');
        $saldoAtual =   $saldoUsuario->saldo-$doacao->valor;
        User::where('id',$doador)->update(['saldo' => $saldoAtual]);
        
        //pegar valor doado e acrescentar valor doado do usuario
        $totalDoadoAteOMomento = User::where('id',$doador)->select('total_doado')->first('total_doado');
        $totalDoadoAtual = $totalDoadoAteOMomento->total_doado+$doacao->valor;
        User::where('id',$doador)->update(['total_doado' => $totalDoadoAtual]);


        //pegar valor doado e acrescentar no total_arrecadado das instituicoes
        $total_arrecadadoAteOMomento = Instituicao::where('id',$doacao->instituicao)->select('total_arrecadado')->first('total_arrecadado');
        $total_arrecadadoAtual = $total_arrecadadoAteOMomento->total_arrecadado+$doacao->valor;
        Instituicao::where('id',$doacao->instituicao)->update(['total_arrecadado' => $total_arrecadadoAtual]);


        $doacao->save();
        return redirect('usuario-painel');

        //depois de tudo ok aí trabalhar com as validações e respostas de erro
    }
}
