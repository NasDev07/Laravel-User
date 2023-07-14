<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $menuUsers = 'active';
        return view('users.index_user', compact('menuUsers', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menuUsers = 'active';
        return view('users.form_user', compact('menuUsers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|confirmed|min:6',
            ]);

            // insert data
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('users.index')->with(['success' => 'User Berhasil disimpan']);
        } catch (Exception $e) {
            return redirect()->back()->with(['failed' => 'Ada kesalahan system']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menuUsers = 'active';
        $edit = User::findOrFail($id);
        return view('users.form_edit', compact('edit', 'menuUsers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'is_admin' => 'required',
            ]);
            $user = User::findOrFail($id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->is_admin = $request->is_admin;

            if ($request->password != "") {
                $user->password = Hash::make($request->password);
            }

            $user->update();

            return redirect()->route('users.index')->with(['success' => 'User berhasil diupdate']);
        } catch (Exception $e) {
            return redirect()->route('users.index')->with(['failed' => 'User gagal diupdate. error: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            $user->delete();
            return redirect()->back()->with(['success' => 'User berhasil dihapus']);
        } else {
            return redirect()->back()->with(['failed' => 'User not found']);
        }
    }
}
