<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-poppins">

    {{-- ✅ Navbar --}}
    @include('components.navbar')

    {{-- Dashboard content --}}
    <div class="container mx-auto mt-20 text-center">
        <h2 class="text-2xl font-bold mb-4">Welcome to your USER Dashboard!</h2>
        @auth
            <p class="text-lg mb-6">You are now logged in as <b>{{ Auth::user()->name }}</b>.</p>
            <div class="flex justify-center gap-4">
                <a href="{{ route('user.menu.index') }}" class="px-5 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                    See Menu
                </a>
                <a href="{{ route('logout') }}" class="px-5 py-2 border border-green-500 text-green-500 rounded-lg hover:bg-green-500 hover:text-white transition">
                    Log out
                </a>
            </div>
        @else
            <p class="text-red-500">You are not logged in.</p>
            <a href="{{ route('login') }}" class="px-5 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                Login Here
            </a>
        @endauth
    </div>

    {{-- ✅ Include reusable SweetAlert component --}}
    @include('components.alerts')

</body>
</html>
