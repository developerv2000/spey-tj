<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atx extends Model
{
  use HasFactory;

  public $timestamps = false;
  public static $tag = 'atx';

  public function products()
  {
    return $this->belongsToMany(Product::class);
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
      $item->products()->detach();
    });
  }
}
