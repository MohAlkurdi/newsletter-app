<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers',
        ]);

        Subscriber::create([
            'email' => $request->email,
            'unsubscribe_hash' => Str::random(40),
            'subscribed_at' => now('Asia/Riyadh'),
        ]);

        return redirect()->back()->with('success', 'You have subscribed successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Subscriber $subscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscriber $subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subscriber $subscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($email, $hash)
    {
        $subscriber = Subscriber::where('email', $email)
            ->where('unsubscribe_hash', $hash)
            ->first();

        if ($subscriber->email) {

            $subscriber->update(['unsubscribed_at' => now('Asia/Riyadh')]);

            return view('mail.unsubscribe_confirmation');
        } else {
            abort(404);
        }
    }
}
