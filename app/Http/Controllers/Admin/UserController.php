<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\UserDeleted;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('isadmin', 0)
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'whatsapp_number' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:8',
            'isadmin' => 'nullable|boolean',
            'isactif' => 'nullable|boolean',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->whatsapp_number = $validated['whatsapp_number'] ?? null;

        if (! empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }

        $user->isadmin = $request->has('isadmin');
        $user->isactif = $request->has('isactif');

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur mis à jour.');
    }

    public function destroy(Request $request, User $user)
    {
        // Envoie un mail à l’utilisateur supprimé
        if ($user->email) {
            Mail::to($user->email)->send(new UserDeleted($user, $request->reason));

        }

        // Soft delete
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé (inactif)');
    }
}
