<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = "Produits";
    public $timestamps = true;

    protected $fillable = [
		'name','description','price','image'
	];
}