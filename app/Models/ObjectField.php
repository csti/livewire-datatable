<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\SchemalessAttributes\SchemalessAttributes;

class ObjectField extends Model
{

    protected $fillable = ['name','type','options'];

    public $casts = [
        'options' => 'array',
    ];

    public function getOptionsAttribute(): SchemalessAttributes
    {
        return SchemalessAttributes::createForModel($this, 'options');
    }

    public function scopeWithOptions(): Builder
    {
        return SchemalessAttributes::scopeWithSchemalessAttributes('options');
    }

    public function object () 
    {
    	return $this->belongsTo('App\Models\DbObject', 'object_id', 'id');
    }

}

