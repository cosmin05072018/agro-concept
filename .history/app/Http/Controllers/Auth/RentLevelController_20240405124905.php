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
use Carbon\Carbon;

class RentLevelController extends Controller
{
    public function rentLevel()
    {
        $date = Carbon::now()->format('Y');
        $rentLevel = RentLevel::all()->isEmpty() ? null : RentLevel::all();
        return view('auth.rentLevel', ['rentLevel' => $rentLevel, 'date' => $date]);
    }

    public function insertRentLevelAndYear(RentLevelAndYearRequest  $request)
    {

        $rentLevel = new RentLevel();
        $rentLevel->nivel_arenda = $request->rentLevel;
        $rentLevel->an = $request->an;
        $rentLevel->save();

        return redirect()->back();
    }

    public function deleteRentLevel(Request $request){
        dd($request->id);
    }
}
