<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function viewUsers() {
        $users = User::where('role', 'user')
                ->orWhere('role', 'kepala_sekolah')
                ->paginate(10);

        return view('dashboard.admin.tabel-user', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.admin.edit-user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:15',
            'role' => 'required|string|in:admin,kepala_sekolah,user',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('admin.tabel-user')->with('success', 'User updated successfully');
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.tabel-user')->with('success', 'User deleted successfully');
    }
}
