<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->input('q');

        $users = user::query()
            ->where('id', '!=', Auth::id())
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . "%{$search}%")
                        ->orWhere('name', 'like', "%{$search}%");
                });
            })
            ->take(10)
            ->get();

            return view('users.index', compact('users'));


    }
}
