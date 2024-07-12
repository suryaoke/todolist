<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function store(Request $request, $checklistId)
    {
        $request->validate(['description' => 'required|string|max:255']);

        $checklist = Auth::user()->checklists()->findOrFail($checklistId);
        $item = $checklist->items()->create($request->all());


        return response()->json([
            'status' => true,
            'message' => 'successfully',
            'checklist' => $item  // Tambahkan checklist yang baru dibuat ke respons JSON
        ], 201); // Kode status 201 untuk created
    }

    public function show($checklistId, $id)
    {
        $checklist = Auth::user()->checklists()->findOrFail($checklistId);
        $item = $checklist->items()->findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'successfully',
            'checklist' => $item  // Tambahkan checklist yang baru dibuat ke respons JSON
        ], 201);
    }

    public function update(Request $request, $checklistId, $id)
    {
        $request->validate(['description' => 'required|string|max:255']);

        $checklist = Auth::user()->checklists()->findOrFail($checklistId);
        $item = $checklist->items()->findOrFail($id);
        $item->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'successfully',
            'checklist' => $item  // Tambahkan checklist yang baru dibuat ke respons JSON
        ], 201);
    }

    public function toggleCompletion($checklistId, $id)
    {
        $checklist = Auth::user()->checklists()->findOrFail($checklistId);
        $item = $checklist->items()->findOrFail($id);
        $item->is_completed = !$item->is_completed;
        $item->save();

        return response()->json([
            'status' => true,
            'message' => 'successfully',
            'checklist' => $item  // Tambahkan checklist yang baru dibuat ke respons JSON
        ], 201);
    }

    public function delete($checklistId, $id)
    {
        $checklist = Auth::user()->checklists()->findOrFail($checklistId);
        $item = $checklist->items()->findOrFail($id);
        $item->delete();

        return response()->json([
            'status' => true,
            'message' => 'deleted successfully'
        ], 200);
    }
}
