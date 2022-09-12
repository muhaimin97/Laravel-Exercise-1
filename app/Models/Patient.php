<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['patientNationality', 'patientNric','patientName','patientGender','patientBirthDate','patientEmail', 'sampleUniqueId','sampleResults','collectedDateTime', 'effectiveDateTime'];

    

}
