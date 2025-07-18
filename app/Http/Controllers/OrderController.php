<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jobs\ProcessOrder;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id'    => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ]);
        DB::beginTransaction();

        try {

            // sleep(10);
            $order = Order::create([
                'user_id'    => $data['user_id'],
                'product_id' => $data['product_id'],
                'quantity'   => $data['quantity'],
                'status'     => 'pending',
            ]);

            // DB::commit();
            // throw new \Exception("Force rollback test");
            ProcessOrder::dispatch($order);
            DB::commit();
            return response()->json([
                'message' => 'Order placed and queued for processing.',
                'order'   => $order,
            ], 200);
        } catch (\Exception $e) {
            Log::error('database Rolled Back' . $e->getMessage());
            DB::rollBack();
            Log::error('Order creation failed: ' . $e->getMessage());

            return response()->json([
                'error' => 'Order creation failed. Please try again.',
            ], 500);
        }
    }

}
