<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class DetailNews extends Component
{
    public string $slug = "";


    public function render()
    {
        $article = Article::where('slug', $this->slug)->first();
        $articles = Article::orderBy('created_at', 'DESC')->limit(3)->get();
        return view('livewire.detail-news', [
            "article" => $article,
            "articles" => $articles
        ]);
    }
}
