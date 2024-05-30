<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
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
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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

    public function getMahasiswa()
    {
        $students = User::where('role', 'mahasiswa')->get();
        $lecturers = User::where('role', 'dosen')->get();
        $alumni = User::where('role', 'alumni')->get();

        $studentscount = User::where('role', 'mahasiswa')->count();
        $lecturerscount = User::where('role', 'dosen')->count();
        $alumnicount = User::where('role', 'alumni')->count();
        return view('pages.user.mahasiswa', ['students' => $students, 'lecturers' => $lecturers, 'alumni' => $alumni, ]);
    }
    public function getDosen()
    {
        $lecturers = User::where('role', 'dosen')->get();
        return view('pages.user.dosen', ['lecturers' => $lecturers]);
    }
    public function getAlumni()
    {
        $alumni = User::where('role', 'alumni')->get();
        return view('pages.user.alumni', ['alumni' => $alumni]);
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->back()->with('status', 'User deleted successfully');
    }
}