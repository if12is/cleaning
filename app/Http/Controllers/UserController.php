<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //index
    public function index()
    {
        $users = User::with('subscriptions')
            ->where('role', '!=', 'admin')
            ->orderBy('created_at', 'desc')->get();
        return view('admin.users', compact('users'));
    }
}
