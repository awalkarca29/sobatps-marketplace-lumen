<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartShow;
use App\Http\Resources\TransactionShow;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiTransactionController extends Controller
{
    //! Contoh cara memanggil relasi antar tabel
    // $transaksiId = 1;
    // $transaksi = Transaction::with('product.user')->find($transaksiId);
    // $produk = $transaksi->product;
    // $seller = $produk->user->isAdmin;
    // dd($seller);
    //! ---------------------------------------

    public function indexAll()
    {
        $transaction = Transaction::all();
        return response()->json($transaction);
    }

    public function indexCart()
    {
        $user = auth()->guard('api')->user();
        $user = User::find($user->id);

        $cart = Transaction::with('product', 'seller')
            ->where('buyer_id', $user->id)
            ->where(function ($query) {
                $query->where('status', "pending")
                    ->orWhere('status', "accepted");
            })
            ->latest()
            ->get();

        return response()->json($cart);
    }

    public function indexCartDetail($id)
    {
        $user = auth()->guard('api')->user();
        $user = User::find($user->id);

        $cart = Transaction::with('product', 'seller')->find($id);

        return response()->json(new CartShow($cart));
    }

    public function indexHistory()
    {
        $user = auth()->guard('api')->user();
        $user = User::find($user->id);

        $history = Transaction::with('product', 'seller')
            ->where('buyer_id', $user->id)
            ->where('status', "done")
            ->latest()
            ->get();

        return response()->json($history);
    }

    public function indexNotification()
    {
        $user = auth()->guard('api')->user();
        $user = User::find($user->id);

        $notification = Transaction::with('product', 'seller')
            ->where('buyer_id', $user->id)
            ->where(function ($query) {
                $query->where('status', "rejected")
                    ->orWhere('status', "accepted");
            })
            ->latest()
            ->get();

        return response()->json($notification);
    }

    public function readNotification($id)
    {
        $user = auth()->guard('api')->user();
        $notification = Transaction::find($id);

        if ($user->id != $notification->buyer_id) {
            return response()->json([
                "success" => false,
                "message" => "You're not the owner of the notification!",
            ], 403);
        }

        $notification->isRead = true;
        $notification->save();

        return response()->json($notification);
    }

    public function index(Request $request)
    {
        $user = auth()->guard('api')->user();
        $user = User::find($user->id);

        $transaction = Transaction::with('product', 'seller')->where('buyer_id', $user->id)->latest()->get();

        if ($request['search_status']) {
            $searchStatus = $request['search_status'];
            $transaction = Transaction::with('product', 'seller')
                ->where('buyer_id', $user->id)
                ->where('status', 'like', '%' . $searchStatus . '%')
                ->latest()
                ->get();
        }

        return response()->json($transaction);
    }

    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'product_id' => 'required',
            'seller_id' => 'required',
            'quantities' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $user = auth()->guard('api')->user();

        $transaction = Transaction::create([
            'buyer_id' => $user->id,
            'product_id' => request('product_id'),
            'seller_id' => request('seller_id'),
            'status' => "pending",
            'quantities' => request('quantities'),
            'price' => request('price'),
        ]);

        $transaction->save();

        return response()->json($transaction);
    }

    public function show($id)
    {
        $user = auth()->guard('api')->user();
        $user = User::find($user->id);

        $transactions = Transaction::with('product', 'seller')->where('buyer_id', $user->id)->find($id);

        return response()->json(new TransactionShow($transactions));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(request()->all(), [
            'quantities' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $user = auth()->guard('api')->user();
        $transaction = Transaction::find($id);

        if ($user->id != $transaction->buyer_id) {
            return response()->json([
                "success" => false,
                "message" => "You're not the owner of the transaction!",
            ], 403);
        }

        $transaction->quantities = $request->quantities;
        $transaction->price = $request->price;
        $transaction->save();

        return response()->json($transaction);
    }

    public function updateStatus(Request $request, $id)
    {
        $validator = Validator::make(request()->all(), [
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $transaction = Transaction::find($id);
        $transaction->status = $request->status;
        $transaction->save();

        return response()->json($transaction);
    }

    public function destroy($id)
    {
        $user = auth()->guard('api')->user();
        $transaction = Transaction::find($id);

        if ($user->id != $transaction->buyer_id) {
            return response()->json([
                "success" => false,
                "message" => "You're not the owner of the transaction!",
            ], 403);
        }

        $transaction->delete();

        return response()->json($transaction);
    }
}
