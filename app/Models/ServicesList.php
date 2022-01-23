<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicesList extends Model
{
    protected $table = 'serviceslist';
    protected $fillable = ['ser_cate_id','title','description','price','duration'];

    public function service_category()
    {
        return $this->belongsTo(ServiceCategory::class,'ser_cate_id','id');
    }
}
