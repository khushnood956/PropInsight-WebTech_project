<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model {
    protected $guarded = [];

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function type() {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }

    public function images() {
        return $this->hasMany(PropertyImage::class);
    }
}
