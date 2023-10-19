<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin 1',
            'username' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('password'),
            'address' => 'jl. admin 1',
            'isAdmin' => true,
            'city' => 'Malang',
            'phone' => '081111111111',
            'image' => "profile-images/admin1.jpg",
        ]);

        User::create([
            'name' => 'admin 2',
            'username' => 'admin2',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('password'),
            'address' => 'jl. admin 2',
            'isAdmin' => true,
            'city' => 'Makassar',
            'phone' => '082222222222',
            'image' => "profile-images/admin2.jpg",
        ]);

        User::create([
            'name' => 'Bayu',
            'username' => 'bayuwhx',
            'email' => 'bayuharimurti2@gmail.com',
            'password' => Hash::make('password'),
            'address' => 'jl. admin 1',
            'isAdmin' => true,
            'city' => 'Malang',
            'phone' => '081234567890',
        ]);

        Category::create([
            'category_name' => "Hasil Hutan Bukan Kayu",
            'slug' => "hhbk",
        ]);

        Category::create([
            'category_name' => "Hasil Hutan Kayu",
            'slug' => "hhk",
        ]);

        Product::create([
            'user_id' => 1,
            'category_id' => 1,
            'title' => 'produk admin 1 ke 1',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eligendi, nesciunt.',
            'source' => 'Lorem ipsum dolor sit amet.',
            'function' => 'Lorem, ipsum dolor.',
            'stock' => 5,
            'published_at' => date("Y-m-d H:i:s"),
            'price' => 11111,
            'image' => "product-images/product1.jpg",
        ]);

        Product::create([
            'user_id' => 1,
            'category_id' => 2,
            'title' => 'produk admin 1 ke 2',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, culpa?',
            'source' => 'Lorem ipsum dolor sit amet.',
            'function' => 'Lorem, ipsum dolor.',
            'stock' => 5,
            'published_at' => date("Y-m-d H:i:s"),
            'price' => 22222,
            'image' => "product-images/product2.jpg",
        ]);

        Product::create([
            'user_id' => 1,
            'category_id' => 1,
            'title' => 'produk admin 1 ke 3',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, id.',
            'source' => 'Lorem ipsum dolor sit amet.',
            'function' => 'Lorem, ipsum dolor.',
            'stock' => 5,
            'published_at' => date("Y-m-d H:i:s"),
            'price' => 33333,
            'image' => "product-images/product3.jpg",
        ]);

        Product::create([
            'user_id' => 1,
            'category_id' => 2,
            'title' => 'produk admin 1 ke 4',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. In, ea!',
            'source' => 'Lorem ipsum dolor sit amet.',
            'function' => 'Lorem, ipsum dolor.',
            'stock' => 5,
            'published_at' => date("Y-m-d H:i:s"),
            'price' => 44444,
            'image' => "product-images/product4.jpg",
        ]);

        Product::create([
            'user_id' => 1,
            'category_id' => 1,
            'title' => 'produk admin 1 ke 5',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, doloremque?',
            'source' => 'Lorem ipsum dolor sit amet.',
            'function' => 'Lorem, ipsum dolor.',
            'stock' => 5,
            'published_at' => date("Y-m-d H:i:s"),
            'price' => 55555,
            'image' => "product-images/product5.jpg",
        ]);

        Product::create([
            'user_id' => 2,
            'category_id' => 2,
            'title' => 'produk admin 2 ke 1',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, maiores.',
            'source' => 'Lorem ipsum dolor sit amet.',
            'function' => 'Lorem, ipsum dolor.',
            'stock' => 5,
            'published_at' => date("Y-m-d H:i:s"),
            'price' => 66666,
            'image' => "product-images/product6.jpg",
        ]);

        Product::create([
            'user_id' => 2,
            'category_id' => 1,
            'title' => 'produk admin 2 ke 2',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, veniam!',
            'source' => 'Lorem ipsum dolor sit amet.',
            'function' => 'Lorem, ipsum dolor.',
            'stock' => 5,
            'published_at' => date("Y-m-d H:i:s"),
            'price' => 77777,
            'image' => "product-images/product7.jpg",
        ]);

        Product::create([
            'user_id' => 2,
            'category_id' => 2,
            'title' => 'produk admin 2 ke 3',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repudiandae, vel!',
            'source' => 'Lorem ipsum dolor sit amet.',
            'function' => 'Lorem, ipsum dolor.',
            'stock' => 5,
            'published_at' => date("Y-m-d H:i:s"),
            'price' => 88888,
            'image' => "product-images/product8.jpg",
        ]);

        Product::create([
            'user_id' => 2,
            'category_id' => 1,
            'title' => 'produk admin 2 ke 4',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, magnam.',
            'source' => 'Lorem ipsum dolor sit amet.',
            'function' => 'Lorem, ipsum dolor.',
            'stock' => 5,
            'published_at' => date("Y-m-d H:i:s"),
            'price' => 99999,
            'image' => "product-images/product9.jpg",
        ]);

        Product::create([
            'user_id' => 2,
            'category_id' => 2,
            'title' => 'produk admin 2 ke 5',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt, fugiat.',
            'source' => 'Lorem ipsum dolor sit amet.',
            'function' => 'Lorem, ipsum dolor.',
            'stock' => 5,
            'published_at' => date("Y-m-d H:i:s"),
            'price' => 100000,
            'image' => "product-images/product10.jpg",
        ]);
    }
}
