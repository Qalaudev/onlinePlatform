<?php

namespace App\Services;

use App\Repositories\InterfaceCourseRepository;

class CourseService
{
    protected $courseRepository;

    public function __construct(InterfaceCourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function getAll()
    {
        return $this->courseRepository->getAll();
    }

    public function create(array $data)
    {
        return $this->courseRepository->create($data);
    }

    public function show(int $id)
    {
        return $this->courseRepository->show($id);
    }

    public function update(int $id, array $data)
    {
        return $this->courseRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->courseRepository->delete($id);
    }
}
