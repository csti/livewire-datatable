<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\SchemalessAttributes\SchemalessAttributes;

class EndpointAction extends Model
{

    protected $fillable = ['active'];

   public function endpoint () 
   {
      return $this->belongsTo('App\Models\Endpoint', 'endpoint_id', 'id');
   }

   public function getConditionsAttribute(): SchemalessAttributes
   {
       return SchemalessAttributes::createForModel($this, 'conditions');
   }
   public function scopeWithConditions(): Builder
   {
       return SchemalessAttributes::scopeWithSchemalessAttributes('conditions');
   }

   public function getValidationsAttribute(): SchemalessAttributes
   {
       return SchemalessAttributes::createForModel($this, 'validations');
   }
   public function scopeWithValidations(): Builder
   {
       return SchemalessAttributes::scopeWithSchemalessAttributes('validations');
   }

   public function getTransformationsAttribute(): SchemalessAttributes
   {
       return SchemalessAttributes::createForModel($this, 'transformations');
   }
   public function scopeWithTransformations(): Builder
   {
       return SchemalessAttributes::scopeWithSchemalessAttributes('transformations');
   }
}

