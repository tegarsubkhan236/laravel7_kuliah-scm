<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDikerjakan extends Model
{
    public function worker()
    {
        return $this->belongsTo(Worker::class, "worker_id");
    }
    public function order()
    {
        return $this->belongsTo(Order::class, "order_id");
    }
    public function tempStock()
    {
        return $this->belongsTo(TemporaryStock::class, "tempStock_id");
    }
}
