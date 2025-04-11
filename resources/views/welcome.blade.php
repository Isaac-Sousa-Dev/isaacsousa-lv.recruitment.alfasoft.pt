<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gestão de Contatos</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="//unpkg.com/alpinejs" defer></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 font-sans antialiased selection:bg-red-500 selection:text-white">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 ">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 bg-white p-2 rounded-lg">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 bg-white p-2 rounded-lg">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="py-12" x-data="{ open: false, contactId: null }">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Nome</th>
                                    <th scope="col" class="px-6 py-3">Email</th>
                                    <th scope="col" class="px-6 py-3">Telefone</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                                    <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $contact->name }}</th>
                                    <td class="px-6 py-4">{{ $contact->email }}</td>
                                    <td class="px-6 py-4">{{ $contact->phone }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
        
                    <div class="mt-4">
                        {{ $contacts->links() }}
                    </div>
        
                </div>
            </div>
        </div>
    </body>
</html>
