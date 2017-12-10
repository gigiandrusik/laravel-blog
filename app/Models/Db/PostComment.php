<?php

namespace App\Models\Db;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PostComment
 *
 * @property int $id
 * @property integer $post_id
 * @property string $author
 * @property string $content
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Db\Post $post
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Db\CategoryComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Db\CategoryComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Db\CategoryComment whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Db\CategoryComment whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Db\CategoryComment wherePostId($value)
 * @mixin \Eloquent
 *
 * @package App\Models\Db
 */
class PostComment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id', 'author', 'content'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
