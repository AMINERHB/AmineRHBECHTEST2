<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Produit;

class add_produit extends Command
{
    
    protected $signature = 'new:produit {name} {description} {price} {image}';

    protected $description = 'Add a new Produit';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $produits = Produit::create([
            'name' => $this->argument('name'),
            'description' => $this->argument('description'),
            'price' => $this->argument('price'),
            'image' => $this->argument('image'),
        ]);
        $this->info('Add new Product is succces : '.$produits->name);
    }
}
