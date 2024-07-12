<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Checklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChecklistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $checklists = Auth::user()->checklists;
        return response()->json($checklists);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        // Simpan checklist yang terhubung dengan pengguna yang saat ini terautentikasi
        $checklist = auth()->user()->checklists()->create([
            'title' => $request->title
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Checklist created successfully',
            'checklist' => $checklist  // Tambahkan checklist yang baru dibuat ke respons JSON
        ], 201); // Kode status 201 untuk created
    }


    public function show($id)
    {
        $checklist = Auth::user()->checklists()->with('items')->findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'successfully',
            'checklist' => $checklist  // Tambahkan checklist yang baru dibuat ke respons JSON
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate(['title' => 'required|string|max:255']);

        $checklist = Auth::user()->checklists()->findOrFail($id);
        $checklist->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'successfully',
            'checklist' => $checklist  // Tambahkan checklist yang baru dibuat ke respons JSON
        ], 201);
    }

    public function delete($id)
    {
        $checklist = Auth::user()->checklists()->findOrFail($id);
        $checklist->delete();

        return response()->json([
            'status' => true,
            'message' => 'Checklist deleted successfully'
        ], 200); // Menggunakan kode status 200 untuk OK
    }
}
