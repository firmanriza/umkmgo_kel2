<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Soal;
use Illuminate\Http\Request;
use App\Models\KategoriUmkm;

class QuizController extends Controller
{

    public function finalQuiz()
    {
        $kategoris = KategoriUmkm::with('quizzes')->get();
        return view('quiz.final_kategori', compact('kategoris'));
    }

    public function finalIntro($id)
    {
        $kategori = KategoriUmkm::with('quizzes')->findOrFail($id);
        $quiz = $kategori->quizzes()->where('nama_quiz', 'LIKE', '%Final%')->first();
        return view('quiz.final_intro', compact('kategori', 'quiz'));
    }

    public function finalAttempt($id)
    {
        $quiz = Quiz::with('soals')->findOrFail($id);
        return view('quiz.final_attempt', compact('quiz'));
    }

    public function finalSummary(Request $request, $id)
    {
        $quiz = Quiz::with(['soals', 'kategori'])->findOrFail($id);
        $answers = $request->session()->get("quiz.{$id}.answers", []);
        
        return view('quiz.final_summary', compact('quiz', 'answers'));
    }

    public function saveAnswer(Request $request, $id)
    {
        $soalId = $request->input('soal_id');
        $answer = $request->input('answer');
        
        // Save answer to session
        $answers = $request->session()->get("quiz.{$id}.answers", []);
        $answers[$soalId] = $answer;
        $request->session()->put("quiz.{$id}.answers", $answers);
        
        return response()->json(['status' => 'success']);
    }

    public function finalSubmit(Request $request, $id)
    {
        try {
            $quiz = Quiz::with(['soals', 'kategori'])->findOrFail($id);
            $jawaban = $request->input('jawaban', []);
            
            // If no answers provided, get from session
            if (empty($jawaban)) {
                $jawaban = $request->session()->get("quiz.{$id}.answers", []);
            }

            // Validate all questions are answered
            if (count($jawaban) !== $quiz->soals->count()) {
                return redirect()->back()->with('error', 'Mohon jawab semua pertanyaan.');
            }

            $score = 0;
            $total = $quiz->soals->count();
            $correctAnswers = [];
            $userAnswers = [];

            foreach ($quiz->soals as $soal) {
                $userAnswer = $jawaban[$soal->id] ?? '';
                $correctAnswer = $soal->jawaban_benar;
                
                $userAnswers[$soal->id] = $userAnswer;
                $correctAnswers[$soal->id] = $correctAnswer;

                if (strcasecmp($userAnswer, $correctAnswer) === 0) {
                    $score++;
                }
            }

            // Clear session answers after submission
            $request->session()->forget("quiz.{$id}.answers");

            return view('quiz.final_result', compact(
                'score',
                'total',
                'correctAnswers',
                'userAnswers',
                'quiz'
            ));

        } catch (\Exception $e) {
            \Log::error('Error in finalSubmit:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat memproses kuis.');
        }
    }
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

