<?php

namespace App\Repositories;

interface InterfaceUserRepository
{
    public function getAll();
    public function findById($id);
    public function createUser(array $data);
    public function updateUser($id, array $data);
    public function deleteUser($id);
}
