<?php

namespace App\Console\Commands;

use App\Mail\Newsletter;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendNewsletter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'newsletter:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send monthly newsletter to subscribed users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $subscribed_users = User::where('is_subscribed', true)->get();
        $month = Carbon::now()->format('F');

        foreach ($subscribed_users as $subscribed_user) {
            Mail::to($subscribed_user->email)->send(new Newsletter($subscribed_user->name, $month));
        }

        $this->info('Newsletter sent to all subscribed users.');
    }
}
