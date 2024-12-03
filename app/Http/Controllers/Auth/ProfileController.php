<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Profile\UpdateRequest as ProfileUpdateRequest;
use App\Http\Requests\Auth\UpdateRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function openProfilePage()
    {
        $user = auth()->user();
        return view('auth.profile', compact('user'));
    }
    public function storeProfile(ProfileUpdateRequest $request) {

        $user = auth()->user();

        if (! $request->password) {
            # code...
        }
        return $request->all();
    }
}
