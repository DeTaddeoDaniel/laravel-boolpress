<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Post;
use App\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 100; $i++){
        $newPost = new Post();

        $newPost->title = $faker->sentence(3);

        $slung = Str::slug( $newPost->title);
        $slungIniziale = Str::slug($newPost->title);

        // $slung = Str::slug( 'ciao');
        // $slungIniziale = Str::slug( 'ciao');
        $presentePost = Post::where('slung',$slung)->first();
        $contatore=1;
        while($presentePost){
            $slung= $slungIniziale . '-' . $contatore;
            $presentePost = Post::where('slung',$slung)->first();
            $contatore++;
        }

        $newPost->slung = $slung;

        $countUser = User::all()->toArray();
        $newPost->user_id = $countUser[array_rand($countUser)]['id'];

        $newPost->content = $faker->text();
        
        $newPost->save();
        }
    }
}
