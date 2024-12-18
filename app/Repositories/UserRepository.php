<?php

namespace App\Repositories;

// interface  отвечает с работы данными получение,сохранение;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements InterfaceUserRepository
{
    public function getAll()
    {
        return User::all();
    }
    public function findById($id)
    {
        return User::find($id);
    }
    public function createUser(array $data)
    {
        return User::create(
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::Make($data['password']),
            ]
        );
    }

    public function updateUser($id, array $data)
    {
        $user = User::find($id);
        if ($user) {
            $user->update(
                [
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                ]
            );
            return $user;
        }
        return null;
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user) {
                $user->delete();
            return true;
        }
        return false;
    }
}
