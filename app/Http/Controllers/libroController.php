<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\libro;//importamos  el modelo 
use App\Models\autor;

class libroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros  = libro::all();//traemos todos los reguitros
        $data = [];
        foreach ($libros as $libro) {
            $libro->autor_id=autor::find($libro->autor_id);
            array_push($data,$libro);
        }

        return response()->json(['libros'=>$data],200);
        //primer parametro los datos y de segundo el status
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//metodo crear
    {
        $libro = new libro();// se crea una nueva instancia 
        $libro->titulo = $request->titulo;// asignamos lo valores del request
        $libro->autor_id = $request->autor_id;
        $libro->numero_paginas = $request->numero_paginas;
        $libro->precio = $request->precio;
        $libro->estado = $request->estado;
        

        $libro->save();//se guarda  el reguistro
        return response()->json($libro,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libro = libro::findOrFail($id);
        $libro->autor_id=autor::find($libro->autor_id);
        $data = [
            'libro'=>$libro,
            // 'autor'=>$autor
        ];
        return response()->json($data,200);

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
    public function update(Request $request,$id)
    {
        $libro = libro::find($id);//buscamos el articulo que tenemos
        if ($libro) {
            // $libro->titulo = $request->titulo;// asignamos lo valores del request
            // $libro->autor = $request->autor;
            // $libro->numero_paginas = $request->numero_paginas;
            // $libro->precio = $request->precio;
            // $libro->estado = $request->estado;
            //$libro->save();//se guarda  el reguistro
            $libro->update($request->all());
            
            return response()->json($libro,201);
        }else {
            return response()->json("Error recurso no entontrado",404);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $libro = libro::find($id);//buscamos el articulo que tenemos
        if ($libro) {
            // $libro->titulo = $request->titulo;// asignamos lo valores del request
            // $libro->autor = $request->autor;
            // $libro->numero_paginas = $request->numero_paginas;
            // $libro->precio = $request->precio;
            // $libro->estado = $request->estado;
            //$libro->save();//se guarda  el reguistro
            $libro->estado=false;
            $libro->update();
            
            return response()->json($libro,201);
        }else {
            return response()->json("Error recurso no entontrado",404);
        }
    }
}
