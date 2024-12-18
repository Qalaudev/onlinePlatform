<?php

namespace App\Repositories;

interface InterfaceCourseRepository
{
    public function getAll();
    public function create(array $data);
    public function show(int $id);
    public function update(int $id, array $data);
    public function delete(int $id);
}
