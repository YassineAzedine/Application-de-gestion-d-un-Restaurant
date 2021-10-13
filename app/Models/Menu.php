<?php
namespace App\Models;
use App\Models\Servant;
use App\Models\Table;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Sales;

use Illuminate\Database\Eloquent\Model;





class Menu extends Model
{
    //
    protected $fillable =["title","slug","description",
    "price","image","category_id"];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
