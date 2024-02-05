<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Response;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'Ime' => ['required', 'string', 'max:30'],
            'Prezime' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'max:255'],
            'Telefon' => ['required', 'string', 'max:30'],
            'Adresa1' => ['required', 'string', 'max:50'],
            'Adresa2' => 'nullable|string', 'max:50',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        if($request->Adresa2 != null && $request->Adresa2 != "")
        {
            $user = User::create([
                'Ime' => $request->Ime,
                'Prezime' => $request->Prezime,
                'email' => $request->email,
                'Telefon' => $request->Telefon,
                'Adresa1' => $request->Adresa1,
                'Adresa2' => $request->Adresa2,
                'password' => Hash::make($request->password),
            ]);
        }
        else
        {
            $user = User::create([
                'Ime' => $request->Ime,
                'Prezime' => $request->Prezime,
                'email' => $request->email,
                'Telefon' => $request->Telefon,
                'Adresa1' => $request->Adresa1,
                'password' => Hash::make($request->password),
            ]);
        }
        
        event(new Registered($user));

        Auth::login($user);

        $token = $user->createToken('api-token');

        return response()->json([
            'user' => $user,
            'token' => $token->plainTextToken,
        ]);
    }
}
