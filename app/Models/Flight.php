<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    public $nom;
    public $heure;

    public function __construct($nom, $heure)
    {
        $this->nom = $nom;
        $this->heure = $heure;
    }

    public static function findAll()
    {
        return [
            new Flight('AC12', '12:00'),
            new Flight('BD47', '14:00'),
            new Flight('TW14', '10:00'),
            new Flight('ZB24', '9:00')
        ];
    }

    public static function findOne($nom)
    {
        foreach (static::findAll() as $flight) {
            if ($flight->nom == $nom) {
                return $flight;
            }
        }
        return null;
    }
}
