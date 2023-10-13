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
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'isAdmin' => true,
            'username' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('password'),
            'name' => 'admin 1',
            'address' => 'jl. admin 1',
            'city' => 'Malang',
            'phone' => '081111111111',
            // 'image' => 'https://firebasestorage.googleapis.com/v0/b/firestore-cff6b.appspot.com/o/UserImages%2Fadmin1.jpg?alt=media&token=73219a93-0e67-4a40-8662-de4e4dc2c6b3',
            // 'image' => public_path() . "\UserImages\admin1.jpg",
            'image' => "storage/UserImages/admin1.jpg",
        ]);

        User::create([
            'isAdmin' => true,
            'username' => 'admin2',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('password'),
            'name' => 'admin 2',
            'address' => 'jl. admin 2',
            'city' => 'Makassar',
            'phone' => '082222222222',
            // 'image' => 'https://firebasestorage.googleapis.com/v0/b/firestore-cff6b.appspot.com/o/UserImages%2Fadmin2.jpg?alt=media&token=915f7b91-0ccd-4dc7-adc3-ff613c06a85e',
            // 'image' => public_path() . "\UserImages\admin2.jpg",
            'image' => "storage/UserImages/admin2.jpg",
        ]);

        Category::create([
            'name' => "Hasil Hutan Bukan Kayu",
            'slug' => "hhbk",
        ]);

        Category::create([
            'name' => "Hasil Hutan Kayu",
            'slug' => "hhk",
        ]);

        Product::create([
            'user_id' => 1,
            'category' => json_encode([
                ['category_id' => 1, 'category_name' => 'Hasil Hutan Bukan Kayu', 'category_slug' => 'hhbk'],
            ]),
            'name' => 'produk admin 1 ke 1',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eligendi, nesciunt.',
            'price' => 11111,
            // 'image' => "https://firebasestorage.googleapis.com/v0/b/firestore-cff6b.appspot.com/o/ProductImages%2Fproduct1.jpg?alt=media&token=baae9814-fae2-4a5f-9e50-bf6dc8777685",
            // 'image' => public_path() . "\ProductImages\product1.jpg",
            'image' => "storage/ProductImages/product1.jpg",
        ]);

        Product::create([
            'user_id' => 1,
            'category' => json_encode([
                ['category_id' => 2, 'category_name' => 'Hasil Hutan Kayu', 'category_slug' => 'hhk'],
            ]),
            'name' => 'produk admin 1 ke 2',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, culpa?',
            'price' => 22222,
            // 'image' => "https://firebasestorage.googleapis.com/v0/b/firestore-cff6b.appspot.com/o/ProductImages%2Fproduct2.jpg?alt=media&token=27f085ee-f137-4131-92a8-30aced13c5d3",
            // 'image' => public_path() . "\ProductImages\product2.jpg",
            'image' => "storage/ProductImages/product2.jpg",
        ]);

        Product::create([
            'user_id' => 1,
            'category' => json_encode([
                ['category_id' => 1, 'category_name' => 'Hasil Hutan Bukan Kayu', 'category_slug' => 'hhbk'],
            ]),
            'name' => 'produk admin 1 ke 3',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, id.',
            'price' => 33333,
            // 'image' => "https://firebasestorage.googleapis.com/v0/b/firestore-cff6b.appspot.com/o/ProductImages%2Fproduct3.jpg?alt=media&token=f2fdbc3a-855f-4cad-a583-06cf5934fb07",
            // 'image' => public_path() . "\ProductImages\product3.jpg",
            'image' => "storage/ProductImages/product3.jpg",
        ]);

        Product::create([
            'user_id' => 1,
            'category' => json_encode([
                ['category_id' => 2, 'category_name' => 'Hasil Hutan Kayu', 'category_slug' => 'hhk'],
            ]),
            'name' => 'produk admin 1 ke 4',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. In, ea!',
            'price' => 44444,
            // 'image' => "https://firebasestorage.googleapis.com/v0/b/firestore-cff6b.appspot.com/o/ProductImages%2Fproduct4.jpg?alt=media&token=f68ded8d-1b86-443b-9a5a-a608f09d080c",
            // 'image' => public_path() . "\ProductImages\product4.jpg",
            'image' => "storage/ProductImages/product4.jpg",
        ]);

        Product::create([
            'user_id' => 1,
            'category' => json_encode([
                ['category_id' => 1, 'category_name' => 'Hasil Hutan Bukan Kayu', 'category_slug' => 'hhbk'],
            ]),
            'name' => 'produk admin 1 ke 5',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, doloremque?',
            'price' => 55555,
            // 'image' => "https://firebasestorage.googleapis.com/v0/b/firestore-cff6b.appspot.com/o/ProductImages%2Fproduct5.jpg?alt=media&token=9056cd45-ac71-4b59-aa1c-09913aae4347",
            // 'image' => public_path() . "\ProductImages\product5.jpg",
            'image' => "storage/ProductImages/product5.jpg",
        ]);

        Product::create([
            'user_id' => 2,
            'category' => json_encode([
                ['category_id' => 2, 'category_name' => 'Hasil Hutan Kayu', 'category_slug' => 'hhk'],
            ]),
            'name' => 'produk admin 2 ke 1',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, maiores.',
            'price' => 66666,
            // 'image' => "https://firebasestorage.googleapis.com/v0/b/firestore-cff6b.appspot.com/o/ProductImages%2Fproduct6.jpg?alt=media&token=67f0f6a5-aff6-4bcd-88a3-1599e991a0c9",
            // 'image' => public_path() . "\ProductImages\product6.jpg",
            'image' => "storage/ProductImages/product6.jpg",
        ]);

        Product::create([
            'user_id' => 2,
            'category' => json_encode([
                ['category_id' => 1, 'category_name' => 'Hasil Hutan Bukan Kayu', 'category_slug' => 'hhbk'],
            ]),
            'name' => 'produk admin 2 ke 2',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, veniam!',
            'price' => 77777,
            // 'image' => "https://firebasestorage.googleapis.com/v0/b/firestore-cff6b.appspot.com/o/ProductImages%2Fproduct7.jpg?alt=media&token=34a4a586-343b-42f7-9e12-c2b2a3304180",
            // 'image' => public_path() . "\ProductImages\product7.jpg",
            'image' => "storage/ProductImages/product7.jpg",
        ]);

        Product::create([
            'user_id' => 2,
            'category' => json_encode([
                ['category_id' => 2, 'category_name' => 'Hasil Hutan Kayu', 'category_slug' => 'hhk'],
            ]),
            'name' => 'produk admin 2 ke 3',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repudiandae, vel!',
            'price' => 88888,
            // 'image' => "https://firebasestorage.googleapis.com/v0/b/firestore-cff6b.appspot.com/o/ProductImages%2Fproduct8.jpg?alt=media&token=461cd3d5-abeb-4f3d-bcfb-d5db1f0b492f",
            // 'image' => public_path() . "\ProductImages\product8.jpg",
            'image' => "storage/ProductImages/product8.jpg",
        ]);

        Product::create([
            'user_id' => 2,
            'category' => json_encode([
                ['category_id' => 1, 'category_name' => 'Hasil Hutan Bukan Kayu', 'category_slug' => 'hhbk'],
            ]),
            'name' => 'produk admin 2 ke 4',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, magnam.',
            'price' => 99999,
            // 'image' => "https://firebasestorage.googleapis.com/v0/b/firestore-cff6b.appspot.com/o/ProductImages%2Fproduct9.jpg?alt=media&token=6f06bf78-7c40-4458-bc11-433c90193160",
            // 'image' => public_path() . "\ProductImages\product9.jpg",
            'image' => "storage/ProductImages/product9.jpg",
        ]);

        Product::create([
            'user_id' => 2,
            'category' => json_encode([
                ['category_id' => 2, 'category_name' => 'Hasil Hutan Kayu', 'category_slug' => 'hhk'],
            ]),
            'name' => 'produk admin 2 ke 5',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt, fugiat.',
            'price' => 100000,
            // 'image' => "https://firebasestorage.googleapis.com/v0/b/firestore-cff6b.appspot.com/o/ProductImages%2Fproduct10.jpg?alt=media&token=c5e58b36-dc72-422a-bcd3-831181ba18fe",
            // 'image' => public_path() . "\ProductImages\product10.jpg",
            'image' => "storage/ProductImages/product10.jpg",
        ]);
    }
}
