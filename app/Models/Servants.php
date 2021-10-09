<?php

namespace App\Models;
use App\Models\Servants;
use App\Models\Table;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Sales;

use Illuminate\Database\Eloquent\Model;

class Servants extends Model
{
    //
    protected $fillable = ["name","address"];
    public function sales()
    {
        return $this->hasMany(Sales::class);
    }
}
