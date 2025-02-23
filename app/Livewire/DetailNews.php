<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\User;
use Livewire\Component;

class DetailNews extends Component
{
    public string $slug = "";
    public $article;

    public function mount()
    {
        $locale = app()->getLocale();

        // Find the article based on the slug and locale
        $this->article = Article::where(function ($query) use ($locale) {
            if ($locale == 'id') {
                $query->where('slug_ind', $this->slug);
            } else {
                $query->where('slug', $this->slug);
            }
        })->first();

        // Redirect to /news if content or title for the current locale is empty
        if ($this->article) {
            if (
                ($locale === 'id' && (empty($this->article->content_indonesia) || empty($this->article->title_indonesia))) ||
                ($locale === 'en' && (empty($this->article->content_english) || empty($this->article->title_english)))
            ) {
                return $this->redirect($locale == 'id' ?  'id/media/news' : 'en/media/news', navigate: true);
            }
        }
    }

    public function render()
    {
        $locale = app()->getLocale();
        $article = Article::where(function ($query) use ($locale) {
            if ($locale == 'id') {
                $query->where('slug_ind', $this->slug);
            } else {
                $query->where('slug', $this->slug);
            }
        })->first();
        $articles = Article::orderBy('created_at', 'DESC')->limit(3)->get();

        if ($article !== null) {
            $author = User::find($article->author_id);
        }

        return view('livewire.detail-news', [
            "article" => $article,
            "articles" => $articles,
            "author" => $author
        ]);
    }
}
