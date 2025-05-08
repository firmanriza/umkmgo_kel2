<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Soal;
use Illuminate\Http\Request;
use App\Models\KategoriUmkm;
use App\Models\ClassModel;

class QuizController extends Controller
{
    /**
     * Display the final quiz categories.
     */
    public function finalQuiz()
    {
        $kategoris = KategoriUmkm::with('finalQuizzes')->get();
        return view('quiz.final_kategori', compact('kategoris'));
    }

    /**
     * Show the introduction for the final quiz of a category.
     */
    public function finalIntro($id)
    {
        $kategori = KategoriUmkm::with('finalQuizzes')->findOrFail($id);
        $quiz = $kategori->finalQuizzes()->first();

        if (!$quiz) {
            return redirect()->route('quiz.final')->with('error', 'Kuis akhir tidak ditemukan untuk kategori ini.');
        }

        return view('quiz.final_intro', compact('kategori', 'quiz'));
    }

    /**
     * Show the final quiz attempt page.
     */
    public function finalAttempt($id)
    {
        $quiz = Quiz::with('soals')->findOrFail($id);
        return view('quiz.final_attempt', compact('quiz'));
    }

    /**
     * Show the summary of the final quiz attempt.
     */
    public function finalSummary(Request $request, $id)
    {
        $quiz = Quiz::with(['soals', 'kategori'])->findOrFail($id);
        $answers = $request->session()->get("quiz.{$id}.answers", []);
        return view('quiz.final_summary', compact('quiz', 'answers'));
    }

    /**
     * Save an answer to the session.
     */
    public function saveAnswer(Request $request, $id)
    {
        $soalId = $request->input('soal_id');
        $answer = $request->input('answer');

        $answers = $request->session()->get("quiz.{$id}.answers", []);
        $answers[$soalId] = $answer;
        $request->session()->put("quiz.{$id}.answers", $answers);

        return response()->json(['status' => 'success']);
    }

    /**
     * Handle the final quiz submission.
     */
    public function finalSubmit(Request $request, $id)
    {
        try {
            $quiz = Quiz::with(['soals', 'kategori'])->findOrFail($id);
            $jawaban = $request->input('jawaban', []);

            if (empty($jawaban)) {
                $jawaban = $request->session()->get("quiz.{$id}.answers", []);
            }

            if (count($jawaban) !== $quiz->soals->count()) {
                return redirect()->back()->with('error', 'Mohon jawab semua pertanyaan.');
            }

            // Calculate score and prepare data for final_result view
            $score = 0;
            $total = $quiz->soals->count();
            $userAnswers = [];
            $correctAnswers = [];

            foreach ($quiz->soals as $soal) {
                $correctAnswers[$soal->id] = $soal->jawaban_benar;
                if (isset($jawaban[$soal->id]) && $jawaban[$soal->id] === $soal->jawaban_benar) {
                    $score++;
                }
                $userAnswers[$soal->id] = $jawaban[$soal->id] ?? null;
            }

            return view('quiz.final_result', compact('quiz', 'score', 'total', 'userAnswers', 'correctAnswers'));
        } catch (\Exception $e) {
            \Log::error('Error in finalSubmit:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat memproses kuis.');
        }
    }
}
