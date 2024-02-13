<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class UserController extends Controller
{
    public function GetAdminPanel()
    {
        return view('AdminPanel');
    }

    public function GetUserByID($id)
    {
        $user = User::find($id);

        return response()->json(['user' => $user], 200); 
    }

    public function GetUserDataByToken(Request $request)
    {
        $user = $this->getTokenFromRequest($request);

        return response()->json(['user' => $user], 200); 
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

    public function update(Request $request)
    {
        $user = $this->getTokenFromRequest($request);

        $user->update($request->all());

        return response($user, 200);
    }
}
