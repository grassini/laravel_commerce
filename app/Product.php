<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'featured',
        'recommend'
    ];

    /*Um produto tem muitas imagens*/
    public function images()
    {
        return $this->hasMany('CodeCommerce\ProductImage');
    }


    /*Uma Categoria tem muitos produtos*/
    public function category()
    {
        return $this->belongsTo('CodeCommerce\Category');
    }

}
