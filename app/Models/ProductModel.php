<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    public $table ='product';
    public $guarded ='[]';

    public $timestamps = false;
}
