<?php

namespace App\Models\Db;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Db\Post[]|\Illuminate\Database\Eloquent\Collection $posts
 * @property-read \App\Models\Db\Comment[]|\Illuminate\Database\Eloquent\Collection $comments
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Db\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Db\Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Db\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Db\Category whereDescription($value)
 * @mixin \Eloquent
 *
 * @package App\Models\Db
 */
class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'object');
    }
}
