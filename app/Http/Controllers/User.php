<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Controller
{
    public function index(Request $request){
        $query = ModelsUser::query();

        // Searching berdasarkan nama
        if ($request->filled('search')) {
            $query->where('biodata.nama', 'like', '%'.$request->search.'%')
            ->orWhere('username', 'like', '%'.$request->search.'%')
            ->orWhere('email', 'like', '%'.$request->search.'%');
        }


        // Pagination, misal 10 data per halaman
        $user = $query->orderBy('id', 'desc')->paginate(10);

        // Biar query string tetap terbawa saat paginate link
        $user->appends($request->all());

        return view('data', compact('user'));
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard'); // Arahkan ke halaman setelah login
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        // 1. Menghapus informasi otentikasi (session)
        Auth::logout(); 

        // 2. Membatalkan session saat ini agar tidak bisa digunakan lagi (regenerasi session ID)
        $request->session()->invalidate(); 

        // 3. Meregenerasi token CSRF baru untuk session berikutnya
        $request->session()->regenerateToken(); 

        // 4. Mengarahkan pengguna kembali ke halaman yang diinginkan (misalnya halaman login atau home)
        return redirect('/'); 
    }
    public function edit(Request $request){
        $user = ModelsUser::findOrFail(Auth::user()->id);
        
        $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'no_telepon' => 'nullable|string',
        'alamat' => 'nullable|string',
        'keterangan' => 'nullable|string',
        ]);
        
        $user->update([
            "email" => $validated["email"],
            "no_telepon" => $validated["no_telepon"]
        ]);
        $bio = $user->Biodata;
        $bio->update([
            "nama" => $validated['nama'],
            "alamat" => $validated['alamat'],
            "keterangan" => $validated['keterangan'],
        ]);

        return redirect('/profil')->with('success', 'Pengguna ' . $user->Biodata->nama . ' berhasil diperbarui!');
    }
    public function editPassword(Request $request){
        $user = ModelsUser::findOrFail(Auth::user()->id);
        
        $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'password_baru' => ['required', 'string'],
        'password_lama' => ['required', 'string', 'current_password'],
        ]);
        
        $user->update([
            "email" => $validated["email"],
            "password" => Hash::make($validated["password_baru"])
        ]);
        $bio = $user->Biodata;
        $bio->update([
            "nama" => $validated['nama'],
        ]);

        return redirect('/settings')->with('success', 'Pengguna ' . $user->Biodata->nama . ' berhasil diperbarui!');
    }
    
}
