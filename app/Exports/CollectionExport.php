<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class CollectionExport implements FromCollection, WithStrictNullComparison
{
    private $collections;

    public function __construct($collections)
    {
        $this->collections = $collections;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->collections;
    }
}
