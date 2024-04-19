<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumAbonent extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id_abonents',
        'id_num',
    ];
    public $table = 'num_abonent';

    public function abonents()
    {
        return $this->hasMany(Abonents::class);
    }

    public function telephones()
    {
        return $this->hasMany(Telephone::class, 'id_num');
    }

    public $primaryKey = 'id_num_abonent';


}