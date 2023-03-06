<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Kyslik\ColumnSortable\Sortable;

class BlogPost extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    public $sortable = ['updated_at'];

    protected static function booted()
    {
        parent::booted();
        static::creating(function (self $blog) {
            $blog->uid = self::uuid();
        });
    }

    protected static function uuid(): string
    {
        do {
            $uuid = Str::uuid();
        } while (self::whereUid($uuid)->exists());

        return $uuid;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
