<?php

namespace App\Console\Commands;

use App\Models\Budget;
use App\Models\Recurrence;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class RecurrenceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:recurrence-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $recurrences = Recurrence::with('budget')->get()->groupBy(function ($recurrence) {
            return optional($recurrence->budget)->user_id;
        });

        foreach($recurrences as $userId => $recurrenceGroup) {
            foreach ($recurrenceGroup as $recurrence) {
                $nextDate = $this->handleBudgetFrequency($recurrence->frequency, $recurrence->date);

                $budgetAlreadyExists = Budget::where('billing_date', $nextDate)
                    ->where('user_id', $userId)
                    ->where('recurrence_id', $recurrence->id)
                    ->exists();

                if ($budgetAlreadyExists) {
                    continue;
                }

                $counter = $recurrence->counter + 1;
                $recurrence->update([
                    'count' => $counter,
                ]);

                Budget::create([
                    'name' => $recurrence->budget->name,
                    'amount' => $recurrence->budget->amount,
                    'billing_date' => $nextDate,
                    'type' => $recurrence->budget->type,
                    'status' => $recurrence->budget->status,
                    'description' => $counter  . '° parcela de R$' . $recurrence->budget->amount . ' - ' . $recurrence->budget->name,
                    'user_id' => $userId,
                    'category_id' => $recurrence->budget->category_id,
                    'recurrence_id' => $recurrence->id,
                ]);
            }
        }
    }

    private function handleBudgetFrequency($frequency, $date){
        switch($frequency){
            case 'monthly': return Carbon::parse($date)->addMonth();
            case 'weekly': return Carbon::parse($date)->addWeek();
            case 'daily': return Carbon::parse($date)->addDay();
            default: return $date;
        }
    }
}
