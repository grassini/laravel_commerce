<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{

    //Forçando o uso da Tabela 'order_items'
    protected $table = 'order_items';

    protected $fillable = [
        'product_id',
        'price',
        'qtd'
    ];


    public function order()
    {

        //Uma orderm tem diversos items
        return $this->belongsTo('CodeCommerce\Order');
    }


//    public function product()
//    {
//        return $this->belongsTo('CodeCommerce\Product');
//    }


}
