<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public $table = 'rooms';

    public $timestamps = false;
    protected $fillable = [
        'title',
        'view',
        'id_division',
        'updated_at',
        'created_at'
    ];

    protected $primaryKey = 'room_num';

    public function type()
    {
        return $this->hasOne(RoomType::class, 'view');
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'id_divisions');
    }

    public function telephones()
    {
        return $this->hasMany(Telephone::class, 'room_num');
    }
}