<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyaluran extends Model
{
    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    public function temp_stock()
    {
        return $this->belongsTo(TemporaryStock::class);
    }
}
