<?php

namespace App\Console\Commands;

use App\Models\Question;
use Illuminate\Console\Command;

class DeleteOldSupportRequests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'questions:delete-old';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes user support request, if request was made more than a year ago';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Question::where('status', 'resolved')
            ->where('updated_at', '<', now()->subYear(1))
            ->delete();
    }
}
