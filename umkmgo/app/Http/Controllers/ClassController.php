<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\KategoriUmkm;
use Illuminate\Support\Facades\Storage;

class ClassController extends Controller
{
    public function index()
    {
        $kategoris = KategoriUMKM::all();
        $fields = ClassModel::getAvailableFields();
        $levels = ['expert', 'intermediate', 'beginner'];
        $classes = ClassModel::latest()->get();
        return view('classes.index', compact('kategoris', 'fields', 'levels'));
    }

    public function create()
    {
        $this->authorize('create', ClassModel::class);

        $kategoris = KategoriUmkm::all();
        $fields = ClassModel::getAvailableFields();
        $levels = ['expert', 'intermediate', 'beginner'];
        $types = ['daring', 'luring'];

        return view('classes.create', compact('kategoris', 'fields', 'levels', 'types'));
    }

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
            'material_pdf' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('material_pdf')) {
            $path = $request->file('material_pdf')->store('materials', 'public');
            $data['material_pdf'] = $path;
        }

        ClassModel::create($data);

        return redirect()->route('classes.index')->with('success', 'Kelas berhasil ditambahkan!');
    }

    public function show($id)
    {
        $class = ClassModel::with('kategori')->findOrFail($id);

        return view('classes.show', compact('class'));
    }

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
            'material_pdf' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('material_pdf')) {
            $path = $request->file('material_pdf')->store('materials', 'public');
            $data['material_pdf'] = $path;
        }

        $class->update($data);

        return redirect()->route('classes.index')->with('success', 'Kelas berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $class = ClassModel::findOrFail($id);
        $this->authorize('delete', $class);
        $class->delete();

        return redirect()->route('classes.index')->with('success', 'Kelas berhasil dihapus!');
    }

    
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

    public function finalQuiz($kategori_umkm_id)
    {
        return redirect()->route('quiz.final_intro', ['id' => $kategori_umkm_id]);
    }

    public function certificate($id)
    {
        return view('classes.certificate', compact('id'));
    }
}
