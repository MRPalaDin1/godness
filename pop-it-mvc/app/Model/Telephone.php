<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Telephone extends Model
{
    use HasFactory;
    public $primaryKey = 'id_num';
    public $timestamps = false;

    protected $fillable = [
        'room_num',
        'num'
    ];

    public function numberPhone()
    {
        return $this->belongsTo(NumAbonent::class, 'id_num');
    }

    public function abonents(): BelongsToMany
    {
        return $this->belongsToMany(Abonents::class, 'num_abonent', 'id_num', 'id_abonents');
    }

}
