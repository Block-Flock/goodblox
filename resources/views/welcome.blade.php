<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-4xl font-bold text-center mb-8 text-gray-800">Welcome to Goodblox</h1>
        <p class="text-lg text-center mb-8 text-gray-600">A Roblox-like platform built with Laravel</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4 text-gray-700">Registered Users</h2>
                <p class="text-3xl font-bold text-blue-600">{{ $userCount }}</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4 text-gray-700">Games Created</h2>
                <p class="text-3xl font-bold text-green-600">{{ $gameCount }}</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4 text-gray-700">Assets Available</h2>
                <p class="text-3xl font-bold text-purple-600">{{ $assetCount }}</p>
            </div>
        </div>

        <div class="mt-8 text-center">
            <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Explore Games
            </a>
            <a href="#" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-4">
                Create Account
            </a>
        </div>
    </div>
</body>
</html>