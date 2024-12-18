<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository implements InterfaceCourseRepository
{
    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return Course::all();
    }

    public function create(array $data): Course
    {
        return Course::create($data);
    }

    public function show(int $id): ?Course
    {
        return Course::find($id);
    }

    public function update(int $id, array $data): ?Course
    {
        $course = Course::find($id);
        if ($course) {
            $course->update($data);
            return $course;
        }
        return null;
    }

    public function delete(int $id): bool
    {
        $course = Course::find($id);
        if ($course) {
            $course->delete();
            return true;
        }
        return false;
    }
}
