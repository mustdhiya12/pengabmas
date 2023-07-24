<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $guarded = [];

    protected $appends = ['formatted_time'];

    public function getFormattedTimeAttribute()
    {
        return $this->formatReplyTime($this->created_at);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'comments_id');
    }

    public function likes()
    {
        return $this->hasMany(likes_com::class, 'comment_id');
    }
}

