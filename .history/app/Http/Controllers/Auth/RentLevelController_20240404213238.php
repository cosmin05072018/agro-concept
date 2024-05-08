<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use App\Http\Requests\RentLevelAndYearRequest;

class RentLevelController extends Controller
{
    public function rentLevel(){
        return view('auth.rentLevel');
    }

    public function insertRentLevelAndYear(RentLevelAndYearRequest  $request){
        dd($request->rentLevel, $request->yearSelect);
    }
}
