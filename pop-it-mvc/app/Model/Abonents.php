<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];
    public $table = 'abonents';

    public $primaryKey = 'id_abonents';

    public function num_abonent()
    {
        return $this->hasOne(NumAbonent::class, 'id_abonents');
    }
}
