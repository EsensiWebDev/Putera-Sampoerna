<?php

namespace App\Livewire\News;

use App\Models\Article;
use Livewire\Component;

class ListNews extends Component
{
    public function render()
    {
        $articles = Article::orderBy("id", "DESC")->paginate(10);

        return view('livewire.news.list-news', [
            "articles" => $articles
        ]);
    }
}
