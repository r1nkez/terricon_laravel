<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Пользователи') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <table style="color:white;" class="border">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>E-mail</th>
                                <th>#</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>Удалить</td>
                                        <td>
                                            <a href="{{route('renderEditUsers', $user->id)}}">Редактировать</a>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                                                       
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <style>
            table {
                width: 100%
            }
        </style>
        <style>
            input {
                color: black;
            }
        </style>
    </div>
</x-app-layout>
