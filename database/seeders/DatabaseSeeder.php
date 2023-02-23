<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Category::truncate();
        Post::truncate();


         $user = User::factory()->create();

         $personal = Category::create([
             'name' => 'Personal',
             'slug' => 'personal'
         ]);

         $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
         ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'My Family Post',
            'slug' => 'my-family-post',
            'excerpt' => '<p>家族貼文</p>',
            'body' => '<p>家族貼文測試：dfjioashjdofhja;lwiejfioawujhdifoj ijiaowsdfjioq;wuercjqiop uioafsdkfjakl;sdfuiowe asjhdklfasdklfj niwertesult sjdlfkjawoerjl; resulp jfklasdjrtlk;fghsdthwerthg aergqethaerfgwert</p>'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => '<p>工作貼文</p>',
            'body' => '<p>工作貼文測試：sjdkfljas;ldkjfopij;laskjerf;klawjerklfja;lskuiouver sjdfl;kjas;ldkfj;lqkavjwl;kerjv;alkwujefkl;ajsdcvioausdofghjqer jvaslk;djfa;lskdjfgqweoritjgqioawerjga;klsdfg etghwerthg</p>'
        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
