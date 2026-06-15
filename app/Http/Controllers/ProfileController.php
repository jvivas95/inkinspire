<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\ReadingList;
use App\Models\Review;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\User;
use App\Models\BookFavorite;


class ProfileController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $this->authorize('update', $request->user());

        $request->user()->fill(collect($request->validated())->except('avatar')->toArray());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Handle avatar upload if a new file is provided
        if ($request->hasFile('avatar')) {

            // Detect which disk to use (S3 in production, public on local)
            $disk = env('FILESYSTEM_DISK', 'public');

            // Delete the old avatar if it exists
            if ($request->user()->avatar) {
                Storage::disk($disk)->delete($request->user()->avatar);
            }

            // Store the new avatar and update the user's avatar path
            $path = $request->file('avatar')->store('avatars', $disk);
            $request->user()->avatar = $path;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $this->authorize('delete', $request->user());

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

    /**
     * Display a user's profile by username.
     */
    public function show($userName)
    {
        $publicUser = User::where('username', $userName)->firstOrFail();
        $reviewsGuestUser = Review::where('user_id', $publicUser->id)->get();

        $publicUserReadingList = ReadingList::where('user_id', $publicUser->id)->get();

        $publicUserWantToRead = $publicUserReadingList->where('status', 'want_to_read')->take(5);
        $publicUserReading = $publicUserReadingList->where('status', 'reading')->take(5);
        $publicUserRead = $publicUserReadingList->where('status', 'read')->take(5);

        $publicUserFavoriteBooks = BookFavorite::where('user_id', $publicUser->id)->with('book')->get();


        return view('profile.show', [
            'publicUser' => $publicUser,
            'reviewsGuestUser' => $reviewsGuestUser,
            'wantToRead' => $publicUserWantToRead,
            'reading' => $publicUserReading,
            'read' => $publicUserRead,
            'favoriteBooks' => $publicUserFavoriteBooks
        ]);
    }
}
