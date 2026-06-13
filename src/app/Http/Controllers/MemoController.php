<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;

class MemoController extends Controller
{
    public function index(Request $request)
{
    $keyword = $request->keyword;

    $memos = Memo::query()
        ->when($keyword, function ($query, $keyword) {
            $query->where('shop', 'like', '%' . $keyword . '%')
                ->orWhere('name', 'like', '%' . $keyword . '%')
                ->orWhere('origin', $keyword );
        })
        ->get();

    $total = $memos->sum(function ($memo) {
        return $memo->price * $memo->quantity;
    });

    return view('index', compact('memos', 'total', 'keyword'));
}
    public function store(Request $request)
    {
        $request->validate([
            'shop' => 'required',
            'name' => 'required',
            'origin' => 'required',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        Memo::create([
            'shop' => $request->shop,
            'name' => $request->name,
            'origin' => $request->origin,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        return redirect('/');
    }

    public function destroy(Memo $memo)
    {
        $memo->delete();

        return redirect('/');
    }
    public function update(Request $request, Memo $memo)
    {
        $request->validate([
            'shop' => 'required',
            'name' => 'required',
            'origin' => 'required',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        $memo->update([
            'shop' => $request->shop,
            'name' => $request->name,
            'origin' => $request->origin,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        return redirect('/');
    }
}
