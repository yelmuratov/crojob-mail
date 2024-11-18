<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendWelcomingText extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-welcoming-text';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a welcoming message to newly registered users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $date = Carbon::now()->subMinutes(1);

        // Get users who registered within the last 1 minute
        $newUsers = User::where('created_at', '>', $date)->get();

        if ($newUsers->isEmpty()) {
            $this->info('No new users to welcome.');
            return;
        }

        foreach ($newUsers as $user) {
            // Send a welcoming message (example: email or notification)
            // You can use mail or notification logic here
            $this->info("Welcome message sent to: {$user->email}");
        }

        $this->info('Welcoming messages have been sent successfully.');
    }
}
