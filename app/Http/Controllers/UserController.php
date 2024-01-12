<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return inertia('Admin/Users', compact('users'));
        return redirect()->route('blogs.index')->with('success', 'Blog başarıyla oluşturuldu.');
    }
}
