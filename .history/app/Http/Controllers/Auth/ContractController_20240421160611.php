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
use App\Models\Teren;

class ContractController extends Controller
{
    public function addContractView(){
        $terenuri= Teren::all();
        return view('auth.addContracts');
    }

    public function addContract(addContractRequest $request){

         $nume = $request->nume;
         $prenume = $request->prenume;
         $data_incepere = $request->data_incepere;
         $data_incheiere = $request->data_incheiere;
         $locul_terenului = $request->locul_terenului;
         $mentiuni = $request->mentiuni;

         // Creare și salvare în baza de date fără utilizarea modelului Validator
         $contract = new Contract();
         $contract->nume = $nume;
         $contract->prenume = $prenume;
         $contract->data_incepere = $data_incepere;
         $contract->data_incheiere = $data_incheiere;
         $contract->locul_terenului = $locul_terenului;
         $contract->mentiuni = $mentiuni;
         $contract->save();

        return redirect()->back();
    }
}
