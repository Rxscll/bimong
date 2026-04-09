<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::where('role', 'siswa')->paginate(10);
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'nis' => 'nullable|string|max:20|unique:users,nis',
            'kelas' => 'nullable|string|max:50',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'siswa',
            'nis' => $request->nis,
            'kelas' => $request->kelas,
        ]);

        return redirect()->route('admin.students.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $student = User::where('role', 'siswa')->findOrFail($id);
        return view('admin.students.show', compact('student'));
    }

    public function edit(string $id)
    {
        $student = User::where('role', 'siswa')->findOrFail($id);
        return view('admin.students.edit', compact('student'));
    }

    public function update(Request $request, string $id)
    {
        $student = User::where('role', 'siswa')->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'nis' => 'nullable|string|max:20|unique:users,nis,' . $id,
            'kelas' => 'nullable|string|max:50',
        ]);

        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
            'nis' => $request->nis,
            'kelas' => $request->kelas,
        ];

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        $student->update($updateData);

        return redirect()->route('admin.students.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $student = User::where('role', 'siswa')->findOrFail($id);
        $student->delete();

        return redirect()->route('admin.students.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}