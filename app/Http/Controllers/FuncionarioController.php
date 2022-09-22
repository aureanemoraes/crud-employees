<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\FuncionarioRequest;
use App\Http\Requests\UpdateFuncionarioRequest;
use App\Models\Funcionario;
use App\Services\FuncionarioService;

class FuncionarioController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new FuncionarioService();
    }

    public function index()
    {
        $funcionarios = $this->service->list();

        return view('pages.funcionarios.index', compact('funcionarios'));
    }

    public function create()
    {
        return view('pages.funcionarios.create');
    }

    public function store(FuncionarioRequest $request)
    {
        $this->service->save($request->all());

        return redirect()->route('funcionario.index');
    }

    public function show(Funcionario $funcionario)
    {
        //
    }

    public function edit(Funcionario $funcionario)
    {
        return view('pages.funcionarios.edit', compact('funcionario'));
    }

    public function update(UpdateFuncionarioRequest $request, Funcionario $funcionario)
    {
        $this->service->update($request->all(), $funcionario);

        return redirect()->route('funcionario.edit', $funcionario);
    }

    public function destroy(Funcionario $funcionario)
    {
        $this->service->delete($funcionario);

        return redirect()->route('funcionario.index');
    }
}
