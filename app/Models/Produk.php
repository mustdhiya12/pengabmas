<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    public $timestamps = false;
    
    use HasFactory;
    protected $guarded = [];

    public function gambarArray()
    {
        if ($this->gambar) {
            return explode("|", $this->gambar);
        }
        return [];
    }
    public function removeGambar($imageName)
{
    $existingImages = $this->gambarArray();
    $updatedImages = array_diff($existingImages, [$imageName]);
    $this->gambar = implode('|', $updatedImages);
    $this->save();
}

}


