<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class likes_com extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = ['user_id',];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'produk_id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
