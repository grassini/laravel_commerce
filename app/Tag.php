<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    protected $fillable = [
        'name'
    ];

	/*Relacionamento - Uma Tag tem muitos produtos*/
    public function products()
    {
        return $this->belongsToMany('CodeCommerce\Product');
    }

}
