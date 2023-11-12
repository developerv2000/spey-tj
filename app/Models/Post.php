<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;
  public static $tag = 'posts';

  public function categories()
  {
    return $this->belongsToMany(Category::class);
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
      $item->categories()->detach();
    });
  }
}
