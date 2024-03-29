<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKnjigaRequest;
use App\Http\Requests\UpdateKnjigaRequest;
use App\Models\Autor;
use App\Models\Kategorija;
use App\Models\Knjiga;
use App\Models\Izdavac;
use Illuminate\Http\Request;

class KnjigaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $knjige = Knjiga::where(['IsDeleted'=> 0])->get();

        return response()->json([$knjige], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKnjigaRequest $request)
    {
        $knjiga = Knjiga::create($request->all());

        return response($knjiga, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($KnjigaID)
    {
        $knjiga = Knjiga::find($KnjigaID);

        if($knjiga == null)
        {
            return response()->json(['message' => 'Knjiga not found!', 'value' => $KnjigaID], 404);
        }

        $zanr = Kategorija::find($knjiga->KategorijaID);
        $autor = Autor::find($knjiga->AutorID);
        $izdavac = Izdavac::find($knjiga->IzdavacID);

        return response()->json(['knjiga' => $knjiga, 'zanr' => $zanr, 'autor' => $autor, 'izdavac' => $izdavac], 200);   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Knjiga $knjiga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKnjigaRequest $request, $KnjigaID)
    {
        $knjigaZaIzmenu = Knjiga::find($KnjigaID);

        if($knjigaZaIzmenu == null)
        {
            return response()->json(['message' => 'Knjiga not found!'], 404);
        }

        $knjigaZaIzmenu->update($request->all());

        return response($knjigaZaIzmenu, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($knjigaID)
    {
        try 
        {
            $knjiga = Knjiga::find($knjigaID);

            if($knjiga)
            {
                $knjiga->IsDeleted = 1;
                $knjiga->save();

                return response()->json(['message' => 'Knjiga successfully deleted'], 200);
            }

            return response()->json(['message' => 'Knjiga not found!'], 404);    
        } 
        catch (\Exception $e) 
        {
            return response()->json(['message' => 'Error deleting kategorija', 'error' => $e->getMessage()], 500);
        }
    }
}
