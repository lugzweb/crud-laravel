<?php
/**
 * Created by PhpStorm.
 * User: miko
 * Date: 25.08.17
 * Time: 10:09
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table='products';

    protected $fillable = [
        'title',
        'price'
    ];

}