<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Str;

#aggiunto per slug

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = config('db.posts');
        foreach ($posts as $post) {
            $newPost = new Post();
            $newPost->image = $post['image'];
            $newPost->title = $post['title'];
            $newPost->body = $post['body'];
            $newPost->user_id = 1;
            $newPost->slug = Str::slug($post['title'], '-');
            $newPost->save();
        }
    }
}

# 11:07 mi sta dando problemi con php artisan db:seed --class=PostSeeder ovvero:

// INFO  Seeding database.


// Illuminate\Database\QueryException

// SQLSTATE[42S22]: Column not found: 1054 Unknown column 'user_id' in 'field list' (Connection: mysql, SQL: insert into `posts` (`image`, `title`, `body`, `user_id`, `slug`, `updated_at`, `created_at`) values (https://immagini.editorialedomani.it/version/c:ZDEzODQyM2QtNDhiZS00:ZWRhZTlj/pag_8_fat_peolple_don-t_go_to_heaven-def-jpg.webp?f=3%3A2&q=0.75&w=635, Il paradiso è dei magri, A partire da radici antiche la condanna della gola ha avuto una particolare rilevanza nella definizione della buona cristiana e del buon cristiano.<br>Tale condanna si ripete ancora oggi, attraverso l'ossessione per il corpo magro, la colpevolizzazione dell'obesità o anche del semplice sovrappeso.<br>Un punto di osservazione giudicante mette malamente in discussione le persone che soffrono di disturbi alimentari e racconta una storia che ancora oggi fa risuonare la propria eco, soprattutto nelle comunità statunitensi., 1, il-paradiso-e-dei-magri, 2024-01-12 10:08:12, 2024-01-12 10:08:12))

// at vendor\laravel\framework\src\Illuminate\Database\Connection.php:822
//  818▕                     $this->getName(), $query, $this->prepareBindings($bindings), $e
//  819▕                 );
//  820▕             }
//  821▕
// ➜ 822▕             throw new QueryException(
//  823▕                 $this->getName(), $query, $this->prepareBindings($bindings), $e
//  824▕             );
//  825▕         }
//  826▕     }

// i   A column was not found: You might have forgotten to run your database migrations.
//    https://laravel.com/docs/master/migrations#running-migrations

// 1   vendor\laravel\framework\src\Illuminate\Database\Connection.php:574
//    PDOException::("SQLSTATE[42S22]: Column not found: 1054 Unknown column 'user_id' in 'field list'")

// 2   vendor\laravel\framework\src\Illuminate\Database\Connection.php:574
//    PDO::prepare("insert into `posts` (`image`, `title`, `body`, `user_id`, `slug`, `updated_at`, `created_at`) values (?, ?, ?, ?, ?, ?, ?)")
