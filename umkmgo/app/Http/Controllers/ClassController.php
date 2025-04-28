<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\KategoriUmkm;

class ClassController extends Controller
{
    // Show categories and fields for class selection
    public function index()
    {
        // Fetch all categories
        $kategoris = KategoriUmkm::all();

        // Define available fields and levels
        $fields = ClassModel::getAvailableFields();
        $levels = ['expert', 'intermediate', 'beginner'];

        // Return the class selection view with data
        return view('classes.index', compact('kategoris', 'fields', 'levels'));
    }

    // Show classes filtered by category, field, level, and type
    public function listClasses(Request $request)
    {
        $query = ClassModel::query();

        if ($request->filled('kategori_umkm_id')) {
            $query->where('kategori_umkm_id', $request->kategori_umkm_id);
        }
        if ($request->filled('field')) {
            $query->where('field', $request->field);
        }
        if ($request->filled('level')) {
            $query->where('level', $request->level);
        }
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $classes = $query->get();

        return view('classes.list', compact('classes'));
    }

    // Show class detail with video or schedule info
    public function show($id)
    {
        $class = ClassModel::with('kategori')->findOrFail($id);
        return view('classes.show', compact('class'));
    }

    // Link to final quiz for the class category
    public function finalQuiz($kategori_umkm_id)
    {
        return redirect()->route('quiz.final_intro', ['id' => $kategori_umkm_id]);
    }

    // Show certificate page (placeholder)
    public function certificate($id)
    {
        // Implementation for certificate display after quiz completion
        return view('classes.certificate', compact('id'));
    }
}
