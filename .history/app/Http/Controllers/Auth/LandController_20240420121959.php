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
        $teren = Teren::all();

        return view('auth.land', ['terenuri' => $teren]);
    }

    public function addLand(addLand $request)
    {
        // Curățare și pregătirea datelor pentru inserare în baza de date
        $nameLand = $request->input('nameLand');
        $judet = $request->input('judet');
        $localitate = $request->input('localitate');
        $mentiuni = $request->input('mentiuni');

        // Creare și salvare în baza de date fără utilizarea modelului Validator
        $teren = new Teren();
        $teren->nume_teren = $nameLand;
        $teren->judet = $judet;
        $teren->localitate = $localitate;
        $teren->mentiuni = $mentiuni;
        $teren->save();

        return redirect()->back();
    }

    public function deleteLand()Ă

}
