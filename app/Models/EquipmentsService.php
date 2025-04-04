<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EquipmentsService extends Model
{
    protected $fillable = ['type_id', 'title', 'description', 'price'];

    public function type(): BelongsTo
    {
        return $this->belongsTo(EquipmentsServicesType::class, 'type_id', 'id');
    }
}
