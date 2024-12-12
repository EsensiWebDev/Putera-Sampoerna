<?php

namespace App\Livewire\News;

use App\Models\Article;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class LatestUpdate extends Component
{

    public function placeholder()
    {
        return <<<'HTML'
            <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

        HTML;
    }

    public function render()
    {

        $articles = Article::orderBy('created_at', 'DESC')
            ->limit(4)
            ->get();

        return view('livewire.news.latest-update', [
            'articles' => $articles
        ]);
    }
}
