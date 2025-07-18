<?php

namespace App\Jobs;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class ProcessOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $order;

    public function __construct(Order $order)
    {
        // Pass the order to the job
        $this->order = $order;
    }

    public function handle(): void
    {
        // Simulate processing logic
        Log::info('Processing order ID: ' . $this->order->id);
        // sleep(10);
        // For example, mark as completed
        $this->order->update(['status' => 'completed']);
    }
}
