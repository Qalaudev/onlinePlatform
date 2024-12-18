<!doctype html>
<html lang="en">
<head>
    @include('template.header')
</head>
<body>
@include('template.navbar')
<div class="h-32 bg-white-100"></div>
<div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="max-w-sm mx-auto" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Category</label>
            <input type="text" id="category" name="name"
                   required
                   class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   placeholder="Java"/>
        </div>
        <div>
            <div class="flex items-center justify-between">
                <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Code</label>
            </div>
            <div class="mt-2">
                <input id="code" name="code" required type="text" placeholder="code" autocomplete="code"
                       class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
