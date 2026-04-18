<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    {{-- ✅ Gunakan Tailwind melalui Vite --}}
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/yourkitid.js" crossorigin="anonymous"></script>

    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100 flex min-h-screen font-[Poppins]">

    <div x-data="{ sidebarOpen: true }" class="flex w-full">
        {{-- Sidebar --}}
        @include('components.sidebar_admin')

        {{-- Main content --}}
        <div class="flex-1 p-6">
            @yield('content')
        </div>
    </div>

</body>
</html>
