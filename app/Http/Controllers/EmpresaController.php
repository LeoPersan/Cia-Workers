<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
        $empresas = new Empresa;
        if ($request->has('empresa'))
            $empresas = $empresas->where('nome', 'Like', '%'.$request->input('empresa').'%');
        return view('empresas.index', [
            'empresas' => $empresas->paginate(10),
            'empresa'=>$request->input('empresa')
        ]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('empresas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, (new Empresa)->rules('create'));

		$empresa = Empresa::create(array_merge($request->all(), ['user_id' => \Auth::user()->id]));

		return redirect(route('empresa',[$empresa->id]));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Empresa  $empresa
	 * @return \Illuminate\Http\Response
	 */
	public function show(Empresa $empresa)
	{
		return view('empresas.show', ['empresa' => $empresa]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Empresa  $empresa
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Empresa $empresa)
	{
		return view('empresas.edit', ['empresa'=>$empresa]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Empresa  $empresa
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Empresa $empresa)
	{
		$this->validate($request, $empresa->rules('update'));

		$empresa->fill($request->all());
		$empresa->save();

		return redirect(route('empresas'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Empresa  $empresa
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Empresa $empresa)
	{
		$empresa->delete();

		return redirect(route('empresas'));
	}
}
