<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'picture_path','username', 'name', 'email', 'password', 'user_type', 'api_key',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
