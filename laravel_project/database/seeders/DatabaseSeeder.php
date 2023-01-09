<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert(
            [
                'role' => 'admin',
                'login' => 'lampa',
                'email' => 'admin@gmail.com',
                'firstName' => 'andry',
                'lastName' => 'grishchnko',
                'password' => bcrypt('admin')
            ]
        );
        DB::table('users')->insert(
            [
                'role' => 'author',
                'login' => 'joan123',
                'email' => 'author@gmail.com',
                'firstName' => 'Joan',
                'lastName' => 'Rouling',
                'password' => bcrypt('author')
            ]
        );
        DB::table('users')->insert(
            [
                'role' => 'author',
                'login' => 'alex456',
                'email' => 'autho456r@gmail.com',
                'firstName' => 'Alex',
                'lastName' => 'Pushkin',
                'password' => bcrypt('author123')
            ]
        );

        DB::table('books')->insert(
            [
                'user_id' => '2',
                'title' => 'Harry Potter',
                'edition' => '2500000',
                'year' => '1998',
                'isbn' => '88776655'
            ]
        );
        DB::table('books')->insert(
            [
                'user_id' => '2',
                'title' => 'The Withcer',
                'edition' => '30000',
                'year' => '1990',
                'isbn' => '11223344'
            ]
        );
        DB::table('books')->insert(
            [
                'user_id' => '3',
                'title' => 'Eugene Onegin',
                'edition' => '55000',
                'year' => '1730',
                'isbn' => '55661199'
            ]
        );

        DB::table('genres')->insert(
            [
                'name' => 'Fantasy',
                'description' => 'Genre Fantasy'
            ]
        );
        DB::table('genres')->insert(
            [
                'name' => 'Biography',
                'description' => 'Genre Biography'
            ]
        );
        DB::table('genres')->insert(
            [
                'name' => 'Drama',
                'description' => 'Genre Drama'
            ]
        );
        DB::table('genres')->insert(
            [
                'name' => 'Romance',
                'description' => 'Genre Romance'
            ]
        );
        DB::table('genres')->insert(
            [
                'name' => 'Horror',
                'description' => 'Genre Horror'
            ]

        );
        DB::table('book_genres')->insert([
            'book_id' => '1',
            'genre_id' => '1',
        ]);
        DB::table('book_genres')->insert([
            'book_id' => '1',
            'genre_id' => '2',
        ]);
        DB::table('book_genres')->insert([
            'book_id' => '1',
            'genre_id' => '3',
        ]);
        DB::table('book_genres')->insert([
            'book_id' => '2',
            'genre_id' => '4',
        ]);
        DB::table('book_genres')->insert([
            'book_id' => '2',
            'genre_id' => '5',
        ]);      
        DB::table('book_genres')->insert([
            'book_id' => '3',
            'genre_id' => '4',
        ]);      
    }
}