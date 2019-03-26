<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;
use App\archivo;
use Carbon\Carbon;

class StorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        Carbon::setlocale('es');
    }

    public function index()
    {   
        $archivos=archivo::all();

        return view('list', compact('archivos'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $archivos=new archivo;

        $archivos->nombres=$request->nombres;
        $archivos->apellidos=$request->apellidos;

        $file=$request->file('file');
        $nombre=time() . $file->getClientOriginalname();

        $url=public_path(). '\storage' . '/' . $nombre;
        $archivos->url=$nombre;

         $archivos->save();

        \Storage::disk('local')->put($nombre,  \File::get($file));

        return redirect()->route('/');
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
        $archivos=archivo::find($id);
       Storage::delete($archivos->url);
        $archivos->delete();
        return redirect()->route('/');
    }

    public function descargar($id)
    {
        $archivos=archivo::find($id);
        $public_path = public_path();
         $url = $public_path.'/storage/'.$archivos->url;
         //verificamos si el archivo existe y lo retornamos
         if (Storage::exists($archivos->url))
         {
           return response()->download($url);
         }
         //si no se encuentra lanzamos un error 404.
         abort(404);
      
        return redirect()->route('/');
    }
}
