<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\Empresa;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $funcionarios = new Funcionario;
        if ($request->has('empresa'))
            $funcionarios = $funcionarios->whereHas('empresa', function ($query) use ($request) {
                $query->where('nome', 'Like', '%'.$request->input('empresa').'%');
            });
        if ($request->has('funcionario'))
            $funcionarios = $funcionarios->where('nome', 'Like', '%'.$request->input('funcionario').'%');
        return view('funcionarios.index', [
            'funcionarios' => $funcionarios->paginate(10),
            'empresa'=>$request->input('empresa'),
            'funcionario'=>$request->input('funcionario')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $parans = ['empresas'=>Empresa::all()];
        if ($request->has('empresa_id'))
            $parans['empresa_id'] = $request->input('empresa_id');
        return view('funcionarios.create', $parans);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, (new Funcionario)->rules('create'));

        $funcionario = Funcionario::create($request->all());

        return redirect(route('funcionario',[$funcionario->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function show(Funcionario $funcionario)
    {
        return view('funcionarios.show',['funcionario'=>$funcionario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function edit(Funcionario $funcionario)
    {
        return view('funcionarios.edit', ['empresas'=>Empresa::all(),'funcionario'=>$funcionario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        $this->validate($request, $funcionario->rules('update'));

        $funcionario->fill($request->all());
        $funcionario->save();

        return redirect(route('funcionarios'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();

        return redirect(route('funcionarios'));
    }
}
