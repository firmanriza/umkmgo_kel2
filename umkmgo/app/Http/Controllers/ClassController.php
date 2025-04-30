<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\KategoriUmkm;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function __construct()
    {
        // Apply auth middleware to all methods
        $this->middleware('auth');

        // Apply admin middleware only to CRUD methods, specifying 'admin' role
        $this->middleware('admin:admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

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

    // Show form to create a new class (admin only)
    public function create()
    {
        $this->authorize('create', ClassModel::class);

        $kategoris = KategoriUmkm::all();
        $fields = ClassModel::getAvailableFields();
        $levels = ['expert', 'intermediate', 'beginner'];
        $types = ['daring', 'luring'];

        return view('classes.create', compact('kategoris', 'fields', 'levels', 'types'));
    }

    // Store a new class (admin only)
    public function store(Request $request)
    {
        $this->authorize('create', ClassModel::class);

        $request->validate([
            'kategori_umkm_id' => 'required|exists:kategori_umkms,id',
            'field' => 'required|string',
            'level' => 'required|string',
            'type' => 'required|string',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_url' => 'nullable|url',
            'schedule_info' => 'nullable|string',
        ]);

        ClassModel::create($request->all());

        return redirect()->route('classes.index')->with('success', 'Kelas berhasil ditambahkan!');
    }

    // Show form to edit a class (admin only)
    public function edit($id)
    {
        $class = ClassModel::findOrFail($id);
        $this->authorize('update', $class);

        $kategoris = KategoriUmkm::all();
        $fields = ClassModel::getAvailableFields();
        $levels = ['expert', 'intermediate', 'beginner'];
        $types = ['daring', 'luring'];

        return view('classes.edit', compact('class', 'kategoris', 'fields', 'levels', 'types'));
    }

    // Update a class (admin only)
    public function update(Request $request, $id)
    {
        $class = ClassModel::findOrFail($id);
        $this->authorize('update', $class);

        $request->validate([
            'kategori_umkm_id' => 'required|exists:kategori_umkms,id',
            'field' => 'required|string',
            'level' => 'required|string',
            'type' => 'required|string',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_url' => 'nullable|url',
            'schedule_info' => 'nullable|string',
        ]);

        $class->update($request->all());

        return redirect()->route('classes.index')->with('success', 'Kelas berhasil diperbarui!');
    }

    // Delete a class (admin only)
    public function destroy($id)
    {
        $class = ClassModel::findOrFail($id);
        $this->authorize('delete', $class);

        $class->delete();

        return redirect()->route('classes.index')->with('success', 'Kelas berhasil dihapus!');
    }
}
