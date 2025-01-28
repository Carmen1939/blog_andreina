<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class userVerificationNotificationController extends Controller
{
    /**
     * Send a new user verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifieduser()) {
            return redirect()->intended(route('dashboard', absolute: false));
        }

        $request->user()->senduserVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
