<?php

namespace App\Jobs;

use App\Mail\AppointmentDue;
use App\Models\PatientAppointment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class DispatchAppointmentMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    $appointmentsToday = PatientAppointment::where('scheduled_for', date('Y-m-d'));
            foreach($appointmentsToday -> get() as $appointment) {
                Log::debug($appointment);
                Mail::to($appointment -> doctor) -> send(new AppointmentDue($appointment));

            }
    }
}
