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


    public function getTagListAttribute()
    {
        $tags = $this->tags->lists('name');

        return implode(', ', $tags);

       /*
        $tags = [];
        foreach ($this->tags as $tag) {
            $tags[] = $tag->name;
        }

        return implode(', ', $tags);
        */

    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', '=', 1);
    }


    public function scopeRecommend($query)
    {
        return $query->where('recommend', '=', 1);
    }


    public function scopeOfCategory($query, $type)
    {
        return $query->where('category_id', '=', $type);
    }


    public function scopeOfTag($query, $type){
        return $query->whereHas('tags', function($q) use ($type){
            $q->where('id', '=', $type);
        });
    }




}
