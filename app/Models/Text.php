<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Text extends Model
{
    use HasFactory;

    public function text(): BelongsTo
    {
        return $this->belongsTo(Text::class, "text_id", "id");
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, "post_id", "id");
    }
}
