<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany('App\Models\Post', 'author_id');
    }

    public function tags(): array
    {
        $tags = array();

        $rows = Tag::select('tags.id', 'tags.name')
            ->join('post_tag', 'tags.id', '=', 'post_tag.tag_id')
            ->join('posts', 'post_tag.post_id', '=', 'posts.id')
            ->where('posts.author_id', $this->id)
            ->groupBy('tags.id')
            ->orderBy('tags.name')
            ->get();

        foreach ($rows as $row) {
            $tags[] = $row;
        }

        return $tags;
    }

    public function comments(): HasMany
    {
        return $this->hasMany('App\Models\Comment');
    }
}
