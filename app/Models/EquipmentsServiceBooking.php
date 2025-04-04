<?php

namespace App\Models;

use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class EquipmentsServiceBooking extends Model
{
    protected $fillable = ['chat_id', 'booking_date'];
    public function equipmentsServices(): BelongsToMany
    {
        return $this->belongsToMany(EquipmentsService::class, 'booked_equipments_services','booking_id', 'equipments_service_id');
    }

    public function chat(): BelongsTo
    {
        return $this->belongsTo(TelegraphChat::class, 'chat_id', 'id');
    }
}
