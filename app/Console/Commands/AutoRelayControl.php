<?php

// namespace App\Console\Commands;

// use Illuminate\Console\Command;
// use App\Models\Relay;
// use App\Models\RelaySchedule;
// use Carbon\Carbon;

// class AutoRelayControl extends Command
// {
//     protected $signature = 'relay:control';
//     protected $description = 'Automatically turns relays on/off based on schedule';

//     public function handle()
//     {
//         $currentMinute = now()->minute;
//         $status = ($currentMinute % 2 == 0) ? 1 : 0;
    
//         // Update all relays instead of just relay ID 1
//         Relay::query()->update(['relay_status' => $status]);
    
//         $this->info("All relays updated to status: $status at minute: $currentMinute");
//     }
    

//} 
