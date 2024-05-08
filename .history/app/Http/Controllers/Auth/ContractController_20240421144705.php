<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use App\Http\Requests\addContractRequest;
use App\Models\Contract;

class ContractController extends Controller
{
    public function addContractView(){
        return view('auth.addContracts');
    }

    public function addContract(addContractRequest $request){

        $contract = Contract::create([
            'nume' => $request->nume,
            'prenume' => $request->prenume,
            'data_incepere' => $request->data_incepere,
            'data_incheiere' => $request->data_incheiere,
            'locul_terenului' => $request->locul_terenului,
            'mentiuni' => $request->mentiuni,
        ]);

        return redirect()->back();
    }
}
