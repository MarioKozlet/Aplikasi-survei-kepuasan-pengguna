<?php

namespace App\Imports;

use App\Models\Survey;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ReviewsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Survey([
            'name' => $row['username'],  // Nama header sesuai dengan CSV
            'score'    => $row['score'],     // Nama header sesuai dengan CSV
            'date'       => $row['at'],        // Nama header sesuai dengan CSV
            'content'  => $row['content'],   // Nama header sesuai dengan CSV
        ]);
    }
}
