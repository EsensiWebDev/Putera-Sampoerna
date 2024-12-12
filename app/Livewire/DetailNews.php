<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class DetailNews extends Component
{
    public string $slug = "";


    public function render()
    {
        $article = Article::where('slugs', $this->slug)->first();
        $articles = Article::orderBy("id", "DESC")->limit(3)->get();
        return view('livewire.detail-news', [
            "article" => $article,
            "articles" => $articles
        ]);
    }
}
