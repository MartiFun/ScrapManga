<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
  use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'desc',
        'img',
        'auteur',
        'categorie',
    ];

    public function categories()
    {
      return $this->belongsToMany(Category::class);
    }


}
