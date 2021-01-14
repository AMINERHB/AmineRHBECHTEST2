<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Category;

class add_category extends Command
{

    protected $signature = 'new:category {name} {CategoryP}';

    
    protected $description = 'Add a new Category';

    
    public function __construct()
    {
        parent::__construct();
    }

    
    public function handle()
    {
        $categories = Category::create([
            'name' => $this->argument('name'),
            'CategoryP' => $this->argument('CategoryP'),
        ]);
        $this->info('Add new Category is succces : '.$categories->name);
    }
}
