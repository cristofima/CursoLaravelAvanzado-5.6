<?php

namespace App\Http\Controllers;

use App\Genero;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query=Genero::query();
        $query=$query->withCount('peliculas')->orderBy('nombre');  
        if($request->display == "all"){
            $query =$query->withTrashed();
        }else if($request->display == "trash"){
            $query =$query->onlyTrashed();
        }
        $generos = $query->paginate(10);
        return view('panel.generos.index', compact('generos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Genero::withTrashed()->where('idGenero',$id)->forceDelete();
            return redirect('generos')->with('success','Género eliminado permanentemente');
        }catch(Exception | QueryException $e){
            return back()->withErrors(['exception'=>$e->getMessage()]);
        }
    }

    public function restore($id)
    {
        try{
            Genero::withTrashed()->where('idGenero',$id)->restore();
            return redirect('generos')->with('success','Género restaurado');
        }catch(Exception $e){
            return back()->withErrors(['exception'=>$e->getMessage()]);
        }
    }

    public function trash($id)
    {
        try{
            Genero::destroy($id);
            return redirect('generos')->with('success','Género enviado a papelera');
        }catch(Exception $e){
            return back()->withErrors(['exception'=>$e->getMessage()]);
        }
    }
}
