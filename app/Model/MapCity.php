<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MapCity extends Model
{
    protected $connection = 'mysql';
    protected $table = 'map_city';
    public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
