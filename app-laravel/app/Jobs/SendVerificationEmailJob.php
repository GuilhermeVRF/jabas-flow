<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\VerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Cache;

class SendVerificationEmailJob implements ShouldQueue
{
    use Queueable;
    private User $user;
    /**
     * Create a new job instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Cache::put("lastVerifyEmailTime-{$this->user->email}", now(), 1);
        $this->user->notify(new VerifyEmail());
    }
}
