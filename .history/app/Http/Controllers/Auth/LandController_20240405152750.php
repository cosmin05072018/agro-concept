<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\addLand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use App\Http\Requests\addLandd;

class LandController extends Controller
{
    public function land(){
        return view('auth.land');
    }

    public function addLand(addLandd $request){
        dd($request);
    }
}
