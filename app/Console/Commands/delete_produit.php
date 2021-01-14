<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Produit;

class delete_produit extends Command
{
    
    protected $signature = 'delete:produit {id}';

  
    protected $description = 'delete product';

    
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $id = $this->argument('id');
        $produit = Produit::find($id);  
        $produit->delete();
        $this->info("Produit is deleted.");
    }
}
