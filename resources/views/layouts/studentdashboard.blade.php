<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('content')</title>
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    @livewireStyles()
</head>

<body>
    <!-- component -->
    <div class="min-h-screen flex">
        <div class="py-12 px-10 w-1/4">
            <div class="flex space-2 items-center border-b-2 pb-4">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 text-indigo-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h1 class="text-3xl font-bold text-indigo-600">CLIO</h1>
                    <p class="text-center text-sm text-indigo-600 mt-1 font-serif">DASHBOARD</p>
                </div>
            </div>
            <div class="flex items-center space-x-4 mt-6 p-2 bg-indigo-600 rounded-md">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z" />
                    </svg>
                </div>
                <div>
                    <p class="text-lg text-white font-semibold">Dashboard</p>
                </div>
            </div>
            <div class="mt-8">
                <ul class="space-y-10">
                    <li>
                        <a href="{{ route('student.teacher') }}"
                            class="flex items-center text-sm font-semibold text-gray-500 hover:text-indigo-600 transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 mr-4 text-gray-400 hover:text-indigo-600 transition duration-200"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                            </svg>
                            Teacher and Schedule</a>
                    </li>
                    
                </ul>
            </div>
            <div class="flex mt-20 space-x-4 items-center">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 text-gray-400 hover:text-indigo-600 transition duration-200" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </div>
                <a href="#"
                    class="block font-semibold text-gray-500 hover:text-indigo-600 transition duration-200">Logout</a>
            </div>
        </div>
        <div class="bg-white flex-grow py-12 px-10">
            <div class="flex justify-between">
                <div>
                    <h4 class="text-sm font-bold text-indigo-600">Hi {{ auth()->user()->name }},</h4>
                    <h1 class="text-4xl font-bold text-indigo-900 mt-">Welcome to Clio!</h1>
                </div>
                <div>
                    <div class="flex items-center border rounded-lg bg-white w-max py-2 px-4 space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <input type="text" placeholder="Search" />
                    </div>
                </div>
            </div>


            @yield('content')


        </div>
    </div>


    @livewireScripts()
</body>

</html>