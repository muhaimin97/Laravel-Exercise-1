<?php

namespace Tests\Unit;

use Tests\TestCase;
//use PHPUnit\Framework\TestCase;

class PatientTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test__store()
    {
        
        /*
        $response = $this->get('patients');


        $this->assertTrue(true);
 
        //$this->assert((response()->json(['message'=>$message],201)), true);
        */
        
        $response = $this->call('POST','/patients', [
            'patientNationality' => 'SG',
            'patientNric' => 'S6666666F',
            'patientName' => 'bob',
            'patientGender' => 'male',
            'patientBirthDate' => '2001-03-01',
            'patientEmail' => 'bob@mail.com',
            'sampleUniqueId' => 'Sample06',
            'sampleResults' => 'Negative',
            'collectedDateTime' => '20221202 04:00',
            'effectiveDateTime' => '20221202 04:00'
        ]);
        //echo (string)$response;
        dd($response);
        
        //$this->assertStatus(201);
        //$this->assertTrue(true);
        
    }
    
}
