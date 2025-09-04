<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title inertia>{{ config('app.name', 'Laravel') }}</title>
        <style scoped>
            .posts-table-container {
            width: 90%;
            margin: 20px auto;
            font-family: Arial, sans-serif;
            }

            .posts-table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            }

            .posts-table th,
            .posts-table td {
            padding: 12px 15px;
            text-align: left;
            }

            .posts-table thead {
            background-color: #4caf59ff;
            color: white;
            }

            .posts-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
            }

            .posts-table tbody tr:hover {
            background-color: #f1f1f1;
            }

            .posts-table th {
            position: sticky;
            top: 0;
            }
        </style>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
