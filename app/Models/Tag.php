<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function authors()
    {
        return $this->hasMany('App\Models\User');
    }

    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class, "author_id", "id");
    }
}
