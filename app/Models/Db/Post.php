<?php

namespace App\Models\Db;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $content
 * @property string $file
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Db\Category $category
 * @property-read \App\Models\Db\Comment[] $comments
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Db\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Db\Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Db\Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Db\Post whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Db\Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Db\Post whereFile($value)
 * @mixin \Eloquent
 *
 * @package App\Models\Db
 */
class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'name', 'content', 'file'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'object');
    }
}
