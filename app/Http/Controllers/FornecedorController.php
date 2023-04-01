<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores = ['Fornecedor1'];
         
        return view('admin.fornecedor.index', [
            'fornecedores' => $fornecedores
        ]);
    }
}
