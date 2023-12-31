<?php

namespace App\Models;

use app\Enums\TableLocation;
use app\Enums\TableStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'guest_number', 'status', 'location'];
    protected $cast = [
        'status' => TableStatus::class,
        'location' => TableLocation:: class
    ];

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
}
