<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Category;

class delete_category extends Command
{
    
    protected $signature = 'delete:category {id}';

    
    protected $description = 'delete Category ';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $id = $this->argument('id');
        $category = Category::find($id);  
        $category->delete();
        $this->info("Category is deleted.");
        

    }
   
}
