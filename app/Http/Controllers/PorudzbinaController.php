<?php

namespace App\Http\Controllers;

use App\Models\Porudzbina;
use App\Models\StavkaPorudzbine;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Http\Request;

class PorudzbinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getTokenFromRequest(Request $request)
    {
        $authorizationHeader = $request->header('Authorization');

        if ($authorizationHeader && str_starts_with($authorizationHeader, 'Bearer ')) 
        {            
            $tokenString = substr($authorizationHeader, 7);
            $token = PersonalAccessToken::findToken($tokenString);

            if ($token) 
            {
                $user = $token->tokenable;
                return $user;
            } 
            else 
            {
                return null;
            }
        }

        return null; 
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($this->getTokenFromRequest($request))
        {
            $user = $this->getTokenFromRequest($request);
            $ukupnaCena = 0;
            
            $porudzbina = new Porudzbina;
            $porudzbina->id = $user->id;
            $porudzbina->Datum = date('Y-m-d H:i:s');
            $porudzbina->KonacnaCena = 0;
            $porudzbina->save();

            $jsonData = $request->json()->all();
            $itemsJson = $jsonData['items'];

            $itemsArray = json_decode($itemsJson, true);

            foreach($itemsArray as $item)
            {
                $stavkaPorudzbine = new StavkaPorudzbine();
                $stavkaPorudzbine->PorudzbinaID = $porudzbina->PorudzbinaID;
                $stavkaPorudzbine->KnjigaID = $item['id'];
                $stavkaPorudzbine->Kolicina = 1;
                $stavkaPorudzbine->UkupnaCena = $item['price'];

                $ukupnaCena += $item['price'];

                $stavkaPorudzbine->save();
            }

            $porudzbina->KonacnaCena = $ukupnaCena;
            $porudzbina->save();

            return response()->json(['message' => 'Porudzbina je uspesno kreirana!'], 200);
        }
        else
        {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Porudzbina $porudzbina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Porudzbina $porudzbina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Porudzbina $porudzbina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Porudzbina $porudzbina)
    {
        //
    }
}
