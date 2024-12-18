<!doctype html>
<html lang="en">
<head>
    @include('template.header')
</head>
<body>
@include('template.navbar')
<div class="h-32 bg-white-100"></div>
<div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="max-w-sm mx-auto" action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Courses</label>
            <input type="text" id="courses" name="name"
                   required
                   class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   placeholder="Java Spring Boot"/>
        </div>
        <div>
            <div class="flex items-center justify-between">
                <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price</label>
            </div>
            <div class="mt-2">
                <input id="number" name="price" required type="number" placeholder="price" autocomplete="price"
                       class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
        </div>
        <div class="mt-5">
            <div class="flex items-center justify-between">
                <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
            </div>
            <div class="mt-2">
                <textarea id="description" name="description" required type="text" placeholder="description"
                          autocomplete="description"
                          class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </textarea>
            </div>
        </div>
        <div class="mb-5">
            <div class="flex items-center justify-between">
                <label for="Image" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
            </div>
            <div class="mt-2">
                <input type="file" id="file" required name="image" autocomplete="image"
                       class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
        </div>
        <button type="submit"
                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Send
        </button>
    </form>
</div>
<div class="h-96 bg-white-100"></div>
{{--empty spaces--}}
@include('template.footer')
</body>
</html>
