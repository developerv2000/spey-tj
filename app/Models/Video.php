<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
  public static $tag = 'videos';

  use HasFactory;

  /**
   * The "booted" method of the model.
   *
   * @return void
   */
  protected static function booted()
  {
    // Delete video file while removing item
    static::deleting(function ($item) {
      $filePath = public_path('videos/' . $item->filename);

      if(file_exists($filePath)) {
        unlink($filePath);
      }
    });
  }
}
