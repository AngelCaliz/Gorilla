<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\User;

class PerfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('perfil.index', compact('user'));
    }

    // Mostrar formulario de edición
    public function edit()
    {
        $user = Auth::user();
        return view('perfil.edit', compact('user'));
    }

    // Actualizar datos del usuario
    public function update(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => ['nullable','string','max:30'],
            'address' => ['nullable','string','max:255'],

        ]);

        // Si subieron una imagen la guardamos y seteamos profile_photo
        if ($request->hasFile('profile_photo') && $request->file('profile_photo')->isValid()) {
            // borrar foto antigua si existe y está en storage (opcional)
            if ($user->profile_photo && str_starts_with($user->profile_photo, 'storage/')) {
                // ruta en storage/app/public/...
                $oldPath = str_replace('storage/', '', $user->profile_photo);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            // guardamos la url pública (storage)
            $user->profile_photo = 'storage/' . $path;
        } elseif (!empty($data['profile_photo_url'])) {
            // Si enviaron una URL, la usamos (prioridad baja frente al archivo)
            $user->profile_photo = $data['profile_photo_url'];
        }

        // Actualizamos otros campos
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'] ?? null;
        $user->address = $data['address'] ?? null;

        $user->save();

        return redirect()->route('perfil.edit')->with('success', 'Perfil actualizado correctamente.');
    }
}
