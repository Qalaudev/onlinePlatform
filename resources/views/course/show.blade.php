<!doctype html>
<html lang="en">

<head>
    @include('template.header')
</head>

<body class="bg-gray-100 text-gray-800">
@include('template.navbar')
<div class="container mx-auto p-6 max-w-screen-md">
    <div class="bg-white shadow-md rounded-lg p-6 mb-4">
        <h1 class="text-3xl font-bold mb-4">Name: {{ $course->name }}</h1>
        <p class="text-xl mb-2">Price: ${{ $course->price }}</p>
        <p class="text-lg mb-4">Description: {{ $course->description }}</p>

        @if ($course->image)
            <div class="mb-4">
                <img class="w-full h-auto max-w-sm rounded-lg" src="{{ asset('storage/' . $course->image) }}" alt="Course Image">
            </div>
        @endif

        <div class="flex space-x-4">
            <a href="{{ route('course.edit', $course->id) }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition cursor-pointer">
                Edit Course
            </a>

            <form action="{{ route('course.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-block bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition cursor-pointer">
                    Destroy Course
                </button>
            </form>
        </div>
    </div>

    <!-- Placeholder for additional content -->
    <div class="h-96"></div>
</div>
@include('template.footer')
</body>
</html>
