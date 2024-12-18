<!doctype html>
<html lang="en">
<head>
    @include('template.header')
    <style>
        .form-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            justify-content: center;
            margin-top: 100px;
        }
    </style>
</head>
<body class="bg-gray-100">
@include('template.navbar')
<div class="py-8">
    <div class="form-container bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('course.update', $course->id )}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Course Name</label>
                <input id="name" name="name" type="text" autocomplete="name" value="{{ $course->name }}" placeholder="Enter course name"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm"
                       required>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input id="price" name="price" type="number" autocomplete="price" value="{{ $course->price }}" placeholder="Enter course price"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm"
                       required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" autocomplete="description" placeholder="Enter course description"
                          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm"
                          required>{{ $course->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Course Image</label>
                <input id="image" name="image" type="file" autocomplete="description"
                       class="mt-1 block w-full text-gray-500 py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm">
            </div>

            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Update Course
            </button>
        </form>
    </div>
</div>
<div class="h-96 bg-white-100"></div>
@include('template.footer')
</body>
</html>
