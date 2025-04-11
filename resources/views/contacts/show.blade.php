<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contatos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-between mb-4">

                <div class="text-2xl font-bold text-gray-800">
                    Visualizar Contato
                </div>

                <a href="{{route('contacts.index')}}" class="bg-gray-400 px-4 py-2 rounded-md hover:bg-gray-500 text-white">Voltar</a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg py-10">

                    <form class="max-w-sm mx-auto" action="{{ route('contacts.store') }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nome</label>
                            <input type="name" disabled value="{{$contact->name}}" id="name" class="shadow-xs bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Digite seu nome" required />
                        </div>
                        <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="email" disabled value="{{$contact->email}}" id="email" class="shadow-xs bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="user@example.com" required />
                        </div>
                        <div class="mb-5">
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Telefone</label>
                            <input type="text" disabled value="{{$contact->phone}}" id="phone" class="shadow-xs bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="(00) 00000-0000" required />
                        </div>
                    </form>
  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
