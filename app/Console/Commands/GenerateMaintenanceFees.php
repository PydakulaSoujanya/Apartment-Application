<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ResidentDetail;
use App\Models\MaintenancePayment;

class GenerateMaintenanceFees extends Command
{
    protected $signature = 'maintenance:generate-fees';
    protected $description = 'Generate maintenance fees for all residents';

    public function handle()
    {
        // Fetch all resident details
        $residents = ResidentDetail::all();

        foreach ($residents as $resident) {
            // Calculate the maintenance fee (3 Rs per unit of area)
            $maintenance_fee = $resident->area * 3;

            // Check if a payment already exists for this month
            $exists = MaintenancePayment::where('user_id', $resident->user_id)
                ->whereMonth('payment_date', now()->month)
                ->whereYear('payment_date', now()->year)
                ->exists();

            if (!$exists) {
                // Create a new record in the maintenance_payments table
                MaintenancePayment::create([
                    'user_id' => $resident->user_id,
                    'amount' => $maintenance_fee,
                    'payment_date' => now(),
                ]);
            }
        }

        $this->info('Maintenance fees generated for all residents.');
    }
}
