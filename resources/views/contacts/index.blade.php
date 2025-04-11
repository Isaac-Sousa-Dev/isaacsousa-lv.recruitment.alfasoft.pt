<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contatos') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ open: false, contactId: null }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-between mb-4">
                <div>
                    <!-- Atualizar o formulário de pesquisa -->
                    <form method="GET" action="{{ route('contacts.index') }}" class="flex gap-2">
                        <input type="text" name="search" placeholder="Pesquise aqui..." class="border border-gray-300 rounded-md px-4 py-2" value="{{ request()->search }}">
                        <button type="submit" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">
                            Pesquisar
                        </button>
                    </form>
                </div>
                <a href="{{ route('contacts.create') }}" class="bg-blue-600 px-4 py-2 rounded-md hover:bg-blue-500 text-white">Novo Contato</a>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nome</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">Telefone</th>
                            <th scope="col" class="px-6 py-3">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                        <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                            <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $contact->name }}</th>
                            <td class="px-6 py-4">{{ $contact->email }}</td>
                            <td class="px-6 py-4">{{ $contact->phone }}</td>
                            <td class="px-6 py-4 flex gap-4">
                                <a href="{{ route('contacts.show', $contact->id) }}">
                                    <svg class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                        <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                    </svg>
                                </a>

                                <a href="{{ route('contacts.edit', $contact->id) }}">
                                    <svg class="w-6 h-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.3 4.8 2.85 2.85M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.41-9.91a2.02 2.02 0 0 1 0 2.85l-6.84 6.84L8 14l.71-3.56 6.84-6.84a2.02 2.02 0 0 1 2.85 0Z"/>
                                    </svg>
                                </a>

                                <button @click="open = true; contactId = {{ $contact->id }}" type="button">
                                    <svg class="w-6 h-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $contacts->links() }}
            </div>

            <!-- Modal de Confirmação Global -->
            <div x-show="open" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
                <div @click.away="open = false" class="bg-white rounded-lg p-6 w-full max-w-md shadow-lg">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Confirmar Exclusão</h2>
                    <p class="text-gray-600 mb-6">Tem certeza que deseja excluir este contato?</p>
                    <div class="flex justify-end gap-4">
                        <button @click="open = false" class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300">
                            Cancelar
                        </button>
                        <form :action="`/contacts/${contactId}`" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-500">
                                Confirmar
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
