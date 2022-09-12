<?php

namespace App\Http\Controllers;

use App\Models\Patient;

use Validator;

use Illuminate\Http\Request;

use Jekk0\laravel\Iso3166\Validation\Rules\Iso3166Alpha2;

class PatientCOntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Patient::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        /*
        $country_code = (new Iso3166Alpha2())->setErrorMessage('This attirbute is not in the ISO3166 Alpha2 Notation');

        $request->validate([
            'patientNationality' => ['required', $country_code],
            'patientNric' => 'required',
            'patientName' => 'required',
            'patientGender' => 'required',
            'patientBirthDate' => 'required',
            'patientEmail' => 'required|email',
            'sampleUniqueId' => 'required',
            'sampleResults' => 'required',
            'collectedDateTime' => 'required|iso_date',
            'effectiveDateTime' => 'required|iso_date',
        ]);
        //'patientBirthDate' => 'required|date_format:yyyy-mm-dd'
        return Patient::create($request->all());
        */
       if($request->ismethod('post'))
       {
            $data = $request->all();
        /*
            $data = $request->all();
            if ($data == null){
                echo "null";
            }
            else {
                echo $data['patientNationality'];
            }
            */
            
            $country_code = (new Iso3166Alpha2())->setErrorMessage('This attirbute is not in the ISO3166 Alpha2 Notation');

            $request->validate([
                'patientNationality' => ['required', $country_code],
                'patientNric' => 'required',
                'patientName' => 'required',
                'patientGender' => 'required|gender',
                'patientBirthDate' => 'required|date_format:yyyy-mm-dd',
                'patientEmail' => 'required|email',
                'sampleUniqueId' => 'required',
                'sampleResults' => 'required',
                'collectedDateTime' => 'required|iso_date',
                'effectiveDateTime' => 'required|iso_date',
            ]);

            $patient = new Patient();
            $patient->patientNationality = $data['patientNationality'];
            $patient->patientNric = $data['patientNric'];
            $patient->patientName = $data['patientName'];
            $patient->patientGender = $data['patientGender'];
            $patient->patientBirthDate = $data['patientBirthDate'];
            $patient->patientEmail = $data['patientEmail'];
            $patient->sampleUniqueId = $data['sampleUniqueId'];
            $patient->sampleResults = $data['sampleResults'];
            $patient->collectedDateTime = $data['collectedDateTime'];
            $patient->effectiveDateTime = $data['effectiveDateTime'];
            $patient->save();
            $message = "Patient successfully saved";
            return response()->json(['message'=>$message],201);
            
       }
    }

    public function storeMultiple(Request $request)
    {
        if($request->ismethod('post')) {
            $data = $request->all();           
            
            $country_code = (new Iso3166Alpha2())->setErrorMessage('This attirbute is not in the ISO3166 Alpha2 Notation');

            $rules = [
                'patients.*.patientNationality' => ['required', $country_code],
                'patients.*.patientNric' => 'required',
                'patients.*.patientName' => 'required',
                'patients.*.patientGender' => 'required|gender',
                'patients.*.patientBirthDate' => 'required',
                'patients.*.patientEmail' => 'required|email',
                'patients.*.sampleUniqueId' => 'required',
                'patients.*.sampleResults' => 'required',
                'patients.*.collectedDateTime' => 'required|iso_date',
                'patients.*.effectiveDateTime' => 'required|iso_date',
            ];

            $validator = Validator::make($data,$rules);
            
            if($validator->fails()){
                return response()->json($validator->errors(),442);
            }

            foreach($data['patients'] as $record) {
  
                $patient = new Patient();
                $patient->patientNationality = $record['patientNationality'];
                $patient->patientNric = $record['patientNric'];
                $patient->patientName = $record['patientName'];
                $patient->patientGender = $record['patientGender'];
                $patient->patientBirthDate = $record['patientBirthDate'];
                $patient->patientEmail = $record['patientEmail'];
                $patient->sampleUniqueId = $record['sampleUniqueId'];
                $patient->sampleResults = $record['sampleResults'];
                $patient->collectedDateTime = $record['collectedDateTime'];
                $patient->effectiveDateTime = $record['effectiveDateTime'];
                $patient->save();
                $message = "Patient successfully saved";
                return response()->json(['message'=>$message],201);
                
            }
        }
        /*
        if($request->ismethod('post'))
       {
            $data = $request->all();
            echo "string";
            
            $country_code = (new Iso3166Alpha2())->setErrorMessage('This attirbute is not in the ISO3166 Alpha2 Notation');

            $request->validate([
                'patientNationality' => ['required', $country_code],
                'patientNric' => 'required',
                'patientName' => 'required',
                'patientGender' => 'required',
                'patientBirthDate' => 'required',
                'patientEmail' => 'required|email',
                'sampleUniqueId' => 'required',
                'sampleResults' => 'required',
                'collectedDateTime' => 'required|iso_date',
                'effectiveDateTime' => 'required|iso_date',
            ]);
            foreach($data['patients'] as $record) {
                $patient = new Patient();
                $patient->patientNationality = $record['patientNationality'];
                $patient->patientNric = $record['patientNric'];
                $patient->patientName = $record['patientName'];
                $patient->patientGender = $record['patientGender'];
                $patient->patientBirthDate = $record['patientBirthDate'];
                $patient->patientEmail = $record['patientEmail'];
                $patient->sampleUniqueId = $record['sampleUniqueId'];
                $patient->sampleResults = $record['sampleResults'];
                $patient->collectedDateTime = $record['collectedDateTime'];
                $patient->effectiveDateTime = $record['effectiveDateTime'];
                $patient->save();
                $message = "Patient successfully saved";
                return response()->json(['message'=>$message],201);
            }
            
            
       }
       else {
            echo "not post";
       }
       */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
        $success= $patient->delete();

        return [
            'success' => $success
        ];
    }
}
