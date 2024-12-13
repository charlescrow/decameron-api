<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DistributionHotel extends Model
{

    // protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'hotel_id',
        'number_room',
        'type_room_id',
        'accommodation_room_id'
    ];

    /**
     * Relación con la tabla Hotel uno a uno
     * @return relation
     */
    public function hotel()
    {
        return $this->hasOne(Hotel::class, 'id', 'hotel_id');
        
    }

    /**
     * Relación con la tabla TypeRoom uno a uno
     * @return relation
     */
    public function typeRoom()
    {
        return $this->hasOne(TypeRoom::class, 'id', 'type_room_id');
    }

    /**
     * Relación con la tabla accommodationRoom uno a uno
     * @return relation
     */
    public function accommodationRoom()
    {
        return $this->hasOne(AccommodationRoom::class, 'id', 'accommodation_room_id');
    }
}
