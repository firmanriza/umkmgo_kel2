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
        $kategoris = KategoriUmkm::all();
        return view('quiz.kategori', compact('kategoris'));
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
    $quiz = Quiz::with('soals')->findOrFail($id);

    // Kelompokkan soal berdasarkan bidang: Marketing, Produksi, Service
    $soalsGrouped = $quiz->soals->groupBy('bidang');

    return view('quiz.show', compact('quiz', 'soalsGrouped'));
    }


    public function attempt($id)
    {
    $quiz = Quiz::with('soals')->findOrFail($id);

    // Kelompokkan soal berdasarkan bidang (Marketing, Produksi, Service)
    $soalsGrouped = $quiz->soals->groupBy('bidang');

    return view('quiz.attempt', compact('quiz', 'soalsGrouped'));
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

        $bidangScores = [
        'Marketing' => ['benar' => 0, 'total' => 0],
        'Produksi' => ['benar' => 0, 'total' => 0],
        'Service' => ['benar' => 0, 'total' => 0],
];

        foreach ($quiz->soals as $soal) {
            $bidang = $soal->bidang;

        if (isset($jawaban[$soal->id])) {
            $bidangScores[$bidang]['total']++;

        if ($jawaban[$soal->id] === $soal->jawaban_benar) {
            $bidangScores[$bidang]['benar']++;
        }
    }
}

// Tentuin kategori berdasarkan skor
    $hasilAkhir = [];
    foreach ($bidangScores as $bidang => $score) {
        $persen = $score['total'] > 0 ? ($score['benar'] / $score['total']) * 100 : 0;

        if ($persen >= 80) {
            $level = 'Expert';
            $saran = 'Tidak perlu training tambahan.';
        } elseif ($persen >= 50) {
            $level = 'Intermediate';
            $saran = 'Disarankan ikut kelas lanjutan bidang ' . $bidang . '.';
        } else {
            $level = 'Beginner';
            $saran = 'Wajib ikut training dasar bidang ' . $bidang . '.';
        }

        $hasilAkhir[$bidang] = [
            'level' => $level,
            'saran' => $saran,
    ];
}

return view('quiz.result', compact('hasilAkhir'));

    }
}

