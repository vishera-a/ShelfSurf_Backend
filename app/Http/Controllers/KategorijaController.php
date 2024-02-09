<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKategorijaRequest;
use App\Http\Requests\UpdateKategorijaRequest;
use App\Models\Kategorija;
use Illuminate\Http\Request;

class KategorijaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategorije = Kategorija::all();
        return response()->json($kategorije, 200);
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
    public function store(StoreKategorijaRequest $request)
    {
        $kategorijaUnos = Kategorija::create($request->all());

        return response($kategorijaUnos, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($KategorijaID)
    {
        $kat = Kategorija::find($KategorijaID);

        if ($kat == null) {
            return response()->json(['message' => 'Knjiga not found!', 'value' => $kat], 404);
        }

        return response()->json(['kategorija' => $kat], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategorija $kategorija)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategorijaRequest $request, $kategorijaID)
    {
        // \Log::info('id' . $kategorijaID);
        $kategorijaZaIzmenu = Kategorija::find($kategorijaID);



        if ($kategorijaZaIzmenu == null) {
            return response()->json(['message' => 'Knjiga not found!'], 404);
        }

        $kategorijaZaIzmenu->update($request->all());

        return response($kategorijaZaIzmenu, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategorija $kategorija)
    {
        try {
            $kategorija->delete();
            return response()->json(['message' => 'Kategorija successfully deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error deleting kategorija', 'error' => $e->getMessage()], 500);
        }
    }
}
