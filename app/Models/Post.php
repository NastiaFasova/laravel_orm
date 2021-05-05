<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title'];
    public function text(): HasOne
    {
        return $this->hasOne('App\Models\Text');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo('App\Models\User', 'author_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, "author_id", "id");
    }
}
