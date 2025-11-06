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
    public function index(Request $request)
{
    $sortField = $request->input('sort', 'id');
    $sortDirection = $request->input('direction', 'asc');

    $kartings = Karting::orderBy($sortField, $sortDirection)->get();

    return view('karting.kartings', [
        'kartings' => $kartings,
        'sortField' => $sortField,
        'sortDirection' => $sortDirection,
        'buscar' => '',
    ]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karting.form', ['karting' => new Karting()]);
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
        return redirect('/kartings')->with('status', 'Karting agregado con éxito');
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
        return view('karting.form')->with('karting',$karting);
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
        return redirect('/kartings')->with('status', 'Karting modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $karting = Karting::find($id);
       $karting->delete();//se usa eloquent
       return redirect('/kartings')->with('status', 'Karting eliminado con éxito');
    }
    public function buscar(Request $request)
{
    //Parámetros de búsqueda y orden
    $query = $request->input('buscar');
    $sortField = $request->input('sort', 'id'); // Campo por defecto
    $sortDirection = $request->input('direction', 'asc'); // Dirección por defecto

    //consulta
    $kartings = Karting::query();

    // filtra por marca, modelo o tipomotor
    if (!empty($query)) {
        $kartings->where(function($q) use ($query) {
            $q->where('marca', 'LIKE', "%{$query}%")
              ->orWhere('modelo', 'LIKE', "%{$query}%")
              ->orWhere('tipo_motor', 'LIKE', "%{$query}%");
        });
    }

    //ordenamiento
    $kartings = $kartings->orderBy($sortField, $sortDirection)->get();

    
    return view('kartings.karting', [
        'kartings' => $kartings,
        'sortField' => $sortField,
        'sortDirection' => $sortDirection,
        'buscar' => $query,
    ]);
}

}
