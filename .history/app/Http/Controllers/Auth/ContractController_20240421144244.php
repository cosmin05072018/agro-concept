<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use App\Http\Requests\addContractRequest;

class ContractController extends Controller
{
    public function addContractView(){
        return view('auth.addContracts');
    }

    public function addContract(addContractRequest $request){
        dd($request->nume);
    }
}
