<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        Article::create([
            'title' => 'Artificial Intelligence',
            'content' => 'Artificial intelligence (AI) is a technology that allows machines to mimic human intelligence and problem-solving abilities. AI is created by humans and uses advanced algorithms, processing power, and data training methods to perform tasks.',
            'image_url' => 'ai_1.png',
        ]);
        Article::create([
            'title' => 'Software Engineering',
            'content' => 'Software engineering is the application of engineering principles to the design, development, maintenance, testing, and evaluation of software systems. It emphasizes creating reliable, efficient, and scalable software solutions.',
            'image_url' => 'se_2.png',
        ]);
        Article::create([
            'title' => 'Web Development',
            'content' => 'Web development is the process of building and maintaining websites or web applications. It involves both the front-end (what users see) and back-end (server-side processes) of a web application.',
            'image_url' => 'web_3.png',
        ]);
    }
}
