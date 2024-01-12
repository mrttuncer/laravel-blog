<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function changeUserRole(RoleRequest $request, $userId)
    {
        $user = auth()->user();

        $targetUser = User::find($userId);
        $targetUser->role = $request->newRole;
        $targetUser->save();
        if ($request->newRole == 'user') {
            return redirect()->route('customer-blogs.index');
        } else {
            return redirect()->route('users');
        }
    }
    public function show(User $user)
    {
        return inertia('Admin/ChangeUserRole', compact('user'));
    }
}
