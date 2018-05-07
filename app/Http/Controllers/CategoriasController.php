<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    //
    public function index()
    {
        $articulos = Articulo::all();
        return view('colecciones.index', compact('articulos'));
    }

    public function create()
    {
        return view('articulos.create');
    }

    public function show(Categoria $categoria)
    {
        return view('colecciones.show', compact('categoria'));
    }

    public function edit(Articulo $articulo)
    {
        return view('articulos.edit', compact('articulo'));
    }




    public function store()
    {
        //
    }

    public function update(Articulo $articulo)
    {
        //
    }

    public function destroy(Articulo $articulo)
    {
        //
    }
}
