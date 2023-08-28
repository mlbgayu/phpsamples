<?php

namespace App\Http\Controllers;

use App\Helper;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        Log::error("From Redis" . Redis::get('email'));

        return view('profile.edit', [
//            'user' => $request->user(),

            'name' => Redis::get('name'),
            'email' => Redis::get('email'),
            'phone' => Redis::get('phone')
        ]);
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        Log::debug('Received Name' . $request->user()->name);
        Log::debug('Received Phone' . $request->user()->phone);

        //Call Redis to update profile data
        $this->updateUserInRedis($request->user()->name, $request->user()->email, $request->user()->phone);

        $request->user()->save();
        return Redirect::route('profile.edit')->with('status', 'profile-updated');

    }

    public function updateUserInRedis($name, $email, $contactnumber)
    {

        try {
            Redis::set('name', $name);
            Redis::set('email', $email);
            Redis::set('phone', $contactnumber);

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }

    }




    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
