<!doctype html>
<html lang="en">

<head>
    @include('template.header')
</head>

<body class="bg-gray-100 text-gray-800">
@include('template.navbar')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg p-6 mb-4">
        <h1 class="text-3xl font-bold mb-4">Name: {{ $category->name }}</h1>
        <p class="text-xl mb-2">Code: {{ $category->code }}</p>
        @if ($category->image)
            <div class="mb-4">
                <img class="w-min h-auto rounded-lg" src="{{ asset('storage/' . $category->image) }}" alt="Category Image">
            </div>
        @endif
        <a href="{{ route('category.edit', $category->id) }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">Edit Course</a>
        <form action="{{ route('category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="inline-block bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                Destroy Category
            </button>
        </form>

    </div>
    <div class="h-96 bg-white-100"></div>
</div>
@include('template.footer')
</body>
</html>
