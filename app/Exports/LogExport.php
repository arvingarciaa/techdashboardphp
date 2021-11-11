<?php

namespace App\Exports;

use App\Log;
use Maatwebsite\Excel\Concerns\FromCollection;

class LogExport implements FromCollection
{
    public function collection()
    {
        return Log::all();
    }
}