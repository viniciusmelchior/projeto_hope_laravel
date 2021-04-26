<?php

namespace App\Http\Controllers;

use App\Models\Doacao;
use App\Models\Instituicao;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){

        $users = User::all();
        $instituicoes = Instituicao::all();
        $doacoes = Doacao::all();

        return view('admin.index', [
            'users' => $users,
            'instituicoes' => $instituicoes,
            'doacoes' => $doacoes
        ]);
    }
}
