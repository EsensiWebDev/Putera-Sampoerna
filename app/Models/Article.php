<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];
    protected $casts = [
        'tags' => 'array',
        'tags_ind' => 'array',
    ];
    // protected $fillable = ['slug', 'title_english','lang', 'author_id'];


    // Mutator for the thumbnail attribute
    public function setThumbnailAttribute($value)
    {
        $this->attributes['thumbnail'] = $value ?  $value : null;
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
