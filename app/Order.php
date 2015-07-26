<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'user_id',
        'total',
        'status'
    ];

    public function items()
    {
        //Acessando todas as Ordem
        return $this->hasMany('CodeCommerce\OrderItem');
    }



    public function user()
    {
        //Acessando o dono da Ordem
        return $this->belongsTo('CodeCommerce\User');
    }

}
