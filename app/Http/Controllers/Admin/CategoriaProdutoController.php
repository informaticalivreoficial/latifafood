<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoriaProdutoRequest;
use App\Services\CategoriaProdutoService;
use Illuminate\Http\Request;

class CategoriaProdutoController extends Controller
{
    protected $categoriaService;

    public function __construct(CategoriaProdutoService $categoriaService)
    {
        $this->categoriaService = $categoriaService;
    }

    public function categorias()
    {
        $categorias = $this->categoriaService->getCategorias();
        return view('admin.cardapio.categorias', [
            'categorias' => $categorias
        ]);
    }

    public function create()
    {
        //
    }

    public function store(CategoriaProdutoRequest $request)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(CategoriaProdutoRequest $request, $id)
    {
        //
    }

    public function delete(Request $request)
    {
        //
    }
    
    public function deleteon(Request $request)
    {
        //
    }
}
