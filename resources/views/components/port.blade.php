<div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
        Портфолио
    </h1>

    <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
        Здесь можно добавить работы в портфолио
    </p>
    
    <div>
        <form action="{{route('portCreate.post')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" placeholder="Название портфолио" class="rounded-md">
            
            <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
                Цена:</p><input type="number" min="0" max="10000" name="price" placeholder="Введите цену" class=rounded-md>
            <input type="text" name="val" placeholder="Введите валюту" class=rounded-md>
            <input type="text" name="category" placeholder="Введите категорию" class=rounded-md>
            <input type="file" accept=".jpg,.png,.jpeg" name="image" /><br><br>
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150">Добавить портфолио</button>


        </form>
    </div>
    <table style="color:white;" class="border">
        <thead>
            <tr>
                <th>Name</th>
                <th>price</th>
                <th>val</th>
                <th>category</th>
                <th>image</th>
                <th>#</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
                @foreach($port as $p)
                    <tr>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->price }}</td>
                        <td>{{ $p->val }}</td>
                        <td>{{ $p->category }}</td>
                        <td><img src="/storage/{{ $p->image }}" width="400" /></td>
                        <td>
                            <font color="#FF4500">
                                <form action="{{ route('deletePort', $p->id) }}" method="POST" class="inline-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="color:#FF4500; background:none; border:none; cursor:pointer; padding:0;">Удалить</button>
                                </form>
                            </font>
                        </td>
                        <td>
                            <font color="#FFA500">
                                <a href="{{ route('editPort', $p->id) }}">Редактировать</a>
                            </font>
                        </td>
                        
                    </tr>
                @endforeach
                                       
        </tbody>
    </table>
</div>
<style>
     table {
                width: 100%;
                text-align: left;
                color: white;
            }
    .inline-form {
        display: inline;
    }
    .inline-form button {
        background: none;
        border: none;
        padding: 0;
        color: #FF4500;
        cursor: pointer;
        font-size: inherit;
    }
    </style>

