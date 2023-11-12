<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Top extends Model
{
  use HasFactory;
  public static $tag = 'top';

  public $timestamps = false;

  public function product()
  {
    return $this->belongsTo(Product::class);
  }
}
