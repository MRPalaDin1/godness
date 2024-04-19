<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Divisions extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'view'
    ];
    public $table = 'divisions';

    public $timestamps = false;

    public $primaryKey = 'id_division';

    public function num_abonent()
    {
        return $this->hasOne(NumAbonent::class, 'id_division');
    }

    public function telephones(): HasManyThrough
    {
        return $this->hasManyThrough(Telephone::class, Room::class,
            'id_division',
            'room_num',
            'id_division',
            'room_num'
        );
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

}