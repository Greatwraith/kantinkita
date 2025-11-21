{{-- resources/views/admin/profile.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>

<body class="bg-gray-100 flex">

    {{-- SIDEBAR KHUSUS ADMIN --}}
    @include('components.sidebar')

    <div class="flex-1 p-8">

        {{-- HEADER --}}
        <h1 class="text-3xl font-bold mb-6">Profile</h1>

        {{-- CARD ATAS: AVATAR + NAMA --}}
        <div class="bg-white rounded-2xl shadow-md px-8 py-6 flex items-center gap-6">

            {{-- AVATAR --}}

              
            <x-carbon-user-avatar-filled   class="w-28 h-28 rounded-full object-cover shadow-md border-4 border-white"
            />

            {{-- NAMA & EMAIL --}}
            <div>
                <h2 class="text-2xl font-semibold text-gray-900">
                    {{ $user->name ?? 'Nama Admin' }}
                </h2>
                <p class="text-gray-500 text-sm mt-1">
                    {{ $user->email ?? 'admin@example.com' }}
                </p>
            </div>

        </div>

        {{-- CARD BAWAH: DETAIL DATA --}}
        <div class="mt-6 bg-white rounded-2xl shadow-md overflow-hidden">
            <table class="w-full text-sm">
                <tbody>
                    <tr class="border-b">
                        <td class="bg-gray-50 px-6 py-3 font-medium text-gray-600 w-1/3">
                            Nama Lengkap
                        </td>
                        <td class="px-6 py-3 text-gray-800">
                            {{ $user->name ?? '-' }}
                        </td>
                    </tr>

                    <tr class="border-b">
                        <td class="bg-gray-50 px-6 py-3 font-medium text-gray-600">
                            Tanggal Lahir
                        </td>
                        <td class="px-6 py-3 text-gray-800">
                            @if(!empty($user->tanggal_lahir))
                                {{ \Carbon\Carbon::parse($user->tanggal_lahir)->translatedFormat('j M Y') }}
                            @else
                                -
                            @endif
                        </td>
                    </tr>

                    <tr class="border-b">
                        <td class="bg-gray-50 px-6 py-3 font-medium text-gray-600">
                            Jenis Kelamin
                        </td>
                        <td class="px-6 py-3 text-gray-800">
                            Perempuan
                        </td>
                    </tr>

                    <tr class="border-b">
                        <td class="bg-gray-50 px-6 py-3 font-medium text-gray-600">
                            Alamat
                        </td>
                        <td class="px-6 py-3 text-gray-800">
                            {{ data_get($user, 'alamat', '-') }}
                        </td>
                    </tr>

                    <tr class="border-b">
                        <td class="bg-gray-50 px-6 py-3 font-medium text-gray-600">
                            Nomor Telepon
                        </td>
                        <td class="px-6 py-3 text-gray-800">
                            {{ $user->telepon ?? '-' }}
                        </td>
                    </tr>

                    <tr>
                        <td class="bg-gray-50 px-6 py-3 font-medium text-gray-600">
                            Email
                        </td>
                        <td class="px-6 py-3 text-gray-800">
                            {{ $user->email ?? '-' }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>
