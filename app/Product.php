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

    /*Relacionamento - Um produto tem muitas imagens*/
    public function images()
    {
        return $this->hasMany('CodeCommerce\ProductImage');
    }


    /*Relacionamento - Uma Categoria tem muitos produtos*/
    public function category()
    {
        return $this->belongsTo('CodeCommerce\Category');
    }


    /*Relacionamento - Muitos produtos e Muitas tags*/
    public function tags()
    {
        return $this->belongsToMany('CodeCommerce\Tag');
    }


//    public function getNameDescriptionAttribute()
//    {
//        return $this->name." - ".$this->description;
//
//    }

    public function getTagListAttribute()
    {
        $tags = $this->tags->lists('name');

        return implode(', ', $tags);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', '=', 1);
    }

    public function scopeRecommend($query)
    {
        return $query->where('recommend', '=', 1);
    }

    public function scopeCategory($query) {

        return $this->category()->findOrFail($query);
    }


}
