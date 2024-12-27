<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Show the profile page
    public function show()
    {
        // Pass the currently authenticated user to the view
        return view('profile.show', ['user' => Auth::user()]);
    }

    // Update the profile page
    public function update(Request $request)
    {
        // Validate the incoming data, including the profile image
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Ensure the image is valid and within size limit
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        // Handle profile image upload
        if ($request->hasFile('image')) {
            // Delete the old profile image if it exists (optional but recommended)
            if ($user->profile_image) {
                // Remove the old image file from storage
                Storage::delete('public/' . $user->profile_image);
            }

            // Store the new image in the 'public/profile_images' directory
            $imagePath = $request->file('image')->store('profile_images', 'public');

            // Update the user's profile_image field with the new image path
            $user->profile_image = $imagePath;
        }

        // Save the updated user information
        $user->save();

        // Redirect back to the profile page with a success message
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
}
