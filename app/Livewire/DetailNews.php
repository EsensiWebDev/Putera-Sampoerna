<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class DetailNews extends Component
{
    public string $slug = "";


    public function render()
    {
        $locale = app()->getLocale();
        $article = Article::where(function ($query) use ($locale) {
            if ($locale == 'id') {
                $query->where('slug_ind', $this->slug)->orWhere('slug', $this->slug);
            } else {
                $query->where('slug', $this->slug)->orWhere('slug_ind', $this->slug);
            }
        })->first();
        $articles = Article::orderBy('created_at', 'DESC')->limit(3)->get();
        return view('livewire.detail-news', [
            "article" => $article,
            "articles" => $articles
        ]);
    }
}
