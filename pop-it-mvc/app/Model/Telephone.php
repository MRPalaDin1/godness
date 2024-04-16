<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'room_num',
        'num'
    ];

    public function numberPhone()
    {
        return $this->belongsTo(NumAbonent::class, 'id_num');
    }
}
