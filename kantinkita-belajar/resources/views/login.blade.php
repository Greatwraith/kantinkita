<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="https://cdn.tailwindcss.com"></script>


    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-cover bg-center" 
      style="background-image: url('{{ asset('images/bangunantelkom.jpg') }}')">

    {{-- ALERT --}}
    @include('components.alerts')

    <div class="bg-white shadow-xl rounded-2xl px-8 py-10 w-full max-w-sm text-center animate__animated animate__fadeIn">

        <!-- Close Button -->
        <div class="flex justify-end mb-2">
            <a href="/" class="text-gray-500 hover:text-gray-700 text-xl font-bold">×</a>
        </div>

        <!-- LOGO -->
        <img src="{{ asset('images/logo-telkom-removebg-preview.png') }}" 
             alt="Logo"
             class="w-20 mx-auto mb-4">

        <!-- TITLE -->
        <h1 class="text-2xl font-extrabold text-gray-800">Selamat Datang!</h1>
        <p class="text-gray-600 text-sm mt-1 mb-6">
            Hi Skatelizers! Yuk isi energi dulu sebelum lanjut berprestasi.
        </p>

        <!-- FORM -->
        <form action="{{ route('logincheck') }}" method="POST" class="text-left">
            @csrf

            <!-- Email Field -->
            <div class="relative mb-4">
                <input type="email" name="email"
                       placeholder=" Email"
                       class="w-full px-12 py-3 border rounded-xl focus:ring-2 focus:ring-red-600 focus:outline-none"
                       value="{{ old('email') }}" required>

                <!-- Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="h-5 w-5 absolute left-4 top-3.5 text-gray-400"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 12H8m0 0l4-4m-4 4l4 4m8 4H4a2 2 0 01-2-2V6a2 2 0 012-2h16a2 2 0 012 2v12a2 2 0 01-2 2z"/>
                </svg>
            </div>

            <!-- Password Field -->
            <div class="relative mb-6">
                <input type="password" name="password"
                       placeholder="Kata Sandi"
                       class="w-full px-12 py-3 border rounded-xl focus:ring-2 focus:ring-red-600 focus:outline-none"
                       required>

                <!-- Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="h-5 w-5 absolute left-4 top-3.5 text-gray-400"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 11c0 1.104-.672 2-1.5 2S9 12.104 9 11s.672-2 1.5-2S12 9.896 12 11zm9.707-.707C19.333 6.333 15.667 4 12 4S4.667 6.333 2.293 10.293a1 1 0 000 1.414C4.667 17.667 8.333 20 12 20s7.333-2.333 9.707-6.293a1 1 0 000-1.414z"/>
                </svg>

            </div>

            <!-- Submit Button -->
            <button type="submit"
                    class="w-full bg-red-700 hover:bg-red-800 text-white font-semibold py-3 rounded-xl transition">
                Lanjut
            </button>

        </form>


    </div>

</body>
</html>
