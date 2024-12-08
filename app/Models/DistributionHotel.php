<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DistributionHotel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'hotel_id',
        'number_room',
        'type_room_id',
        'acommodation_room_id'
    ];
}
