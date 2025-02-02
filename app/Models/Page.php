<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'visibility', 'published_at', 'content_id', 'content_en', 'created_by'
    ];

    protected $casts = ['published_at' => 'datetime', ' deleted_at' => 'datetime'];

    protected static function booted()
    {
        static::saving(function ($page) {
            if ($page->isDirty('title') && empty($page->slug)) {
                $page->slug = Str::slug($page->title);
            }
        });
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Scope to filter visible pages.
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeVisible($query)
    {
        return $query->where('visibility', true);
        // ->where('published_at', '>=', now());
    }

    protected function content(): Attribute
    {
        return Attribute::make(
            get: fn() => [
                'id' => $this->content_id,
                'en' => $this->content_en
            ]
        );
    }
}
