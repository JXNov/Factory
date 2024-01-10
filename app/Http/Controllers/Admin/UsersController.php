<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UsersExams;
use App\Models\UsersSubjects;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listUsers = User::all();

        return view('admin.users.lists', compact('listUsers'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $getUser = User::findOrFail($id);

        return view('admin.users.show', compact('getUser'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $request->session()->put('id_user', $id);

        $getUser = User::findOrFail($id);

        $listUsers = User::all();

        return view('admin.users.edit', compact('getUser', 'listUsers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = session('id_user');

        $data = $request->all();

        $updateUser = User::findOrFail($id)->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
        ]);

        if ($updateUser) {
            return redirect()->route('admin.users')->with('success', 'User updated successfully');
        } else {
            return redirect()->route('admin.users')->with('error', 'User update failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usersExams = UsersExams::where('user_id', $id)->get();

        foreach ($usersExams as $usersExam) {
            UsersSubjects::deleted($usersExam->id);
        }

        UsersExams::where('user_id', $id)->delete();

        $usersSubjects = UsersSubjects::where('user_id', $id)->get();

        foreach ($usersSubjects as $usersSubject) {
            UsersSubjects::deleted($usersSubject->id);
        }

        UsersSubjects::where('user_id', $id)->delete();

        if (User::findOrFail($id)->delete()) {
            return redirect()->route('admin.users')->with('success', 'User deleted successfully');
        } else {
            return redirect()->route('admin.users')->with('error', 'User deletion failed');
        }
    }
}
