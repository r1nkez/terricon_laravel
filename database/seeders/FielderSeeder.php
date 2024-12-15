<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class FielderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fielders')->insert([
            ['field_name' => 'phone', 'field_value' => '+7 123 456 78 90'],
            ['field_name' => 'email', 'field_value' => 'dartapshihilus@gmail.com'],
            ['field_name' => 'slogan', 'field_value' => 'Заказать Разработку у меня по скидке'],
            ['field_name' => 'about_me', 'field_value' => 'Меня зовут Цой Константин и я новичок в web-разработке'],
            ['field_name' => 'deviz', 'field_value' => 'Да']
        ]);

        DB::table('categories')->insert([
            ['name' => 'IT-технологии'],
            ['name' => 'Laravel'],
            ['name' => 'Жизнь'],
            ['name' => 'Спорт'],
        ]);

        DB::table('skills')->insert([
            ['name' => 'PHP', 'lvl' => 30, 'category' => 'Backend'],
            ['name' => 'JavaScript', 'lvl' => 20, 'category' => 'Frontend'],
            ['name' => 'Laravel', 'lvl' => 50, 'category' => 'Backend'],
        ]);

        DB::table('posts')->insert([
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 2],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 2],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 3],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 2],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 3],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 3],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 3],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 3],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1]
        ]);
    }
}