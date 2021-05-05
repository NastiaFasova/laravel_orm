<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    public $table = "commentaries";

    public function post(): BelongsTo
    {
        return $this->belongsTo('App\Models\Post');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User', 'author_id');
    }

    public function comment(): BelongsTo
    {
        return $this->belongsTo(Comment::class, "category_id", "id");
    }
}
