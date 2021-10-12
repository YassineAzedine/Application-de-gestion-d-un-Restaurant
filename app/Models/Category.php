<?php

namespace App\Models;
use App\Models\Servant;
use App\Models\Table;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Sales;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable =["title","slug"];
    public function menu()
    {
        return $this->hasMany(Menu::class);
    }
    

}
