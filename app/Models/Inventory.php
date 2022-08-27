<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventoryName',
        'weight',
        'type_id',
        'created_at',
        'updated_at',
    ];

    public function type()
     {
         return $this->belongsTo(Type::class,'type_id');
     }
}
