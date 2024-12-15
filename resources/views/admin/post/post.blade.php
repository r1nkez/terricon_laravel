<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Посты') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <table style="color:white;" class="border">
                        <a href="{{ route('addPost') }}">
                            <x-button>Создать новый пост</x-button>
                        </a>
                        <br>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>name</th>
                                <th>Preview</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->name }}</td>
                                        <td>
                                            <img src="/storage/{{ $post->preview }}" width="200" />
                                        </td>
                                        <td>{{ $users->find($post->user_id)->name }} #{{$post->user_id}}</td>
                                        <td>{{ $post->category_id }}</td>
                                        <td>{{ $post->created_at }}</td>
                                        
                                        <td>
                                            <form action="{{ route('deletePost', $post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-500"  type="submit">Удалить</button>
                                            </form>
                                        </td>
                                        <td><a href="{{ route('renderEditPost', $post->id) }}">Редактировать</a></td>
                                        
                                    </tr>
                                @endforeach
                                                       
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <style>
            table {
                width: 100%;
                text-align: left;
                color: white;
            }
        </style>
        <style>
            input {
                color: black;
            }
        </style>
    </div>
</x-app-layout>
