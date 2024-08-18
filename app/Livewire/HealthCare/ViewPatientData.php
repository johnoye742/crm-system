<?php


namespace App\Livewire\HealthCare;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Livewire\Component;

class ViewPatientData extends Component
{
    public $patient;
    public $patient_record;

  public function mount(User $user, User $patient)
  {
      $this->patient = $patient;
  }

  private function getPatient(string $name)
  {
      // Replace with your logic to retrieve patient by name
      // This could be a database query or other method
      $decryptedRecords = [];

      foreach(User::where('name', $name) -> first() -> records as $record) {
          array_push($decryptedRecords, [[
              'doctor_name' => $record -> doctor -> name,
              'visit_reason' => Crypt::decryptString($record['visit_reason']),
              'diagnosis' => Crypt::decryptString($record['diagnosis']),
              'treatment' => Crypt::decryptString($record['treatment']),
              'prescription' => Crypt::decryptString($record['prescription']),
              'notes' => Crypt::decryptString($record['notes']),
              'visit_date' => $record['visit_date'],
              'follow_up_date' => $record['follow_up_date'],
              'doctor_id' => $record -> doctor -> id
          ]]);
      }

      return json_encode($decryptedRecords);
  }

  public function analyzePatient()
  {
      $prompt = "Analyze the patient " . $this->patient->name;

      $functions = [
          [
              'name' => 'getPatient',
              'description' => 'Gets the record of the patient with the name in the arguments for analysis',
              'parameters' => [
                  'type' => 'object',
                  'properties' => [
                      'name' => ['type' => 'string', 'description' => 'The name of the patient being analyzed']
                  ]
              ]
        ]
      ];
        $prompt = "Diagnose the patient ".$this -> patient -> name;
        $request_body = [
            "contents" => [
                "role" => "user",
                "parts" => [
                    "text" => $prompt
                ]
            ],
            "tools" => [
                [
                    "function_declarations" => $functions
                ]
            ]
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            // Add necessary authorization headers
        ])->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key=' . env('GEMINI_API_KEY'), $request_body);
        Log::debug($response);
      if ($response->successful()) {
          $data = $response->json();
          Log::debug($data['candidates'][0]['content']['parts'][0]['functionCall']);
          $functionCall = $data['candidates'][0]['content']['parts'][0]['functionCall'];
          if (isset($functionCall)) {
              $functionName = $functionCall['name'];
              $arguments = $functionCall['args'];

              if ($functionName === 'getPatient') {
                  $patientData = $this->$functionName($arguments['name']);
                  // Use the patient data for analysis (optional)

                  // Prepare the response to send back to Gemini
                  $body = [
                      "contents" => [
                          [
                            "role" => "user",
                            "parts" => [
                                "text" => $prompt
                            ]
                          ],
                          $data['candidates'][0]['content'],
                          [
                              "role" => "function",
                              "parts" => [

                                      "functionResponse" => [
                                          'name' => 'getPatient',
                                          'response' => [
                                              'name' => 'getPatient',
                                              "content" => $patientData
                                          ],

                                      ]

                              ]
                          ]
                      ],
                    "tools" => [
                        [
                            "function_declarations" => $functions
                        ]
                    ]

                  ];

                  $followUpRequest = Http::withHeaders([
                      'Content-Type' => 'application/json',
                      // Add necessary authorization headers
                  ])->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key=' . env('GEMINI_API_KEY'), $body);

                  Log::debug(json_encode($body));


                  if ($followUpRequest->successful()) {
                      Log::debug($followUpRequest);

                      return $followUpRequest['candidates'][0]['content']['parts'][0]['text'];
                  } else {
                      Log::error('Failed to send response to Gemini function call: ' . $followUpRequest->json()['error']['message']);
                  }
              }
          }
      } else {
          Log::error('Failed to call Gemini API: ' . $response->json()['error']['message']);
      }
  }

  public function render(): View
  {
      $medical_record = $this->patient->records()->orderBy('id', 'DESC')->get();
      $this -> patient_record = $medical_record;
      $analysis = $this->analyzePatient();
      return view('livewire.health-care.view-patient-data', [
          "patient" => $this->patient,
          "emergency_contact" => $this->patient->emergency_contact,
          "medical_record" => $medical_record,
          "analysis" =>  $analysis
      ])->title("View Patient - " . $this->patient->name);
  }

  public function decode(string $json): array
  {
      return json_decode($json, true);
  }
}
