<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-gray-100">
    <div class="max-w-4xl py-36 mx-auto sm:py-36 lg:py-40">
        <div class="text-center">
            <p class="mt-6 text-lg leading-8">
                {!! $sendEmail->body !!}
            </p>
        </div>
        {{-- Unsubscribe --}}
        <div class="mt-8 text-center">
            <a href="{{ route('unsubscribe', [$subscriber->email, $subscriber->unsubscribe_hash]) }}" class="text-sm underline text-gray-600 hover:text-gray-500">
                Unsubscribe
            </a>
        </div>
    </div>
</body>
</html>
