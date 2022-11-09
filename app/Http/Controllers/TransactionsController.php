<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionsController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user')->get();

        return view('transactions.index', compact('transactions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'amount' => 'required',
            'currency' => 'required',
            'user_id' => 'required',
        ]);

        Transaction::create($request->all());

        return redirect()->route('transactions.index')
            ->with('message', 'Transaction created successfully.');
    }

    public function pending()
    {
        $transactions = Transaction::pending()->get();

        return view('transactions.index', compact('transactions'));
    }

    public function completed()
    {
        $transactions = Transaction::completed()->get();

        return view('transactions.index', compact('transactions'));
    }

    public function failed()
    {
        $transactions = Transaction::failed()->get();

        return view('transactions.index', compact('transactions'));
    }

    public function deposit()
    {
        $transactions = Transaction::deposit()->get();

        return view('transactions.index', compact('transactions'));
    }

    public function withdrawal()
    {
        $transactions = Transaction::withdrawal()->get();

        return view('transactions.index', compact('transactions'));
    }

    public function transfer()
    {
        $transactions = Transaction::transfer()->get();

        return view('transactions.index', compact('transactions'));
    }

    public function currency($currency)
    {
        $transactions = Transaction::currency($currency)->get();

        return view('transactions.index', compact('transactions'));
    }


}
