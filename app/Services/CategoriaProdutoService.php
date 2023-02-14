<?php

namespace App\Services;

use App\Repositories\CategoriaProdutoRepository;

class CategoriaProdutoService
{
    protected $categoriaRepository;

    public function __construct(CategoriaProdutoRepository $categoriaRepository)
    {
        $this->categoriaRepository = $categoriaRepository;
    }

    public function getCategorias()
    {
       return $this->categoriaRepository->getCategoriasAll();
    }

    // public function getUser($id)
    // {
    //    return $this->userRepository->getUser($id);
    // }

    // public function getTeam()
    // {
    //    return $this->userRepository->getUsersTeam();
    // }

    // public function setStatus(array $data)
    // {
    //     $data = $this->userRepository->userSetStatus($data);
    //     return ['success' => true];
    // }
}