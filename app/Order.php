<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function marketing()
    {
        return $this->belongsTo(Marketing::class, 'marketing_id');
    }

    public function jenis()
    {
        return $this->belongsTo(JenisCuci::class, 'jenis_id');
    }

    // public function order_ditampung()
    // {
    //     return $this->hasMany(OrderDitampung::class);
    // }
}
