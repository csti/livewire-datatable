<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\SchemalessAttributes\SchemalessAttributes;
use App\Scopes\ConnectionScope;
use App\User;

class Endpoint extends Model
{

   public function object () 
   {
      return $this->belongsTo('App\Models\DbObject', 'object_id', 'id');
   }
   public function parent () 
   {
      return $this->belongsTo('App\Models\Endpoint', 'parent_id', 'id');
   }
   public function actions () 
   {
      return $this->hasMany('App\Models\EndpointAction', 'endpoint_id');
   }
}

