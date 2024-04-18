<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Abonents extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'surname',
        'patron',
        'date',
        'num',
        'img'
    ];
    public $table = 'abonents';

    public $primaryKey = 'id_abonents';

    public function num_abonent()
    {
        return $this->hasOne(NumAbonent::class, 'id_abonents');
    }

    public function telephones(): BelongsToMany
    {
        return $this->belongsToMany(Telephone::class, 'num_abonent', 'id_abonents', 'id_num');
    }

    public function rooms(): HasManyThrough
    {
        return $this->hasManyThrough(Telephone::class, Room::class,
            'id_division',
            'room_num',
            'id_division',
            'room_num'
        );
    }
}
