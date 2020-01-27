<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\SchemalessAttributes\SchemalessAttributes;
use App\Scopes\ConnectionScope;
use App\User;

class DbObject extends Model
{
    public $casts = [
        'options' => 'array',
    ];

    protected $table = 'objects';

    protected static function boot()
    {
        parent::boot();
    }
    

    public function getOptionsAttribute(): SchemalessAttributes
    {
        return SchemalessAttributes::createForModel($this, 'options');
    }

    public function scopeWithOptions(): Builder
    {
        return SchemalessAttributes::scopeWithSchemalessAttributes('options');
    }

    public function fields () 
    {
    	return $this->hasMany('App\Models\ObjectField', 'object_id');
    }
    public function endpoints () 
    {
    	return $this->hasMany('App\Models\Endpoint', 'object_id');
    }
    public function databaseConnection ()
    {
        return $this->belongsTo('App\DatabaseConnection', 'database_connection_id');
    }

}

