<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::with('role')->paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validatedUser = $request->validate([
            'first_name' => 'required|max:255',
            'middle_name' => 'nullable',
            'last_name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'mobile_no' => 'nullable|max:11|min:11',
            'username' => 'required|unique:users|max:255',
            'role_id' => 'required',
            'password' => 'required:max:255|confirmed',
        ]);

        $user = User::create($validatedUser);

        session()->flash('notify', ['message' => 'User Profile has been created successfully!', 'type' => 'success']);

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validatedUser = $request->validate([
            'first_name' => 'required|max:255',
            'middle_name' => 'nullable',
            'last_name' => 'required|max:255',
            'email' => 'required|unique:users,email,' . $user->id . '|max:255',
            'mobile_no' => 'nullable|max:11|min:11',
            'username' => 'required|unique:users,username,' . $user->id . '|max:255',
            'role_id' => 'required',
            'status' => 'required',
        ]);

        $user->update($validatedUser);

        return redirect()->route('users.index');
    }

    public function deactivate(User $user)
    {
        $user->deactivate();
    }

    public function reactivate(User $user)
    {
        $user->activate();
    }
}
