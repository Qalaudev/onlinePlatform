<?php

namespace App\Services;

use App\Repositories\InterfaceUserRepository;
use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;
    public function __construct(InterfaceUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function getAllUser()
    {
        return $this->userRepository->getAll();
    }

    public function findById($id)
    {
        return $this->userRepository->findById($id);
    }

    public function createUser($data)
    {
        return $this->userRepository->createUser($data);
    }
    public function updateUser($data, $id)
    {
        return $this->userRepository->updateUser($data, $id);
    }
    public function deleteUser($id)
    {
        return $this->userRepository->deleteUser($id);
    }

}
