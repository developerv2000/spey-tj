<?php

/**
 * Custom Helper class
 *
 * @author Bobur Nuridinov <bobnuridinov@gmail.com>
 */

namespace App\Support;

use App\Models\Atx;
use App\Models\Category;
use App\Models\Nosology;
use App\Models\Post;
use App\Models\Product;
use App\Models\Top;
use App\Models\Video;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Image;

class Helper
{
  /**
   * Generate unique slug for the given model
   *
   * @param string $string Generates slug from given string
   * @param string $model Model Classname with full namespace
   * @param integer $ignoreId ignore slug of a model with a given id (used while updating model)
   * @return string
   */
  public static function generateUniqueSlug($string, $model, $ignoreId = null)
  {
    $search = [
      'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п',
      'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я',
      'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П',
      'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я',
      'ӣ', 'ӯ', 'ҳ', 'қ', 'ҷ', 'ғ', 'Ғ', 'Ӣ', 'Ӯ', 'Ҳ', 'Қ', 'Ҷ',
      ' ', '_'
    ];

    $replace = [
      'a', 'b', 'v', 'g', 'd', 'e', 'io', 'zh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p',
      'r', 's', 't', 'u', 'f', 'h', 'ts', 'ch', 'sh', 'shb', 'a', 'i', 'y', 'e', 'yu', 'ya',
      'a', 'b', 'v', 'g', 'd', 'e', 'io', 'zh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p',
      'r', 's', 't', 'u', 'f', 'h', 'ts', 'ch', 'sh', 'shb', 'a', 'i', 'y', 'e', 'yu', 'ya',
      'i', 'u', 'h', 'q', 'j', 'g', 'g', 'i', 'u', 'h', 'q', 'j',
      '-', '-'
    ];

    // manual transilation
    $transilation = str_replace($search, $replace, $string);

    // auto transilation
    $transilation = Str::ascii($transilation);

    // remove unwanted characters
    $transilation = preg_replace('~[^-\w]+~', '', $transilation);

    // remove duplicate divider
    $transilation = preg_replace('~-+~', '-', $transilation);

    // trim
    $transilation = trim($transilation, '-');

    // lowercase
    $slug = strtolower($transilation);

    // escape duplicate slug
    $counter = 1;
    $originalSlug = $slug;

    while ($model::where('slug', $slug)->where('id', '!=', $ignoreId)->first()) {
      $slug = $originalSlug . '-' . $counter;
      $counter++;
    }

    return $slug;
  }

  /**
   * remove tags, decode htmlspecialchars, trim and remove whitespaces
   * cut string if length given
   * and return clean text
   *
   * used while sharing in socials/messangers
   *
   * @param string $string
   * @param integer $length
   * @return string
   */
  public static function cleanText($string, $length = null)
  {
    $cleaned = preg_replace('#<[^>]+>#', ' ', $string); // remove tags
    $cleaned = htmlspecialchars_decode($cleaned); // decode htmlspecialchars
    $cleaned = str_replace('&nbsp;', ' ', $cleaned); // &nbsp to space
    $cleaned = preg_replace('!\s+!', ' ', $cleaned); // many spaces into one
    $cleaned = trim($cleaned); // remove whitespaces

    if ($length) {
      $cleaned = mb_strlen($cleaned) < $length ? $cleaned : mb_substr($cleaned, 0, ($length - 4)) . '...'; // cut length
    }

    return $cleaned;
  }

  /**
   * remove tags, decode htmlspecialchars, trim and remove whitespaces
   * cut string if length given
   * and return clean text
   *
   * used while sharing in socials/messangers
   *
   * @param string $string
   * @return string
   */
  public static function generateShareText($string)
  {
    $cleaned = preg_replace('#<[^>]+>#', ' ', $string); //remove tags
    $cleaned = htmlspecialchars_decode($cleaned); // decode htmlspecialchars
    $cleaned = str_replace('&nbsp;', ' ', $cleaned); // &nbsp to space
    $cleaned = preg_replace('!\s+!', ' ', $cleaned); // many spaces into one
    $cleaned = trim($cleaned); // remove whitespaces
    $cleaned = mb_strlen($cleaned) < 160 ? $cleaned : mb_substr($cleaned, 0, 156) . '...'; //cut length

    return $cleaned;
  }

  /**
   * Return reversed order type
   *
   * used only in dashboard
   *
   * @param string $orderType
   * @return string
   */
  public static function reverseOrderType($orderType)
  {
    return $orderType == 'asc' ? 'desc' : 'asc';
  }

  /**
   * Fill Eloquent Model Items fields from request by loop. Used while storing & updating Eloquent Model item
   *
   * @param \Http\Request $request
   * @param \Eloquent\Model $model
   * @param array $fields
   * @return void
   */
  public static function fillModelColumns($model, $fields, $request,)
  {
    foreach ($fields as $field) {
      $model[$field] = $request[$field];
    }
  }

  /**
   * Upload models file & update models column. Images can be resized after upload
   *
   * Resizing (Only Images) works only if width or height is given
   * Image will be croped from the center, If both width and height are given (fit)
   * Else if one of the parameters is given (width or height), another will be calculated auto (aspectRatio)
   *
   * @param \Http\Request $request
   * @param \Eloquent\Model\ $model
   * @param string $column Requested file input name and Models column name
   * @param string $name Name for newly creating file
   * @param string $path Path to store
   * @param integer $width Width for resize
   * @param integer $height Height for resize
   * @return void
   */
  public static function uploadModelsFile($request, $model, $column, $name, $path, $width = null, $height = null)
  {
    // Any file input maybe nullable on model update
    $file = $request->file($column);
    if ($file) {
      // shorten filename length
      if(mb_strlen($name) > 60) {
        $name = mb_substr($name, 0, 60);
        $name = trim($name);
      }

      $filename = $name . '.' . $file->getClientOriginalExtension();
      $filename = Helper::renameIfFileAlreadyExists($filename, $path);

      $fullPath = public_path($path);

      $file->move($fullPath, $filename);
      $model[$column] = $filename;

      //resize image
      if ($width || $height) {
        $image = Image::make($fullPath . '/' . $filename);

        // fit
        if ($width && $height) {
          $image->fit($width, $height, function ($constraint) {
            $constraint->upsize();
          }, 'center');

          // aspect ratio
        } else {
          $image->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
          });
        }

        $image->save($fullPath . '/' . $filename);
      }
    }
  }

  /**
   * Make thumb from original and store it in thumbs folder
   * Image will be croped from the center, If both width and height are given (fit)
   * Else if one of the parameters is given (width or height), another will be calculated auto (aspectRatio)
   * Thumbs will be saved in original-path/thumbs folder
   *
   * ---WARNING---
   * To escape errors, thumbs folder must exists in original path
   *
   * @param string $path Path of original image
   * @param string $filename Name of original image
   * @param integer $width Width of thumb in pixels
   * @param integer $height Height of thumb in pixels
   * @return void
   */
  public static function createThumb($path, $filename, $width = 400, $height = null)
  {
    $fullPath = public_path($path);
    $thumb = Image::make($fullPath . '/' . $filename);

    // fit
    if ($width && $height) {
      $thumb->fit($width, $height, function ($constraint) {
        $constraint->upsize();
      }, 'center');

      // aspect ration
    } else {
      $thumb->resize($width, $height, function ($constraint) {
        $constraint->aspectRatio();
      });
    }

    $thumb->save($fullPath . '/thumbs//' . $filename);
  }

  /**
   * Rename file if file with the given name is already exists on the given folder
   * Renaming type => oldName(i)
   *
   * @param string $filename
   * @param string $path
   * @return string
   */
  public static function renameIfFileAlreadyExists($filename, $path)
  {
    $name = pathinfo($filename, PATHINFO_FILENAME);
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $fullPath = public_path($path) . '/';

    $counter = 1;
    $originalName = $name;

    while (file_exists($fullPath . $filename)) {
      $name = $originalName . '(' . $counter . ')';
      $filename = $name . '.' . $extension;
      $counter++;
    }

    return $filename;
  }

  public static function getPreviousRouteName()
  {
    return app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
  }


  /**
   * Return models tag for current route
   * Shared with all dashboard views by AppServiceProvider
   *
   * used only in dashboard
   *
   * @return string
   */
  public static function getModelTag()
  {
    $route = Route::currentRouteName();
    $modelTag = 'undefined';

    if (strpos($route, 'products') !== false) {
      return Product::$tag;
    }

    if (strpos($route, 'atx') !== false) {
      return Atx::$tag;
    }

    if (strpos($route, 'nosology') !== false) {
      return Nosology::$tag;
    }

    if (strpos($route, 'posts') !== false) {
      return Post::$tag;
    }

    if (strpos($route, 'categories') !== false) {
      return Category::$tag;
    }

    if (strpos($route, 'top') !== false) {
      return Top::$tag;
    }

    if (strpos($route, 'videos') !== false) {
      return Video::$tag;
    }

    return $modelTag;
  }


  public function copyDb()
  {
    // copying categories
    Jatx::all()->each(function ($j) {
      $c = new Atx();
      $c->id = $j->id;
      $c->title = $j->name;
      $c->slug = Helper::generateUniqueSlug($j->name, Atx::class);
      $c->save();
    });

    // copying categories
    Josology::all()->each(function ($j) {
      $c = new Nosology();
      $c->id = $j->id;
      $c->title = $j->name;
      $c->slug = Helper::generateUniqueSlug($j->name, Nosology::class);
      $c->save();
    });


    // Posts
    Jost::orderBy('id')->each(function ($old) {
      $new = new Post();
      $new->id = $old->id;
      $new->title = $old->title;
      $new->slug = Helper::generateUniqueSlug($new->title, Post::class);

      $extension = pathinfo($old->pdf, PATHINFO_EXTENSION);
      $newPdfName = $new->slug > 60 ? mb_substr($new->slug, 0, 60) . '.' . $extension : $new->slug . '.' . $extension;
      rename(public_path('pdf/josts/' . $old->pdf), public_path('pdf/posts/' . $newPdfName));
      $new->pdf = $newPdfName;

      $extension = pathinfo($old->image, PATHINFO_EXTENSION);
      $newImageName = $new->slug > 60 ? mb_substr($new->slug, 0, 60) . '.' . $extension : $new->slug . '.' . $extension;
      rename(public_path('img/josts/' . $old->image), public_path('img/posts/' . $newImageName));
      $new->image = $newImageName;

      $new->body = $old->text;
      $new->scientific = true;
      $new->interesting = rand(0, 1);

      $new->save();
    });



    // products
    Jroduct::orderBy('id')->each(function ($old) {
      $new = new Product();
      $new->id = $old->id;
      $new->title = $old->name;
      $new->slug = Helper::generateUniqueSlug($new->title, Product::class);
      $new->prescription = $old->rx;

      $extension = pathinfo($old->image, PATHINFO_EXTENSION);
      $newImageName = $new->slug > 60 ? mb_substr($new->slug, 0, 60) . '.' . $extension : $new->slug . '.' . $extension;
      rename(public_path('img/jroducts/' . $old->image), public_path('img/products/' . $newImageName));
      $new->image = $newImageName;

      $extension = pathinfo($old->instruction, PATHINFO_EXTENSION);
      $newPdfName = $new->slug > 60 ? mb_substr($new->slug, 0, 60) . '.' . $extension : $new->slug . '.' . $extension;
      rename(public_path('pdf/jinstructions/' . $old->instruction), public_path('pdf/instructions/' . $newPdfName));
      $new->instruction = $newPdfName;

      $new->external_link = $old->salomat_url;
      $new->popular = rand(0, 1);
      $new->description = $old->description;
      $new->composition = $old->composition;
      $new->indication = $old->testimony;
      $new->usage = $old->use;

      $new->save();
    });

    // create thumbs
    Product::orderBy('id')->each(function ($prod) {
      Helper::createThumb('img/products', $prod->image, 380);
    });


    // deleting removed items relations
    DB::table('atx_product')->get()->each(function ($item) {
      $atx = Atx::find($item->atx_id);
      $product = Product::find($item->product_id);

      if (!$atx) {
        DB::table('atx_product')->where('atx_id', $item->atx_id)->delete();
      }

      if (!$product) {
        DB::table('atx_product')->where('product_id', $item->product_id)->delete();
      }
    });

    DB::table('nosology_product')->get()->each(function ($item) {
      $nos = Nosology::find($item->nosology_id);
      $product = Product::find($item->product_id);

      if (!$nos) {
        DB::table('nosology_product')->where('nosology_id', $item->nosology_id)->delete();
      }

      if (!$product) {
        DB::table('nosology_product')->where('product_id', $item->product_id)->delete();
      }
    });
  }
}
