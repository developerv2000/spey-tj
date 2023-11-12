<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public static $tag = 'products';

  use HasFactory;

  public function nosology()
  {
    return $this->belongsToMany(Nosology::class);
  }

  public function atx()
  {
    return $this->belongsToMany(Atx::class);
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
      $item->nosology()->detach();
      $item->atx()->detach();
    });
  }
}
