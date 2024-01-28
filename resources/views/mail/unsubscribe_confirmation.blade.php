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
            <h1 class="mt-6">
                You have successfully unsubscribed from our newsletter.
            </h1>
            <p>
                We are sorry to see you go.
            </p>
        </div>
</body>
</html>
