<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use App\Http\Requests\RentLevelAndYearRequest;
use App\Models\RentLevel;

class RentLevelController extends Controller
{
    public function rentLevel(){
        return view('auth.rentLevel');
    }

    public function insertRentLevelAndYear(RentLevelAndYearRequest  $request){
        $rentLevel = new RentLevel();
    $rentLevel->nivel_arenda= $request->rentLevel;
    $rentLevel->an = $request->yearSelect;

    // Salvăm modelul pentru a insera datele în baza de date
    $rentLevel->save();
    }
}
