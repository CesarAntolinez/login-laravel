<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompaniasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:company');
    }
    public function index()
    {
        return view('User.Companies.Companies_list', ['companies' => Company::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('User.Companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $compania = new Company();
        $rsp = $request->all();

        $compania->nit = $rsp['nit'];
        $compania->nombre = $rsp['name'];
        $compania->direccion = $rsp['direccion'];

        $compania->save();

        return Redirect('companias')->with('message','Guardado Satisfactoriamente !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compania = Company::find($id);

        return view('User.Companies.edit', ['company' => $compania]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $compania = $request->except(['_token', '_method']);
        Company::where('id', '=', $id )->update($compania);

        return Redirect('companias')->with('message','Editado Satisfactoriamente !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::find($id)->delete();
        return response()->json([ 'message' => 'Compañia Eliminada']);
    }

}
