<?php

namespace App\Http\Controllers;

use App\Events\AuditEvent;
use App\Models\Credit;
use App\Models\Product;
use Illuminate\Http\Request;


class CreditController extends Controller
{

    public function index()
    {
        $credits = Credit::latest()->paginate(15);
        $products = Product::all();

        return view('credits.index', compact('credits', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'other_price' => 'integer',
            'product_price' => 'integer',
            'product_amount' => 'integer',
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'comment' => 'required',
        ]);
        $credit = Credit::create([
            'other_price' => $request->input('other_price'),
            'product_price' => $request->input('product_price'),
            'product_amount' => $request->input('product_amount'),
            'total_price' => $this->calculateTotalPrice(
                $request->input('product_price'), 
                $request->input('product_amount'), 
                $request->input('other_price'),
            ),
            'product_id' => $request->input('product_id'),
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'comment' => $request->input('comment'),
            'given_date' => $request->input('given_date'),
        ]);

        $user = auth()->user()->name;
        $eventData = [
            'user' => $user,
            'event_type' => 'qo\'shildi',
            'credit_data' => $credit->toArray(),
        ];

        event(new AuditEvent($eventData));
    
    return redirect()->route('credits.index')->with('success', 'Qarzdorlik muvaffaqiyatli qo\'shildi');
    }

    public function show(Credit $credit)
    {   
        return view('credits.show', compact('credit'));
    }

    public function edit(Credit $credit)
    {
        $products = Product::all();
        return view('credits.edit', compact('credit', 'products'));
    }

    public function update(Request $request, Credit $credit)
    {
        $request->validate([
            'other_price' => 'integer',
            'product_price' => 'integer',
            'product_amount' => 'integer',
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'comment' => 'required',
        ]);
        $credit->update([
            'other_price' => $request->input('other_price'),
            'product_price' => $request->input('product_price'),
            'product_amount' => $request->input('product_amount'),
            'total_price' => $this->calculateTotalPrice(
                $request->input('product_price'), 
                $request->input('product_amount'), 
                $request->input('other_price'),
            ),
            'product_id' => $request->input('product_id'),
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'comment' => $request->input('comment'),
            'given_date' => $request->input('given_date'),
        ]);

        $user = auth()->user()->name;
            $eventData = [
                'user' => $user,
                'event_type' => 'yangilandi',
                'credit_data' => $credit->toArray(),
            ];

        event(new AuditEvent($eventData));
    

        return redirect()->route('credits.index')->with('info', 'Qarzdorlik muvaffaqiyatli yangilandi');
    }

    private function calculateTotalPrice($productPrice, $productAmount, $otherPrice)
    {
        return $otherPrice + ($productPrice * $productAmount);
    }

    public function destroy(Credit $credit)
    {
        $user = auth()->user()->name;
        $eventData = [
            'user' => $user,
            'event_type' => 'o\'chirildi',
            'credit_data' => $credit->toArray(),
        ];

        event(new AuditEvent($eventData));

        $credit->delete();

        return redirect()->route('credits.index')->with('danger', 'Qarzdorlik muvaffaqiyatli o\'chirildi');
    }
}
