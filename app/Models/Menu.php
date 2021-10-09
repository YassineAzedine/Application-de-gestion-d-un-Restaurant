<?php
namespace App\Models;
use App\Models\Servants;
use App\Models\Table;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Sales;

use Illuminate\Database\Eloquent\Model;





class Sales extends Model
{
    //
    protected $fillable =["user_id","quantity","total_price",
    "total_received","change","payment_type","payment_status"];
    public function menus()
    {
        $this->belongsToMany(Menu::class);

    }
    public function tables(){
        return $this->belongsToMany(table::class);
    }
    public function servant(){
        return $this->belongsTo(Servant::class);
    }
     
}
