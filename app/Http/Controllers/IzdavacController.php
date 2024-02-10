<?php

namespace App\Http\Controllers;

use App\Models\Izdavac;
use Illuminate\Http\Request;
use App\Http\Requests\StoreIzdavacRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class IzdavacController extends Controller
{
    public function test()
    {
        return view('TestIzdavac');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $izdavaci = Izdavac::where('IsDeleted', 0)->get();

        return response()->json([$izdavaci], 200);
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
    public function store(StoreIzdavacRequest $request)
    {        
        $user = User::create(
            [
                'Ime' => $request->Ime,
                'Prezime' => $request->Prezime,
                'email' => $request->email,
                'Telefon' => $request->Telefon,
                'Adresa1' => $request->Adresa1,
                'Adresa2' => null,
                'password' => Hash::make($request->password),
            ]
        );

        $izdavac = Izdavac::create(
            [
                'Naziv' => $request->Naziv,
                'id' => $user->id,
            ]
        );

        $user->IzdavacID = $izdavac->id;
        $user->save();

        return response($izdavac, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Izdavac $izdavac)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Izdavac $izdavac)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Izdavac $izdavac)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Izdavac $izdavac)
    {
        //
    }
}
