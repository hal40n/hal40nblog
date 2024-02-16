<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Tag;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // ユーザーを生成
        //$users = User::factory(100)->create();

        // タグを生成
        $tags = Tag::factory(20)->create();

        // ユーザーごとに記事を生成し、各記事にランダムな数のタグをアタッチする
        // foreach ($users as $user) {
        //     Article::factory(20)->create([
        //         'user_id' => $user->id,
        //     ])->each(function ($article) use ($tags) {
        //         $article->tags()->attach($tags->random(random_int(1, 5)));
        //     });
        // }

        $this->call([
            UserSeeder::class,
        ]);
    }
}
