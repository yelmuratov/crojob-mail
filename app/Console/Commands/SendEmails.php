<?php

namespace App\Console\Commands;

use App\Models\VerificationCode;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-old-codes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete verification codes older than 2 minutes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $date = Carbon::now()->subMinutes(2);
    
        VerificationCode::where('created_at', '<=', $date)->delete();
    
        $this->info('Old verification codes deleted successfully.');
    }
    
}
