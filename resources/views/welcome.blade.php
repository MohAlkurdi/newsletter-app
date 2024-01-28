<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Newsletter App</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-gray-100 dark:bg-gray-900">
    <div class="relative px-6 pt-0 lg:px-8">
        <div class="absolute inset-x-0 overflow-hidden -top-40 -z-10 transform-gpu blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="max-w-4xl py-48 mx-auto sm:py-48 lg:py-52">
            <div class="text-center">
                @if(session()->has('success'))
                <p class="bg-green-300 p-4 mb-4 rounded">
                    {{ session('success') }}
                </p>
                @endif
                <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl dark:text-white">
                    {{ $welcome }}
                </h1>
                <p class="mt-6 text-lg leading-8 text-left text-gray-600 dark:text-gray-200">
                    {!! nl2br(e($description)) !!}
                </p>
                <form class="flex items-center justify-center my-12 gap-x-3" method="POST" action="{{ url('subscribe') }}">
                    @csrf
                    <div class="relative">
                        <svg class="absolute inset-y-0 w-6 h-6 my-auto text-gray-400 left-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"></path>
                        </svg>
                        <input type="text" placeholder="Enter your email" name="email" class="w-full py-2 pl-12 pr-3 text-gray-500 bg-transparent border rounded-lg shadow-sm outline-none focus:border-indigo-600" />
                    </div>
                    <button class="block w-auto py-3 px-4 font-medium text-sm text-center text-white bg-[#9089fc] hover:bg-indigo-500 active:bg-indigo-700 rounded-lg">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>

        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
    </div>

</body>
</html>
