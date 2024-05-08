<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use App\Http\Requests\RentLevelAndYearRequest;
use App\Http\Requests\UpdateRentLevel;
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
        $now = Carbon::now()->timezone('Europe/Bucharest');
        $rentLevel->creat_la_data = $now->format('d/m/Y H:i');

        $rentLevel->save();

        return redirect()->back();
    }

    public function updateRentLevel(UpdateRentLevel $request)
    {
        $rentLevel = RentLevel::findOrFail($request->id);

        $data = [
            'nivel_arenda' => $request->valoareNoua
        ];

        $rentLevel->fill($data);
        $rentLevel->save();

        return redirect()->back();
    }

    public function deleteRentLevel(Request $request)
    {
        $rentLevel = RentLevel::find($request->id);

        if ($rentLevel) {
            $rentLevel->delete();
            return redirect()->back();
        }
    }
}
