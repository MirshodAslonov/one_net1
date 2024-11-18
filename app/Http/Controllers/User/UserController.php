<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function addUser(Request $request)
    {
        $data = $request->all();
        User::query()->create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'password' => $data['password'],
        ]);

        $users = User::all();
        return view('users_list', ['users' => $users]);
    }

    public function userSearch(Request $request)
    {
        $search = $request->input('query');

        $users = User::query()
            ->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('phone', 'LIKE', "%{$search}%")
                    ->orWhere('created_at', 'LIKE', "%{$search}%");
            })
            ->get();

        return view('users_list', ['users' => $users]);
    }
}
