<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karting;
use App\Http\Requests\KartingRequest;
class KartingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kartings=Karting::all();
        return view('karting.kartings')->with('kartings',$kartings);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karting.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KartingRequest $request)
    {
         $kartings=new karting();
        $kartings->marca=$request->get('marca');
        $kartings->modelo=$request->get('modelo');
        $kartings->anio=$request->get('anio');
        $kartings->tipo_motor=$request->get('tipo_motor');
        $kartings->precio_alquiler=$request->get('precio_alquiler');        
        
          if ($request->hasFile('imagen')) {
        $archivo = $request->file('imagen');
        $nombre = time() . '_' . $archivo->getClientOriginalName();
        $archivo->move(public_path('imagenes'), $nombre); // lo guarda en /public/imagenes
        $kartings->imagen = $nombre;
    }
        $kartings->save();//se usa eloquent
        return redirect('/kartings');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $karting=Karting::find($id);
        return view('karting.edit')->with('karting',$karting);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KartingRequest $request, string $id)
    {
        $karting = Karting::find($id);
        $karting->marca=$request->get('marca');
        $karting->modelo=$request->get('modelo');
        $karting->anio=$request->get('anio');
        $karting->tipo_motor=$request->get('tipo_motor');
        $karting->precio_alquiler=$request->get('precio_alquiler');   
         if ($request->hasFile('imagen')) {
        // Eliminar la imagen antigua (si existe)
        if ($karting->imagen && file_exists(public_path('imagenes/'.$karting->imagen))) {
            unlink(public_path('imagenes/'.$karting->imagen));  // Elimina la imagen vieja
        }

        // Subir la nueva imagen
        $archivo = $request->file('imagen');
        $nombre = time() . '_' . $archivo->getClientOriginalName();
        $archivo->move(public_path('imagenes'), $nombre);

        // Guardar el nombre de la nueva imagen
        $karting->imagen = $nombre;
    }     
        $karting->save();//se usa eloquent
        return redirect('/kartings');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $karting = Karting::find($id);
       $karting->delete();//se usa eloquent
       return redirect('/kartings');
    }
}
