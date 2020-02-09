<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CzMagazineTitle extends Model
{
    protected $connection = "mysql";
    protected $table = "cz_magazine_title";
    public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
