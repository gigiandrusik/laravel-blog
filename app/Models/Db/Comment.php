<?php

namespace App\Models\Db;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 *
 * @property int $id
 * @property integer $object_id
 * @property string $object_type
 * @property string $author
 * @property string $content
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property Model $object
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Db\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Db\Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Db\Comment whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Db\Comment whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Db\Comment whereObjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Db\Comment whereObjectType($value)
 * @mixin \Eloquent
 *
 * @package App\Models\Db
 */
class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author', 'content'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function object()
    {
        return $this->morphTo();
    }
}
