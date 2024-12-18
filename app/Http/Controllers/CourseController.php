<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Repositories\CourseRepository;
use App\Repositories\InterfaceCourseRepository;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $courseRepository;

    public function __construct(InterfaceCourseRepository $interfaceCourseRepository)
    {
        $this->courseRepository = $interfaceCourseRepository;
    }

    public function index()
    {
        $courses = $this->courseRepository->getAll();
        return view('course.index', ['courses' => $courses]);
    }

    public function create()
    {
        return view('course.create');
    }

    public function store(Request $request)
    {
        // Validate user input
         $request->validate([
             'name' => 'required|string|max:255',
             'price' => 'required|numeric',
             'description' => 'required|string',
             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
         ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        try {
            $this->courseRepository->create([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'image' => $imagePath,
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
        return redirect()->route('course.index')->with('success', 'Course created successfully.');
    }

    public function show(int $id)
    {
        $course = $this->courseRepository->show($id);
        return view('course.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('course.edit', ['course' => $course]);
    }

    public function update(Request $request, Course $course)
    {
        // Validate user input
         $request->validate([
             'name' => 'required|string|max:255',
             'price' => 'required|numeric',
             'description' => 'required|string',
             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
         ]);

        $imagePath = $course->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        try {
            $this->courseRepository->update($course->id,
                [
                    'name' => $request->name,
                    'price' => $request->price,
                    'description' => $request->description,
                    'image' => $imagePath,
                ]
            );
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('course.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        try {
            $this->courseRepository->delete($course->id);
            return redirect()->route('course.index')->with('success', 'Course deleted successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
