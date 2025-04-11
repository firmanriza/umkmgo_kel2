<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Soal;
use Illuminate\Http\Request;
use App\Models\KategoriUmkm;

class QuizController extends Controller
{
    public function kategori()
    {
        $kategoris = KategoriUmkm::with('quizzes')->get();
        return view('quiz.main', compact('kategoris'));
    }

    public function index($id)
    {
        $kategori = KategoriUmkm::with('quizzes')->findOrFail($id);
        $quiz = $kategori->quizzes->first();

        if ($quiz) {
            return view('quiz.intro', compact('kategori', 'quiz'));
        }

        return redirect()->route('kategori.index')->with('error', 'Belum ada kuis untuk kategori ini.');
    }

    public function show($id)
    {
        $quiz = Quiz::findOrFail($id);
        return view('quiz.show', compact('quiz'));
    }

    public function attempt($id)
    {
        $quiz = Quiz::with('soals')->findOrFail($id);
        return view('quiz.attempt', compact('quiz'));
    }

    public function result(Request $request)
    {
        $jawaban = $request->input('jawaban', []);
        $total = count($jawaban);
        $score = 0;

        foreach ($jawaban as $id => $jawab) {
            $soal = Soal::find($id);
            if ($soal && $soal->jawaban_benar === $jawab) {
                $score++;
            }
        }

        return view('quiz.result', compact('score', 'total'));
    }

    public function submit(Request $request, $id)
    {
        $jawaban = $request->input('jawaban', []);
        $quiz = Quiz::with('soals')->findOrFail($id);

        $score = 0;
        $total = $quiz->soals->count();

        foreach ($quiz->soals as $soal) {
            if (isset($jawaban[$soal->id]) && $jawaban[$soal->id] === $soal->jawaban_benar) {
                $score++;
            }
        }

        return view('quiz.result', compact('score', 'total'));
    }
}

