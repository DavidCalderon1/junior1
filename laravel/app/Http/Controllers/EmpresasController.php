<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEmpresasRequest;
use App\Http\Requests\CreateEmpresasRequest;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Empresas;

class EmpresasController extends Controller
{

    /**
     * Display a listing of the Empresas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $empresas = Empresas::all();

        return view('empresas.index')
            ->with('empresas', $empresas);
    }

    /**
     * Show the form for creating a new Empresas.
     *
     * @return Response
     */
    public function create()
    {
        return view('empresas.create');
    }

    /**
     * Store a newly created Empresas in storage.
     *
     * @param CreateEmpresasRequest $request
     *
     * @return Response
     */
    public function store(CreateEmpresasRequest $request)
    {
        $input = $request->all();

        $empresas = Empresas::create($input);

        Flash::success('Empresa creada correctamente.');

        return redirect(route('empresas.index'));
    }

    /**
     * Display the specified Empresas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $empresas = Empresas::find($id);

        if (empty($empresas)) {
            Flash::error('Empresa no encontrada');

            return redirect(route('empresas.index'));
        }

        return view('empresas.show')->with('empresas', $empresas);
    }

    /**
     * Show the form for editing the specified Empresas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $empresas = Empresas::find($id);

        if (empty($empresas)) {
            Flash::error('Empresa no encontrada');

            return redirect(route('empresas.index'));
        }

        return view('empresas.edit')->with('empresas', $empresas);
    }

    /**
     * Update the specified Empresas in storage.
     *
     * @param  int              $id
     * @param UpdateEmpresasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmpresasRequest $request)
    {
        $empresas = Empresas::find($id);

        if (empty($empresas)) {
            Flash::error('Empresa no encontrada');

            return redirect(route('empresas.index'));
        }

        $empresas = $empresas->update($request->all(), $id);

        Flash::success('Empresa actualizada correctamente.');

        return redirect(route('empresas.index'));
    }

    /**
     * Remove the specified Empresas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $empresas = Empresas::find($id);

        if (empty($empresas)) {
            Flash::error('Empresa no encontrada');

            return redirect(route('empresas.index'));
        }

        $empresas->delete($id);

        Flash::success('Empresas eliminada correctamente.');

        return redirect(route('empresas.index'));
    }
}
