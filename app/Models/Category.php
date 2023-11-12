<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  use HasFactory;

  public $timestamps = false;
  public static $tag = 'categories';

  public function posts()
  {
    return $this->belongsToMany(Post::class);
  }

  public function scopeScientific()
  {
    return $this->where('scientific', true);
  }

  public function scopeInteresting()
  {
    return $this->where('interesting', true);
  }

  /**
   * The "booted" method of the model.
   *
   * @return void
   */
  protected static function booted()
  {
    // Delete model relations while removing item
    static::deleting(function ($item) {
      $item->posts()->detach();
    });
  }
}
