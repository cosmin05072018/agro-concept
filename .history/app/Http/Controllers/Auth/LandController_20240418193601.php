<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\addLand;
use App\Models\Teren;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;


class LandController extends Controller
{
    public function land()
    {
        return view('auth.land');
    }

    public function addLand(addLand $request)
    {
        // Curățare și pregătirea datelor pentru inserare în baza de date
        $nameLand = $request->input('nameLand');
        $suprafata = $request->input('suprafata');
        $mentiuni = $request->input('mentiuni');

        // Creare și salvare în baza de date fără utilizarea modelului Validator
        $teren = new Teren();
        $teren->nume_teren = $nameLand;
        $teren->suprafata = $suprafata;
        $teren->mentiuni = $mentiuni;
        $teren->save();

        return redirect()->back();
    }
}
