<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class FollowController extends Controller
{
    //
    public function store(Request $request,User $user)
    {

        if (Auth::id() === $user->id) {
            return redirect()->back()->with('error', 'No puedes seguirte a ti mismo.');
        }

        if (Auth::user()->following()->where('following_id', $user->id)->exists()) {
            Auth::user()->following()->detach($user->id);
        }
        else {
            Auth::user()->following()->attach($user->id);
        }

        return redirect()->back();

    }
}
