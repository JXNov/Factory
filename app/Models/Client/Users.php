<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;

    public function getAllUsers()
    {
        $users = DB::select('SELECT * FROM users');

        return $users;
    }

    public function getUserById(string $id)
    {
        $user = DB::select('SELECT * FROM users WHERE id_user = ?', [$id]);

        return $user;
    }

    public function createUser(array $data)
    {
        $user = DB::insert('INSERT INTO users (name_user, gender_user, dob_user, email_user, pass_user) VALUES (?, ?, ?, ?, ?)', [$data['name'], $data['gender'], $data['dob'], $data['email'], $data['pass']]);

        return $user;
    }

    public function updateUser(array $data, string $id)
    {
        $user = DB::update('UPDATE users SET name_user = ?, gender_user = ?, dob_user = ?, email_user = ?, pass_user = ? WHERE id_user = ?', [$data['name'], $data['gender'], $data['dob'], $data['email'], $data['pass'], $id]);

        return $user;
    }

    public function deleteUser(string $id)
    {
        $user = DB::delete('DELETE FROM users WHERE id_user = ?', [$id]);

        return $user;
    }
}
