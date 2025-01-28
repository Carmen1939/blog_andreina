<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\userVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyuserController extends Controller
{
    /**
     * Mark the authenticated user's user address as verified.
     */
    public function __invoke(userVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifieduser()) {
            return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
        }

        if ($request->user()->markuserAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
    }
}
