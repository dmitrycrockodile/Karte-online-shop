<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class DeleteNotVerifiedUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:delete-old';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes not verified users after a month without verification';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        User::where('email_verified_at', null)
            ->where('created_at', '<', now()->subMonth(1))
            ->delete();
    }
}
