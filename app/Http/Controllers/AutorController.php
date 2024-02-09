<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAutorRequest;
use App\Http\Requests\UpdateAutorRequest;
use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autori = Autor::all();
        return response()->json($autori, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAutorRequest $request)
    {
        $autorUnos = Autor::create($request->all());

        return response($autorUnos, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($AutorID)
    {
        $autor = Autor::find($AutorID);

        if ($autor == null) {
            return response()->json(['message' => 'Knjiga not found!', 'value' => $autor], 404);
        }

        return response()->json(['autor' => $autor], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Autor $autor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAutorRequest $request, $autor)
    {
        //  \Log::info('id' . $autor);
        $autorZaIzmenu = Autor::find($autor);

        if ($autorZaIzmenu == null) {
            return response()->json(['message' => 'Autor not found!'], 404);
        }

        $autorZaIzmenu->update($request->all());

        return response($autorZaIzmenu, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Autor $autor)
    {
        try {
            $autor->delete();
            return response()->json(['message' => 'Kategorija successfully deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error deleting kategorija', 'error' => $e->getMessage()], 500);
        }
    }
}
