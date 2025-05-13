<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Soal;
use Illuminate\Http\Request;
use App\Models\KategoriUmkm;
use App\Models\ClassModel;

class QuizController extends Controller
{
    // Fungsi khusus kuis awal (bukan final)
    private function calculateResult($quiz, $jawaban)
    {
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

        $hasilAkhir = [];
        $recommendedClasses = collect();

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

            if (in_array($level, ['Beginner', 'Intermediate'])) {
                $matchedClasses = ClassModel::where('field', $bidang)
                    ->where('level', strtolower($level))
                    ->get();
                $recommendedClasses = $recommendedClasses->merge($matchedClasses);
            }
        }

        return compact('hasilAkhir', 'recommendedClasses');
    }

    // =========================
    // FINAL QUIZ SECTION
    // =========================

    public function finalIntro($id)
    {
        $kategori = KategoriUmkm::findOrFail($id);
        $quiz = Quiz::where('kategori_id', $id)->where('nama_quiz', 'like', 'Kuis Akhir UMKM%')->first();

        return view('quiz.final_intro', compact('kategori', 'quiz'));
    }

    public function finalShow($id)
    {
        $quiz = Quiz::with('soals')->findOrFail($id);
        $soalsGrouped = $quiz->soals->groupBy('bidang');
        return view('quiz.final_show', compact('quiz', 'soalsGrouped'));
    }

public function finalAttempt($id)
    {
        $quiz = Quiz::with('soals')->findOrFail($id);

        $soalsGrouped = $quiz->soals->groupBy('bidang');
        return view('quiz.final_attempt', compact('quiz', 'soalsGrouped'));
    }

public function finalSubmit(Request $request, $id)
{
    $quiz = Quiz::with('soals')->where('kategori_id', $id)
        ->where('nama_quiz', 'like', 'Kuis Akhir UMKM%')
        ->firstOrFail();

    $jawaban = $request->input('jawaban', []);

    $score = 0;
    foreach ($jawaban as $soalId => $jawab) {
        $soal = Soal::find($soalId); // ✅ Ambil soal dari DB
        if ($soal && $soal->quiz_id == $quiz->id && $soal->jawaban_benar === $jawab) {
            $score++;
        }
    }

    $total = $quiz->soals->count(); // ✅ Ambil semua soal
    $nilai = $total > 0 ? round(($score / $total) * 100, 2) : 0;

    return view('quiz.final_result', [
        'score' => $score,
        'total' => $total,
        'nilai' => $nilai
    ]);
}



    // =========================
    // QUIZ AWAL SECTION
    // =========================

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
        $soalsGrouped = $quiz->soals->groupBy('bidang');
        return view('quiz.show', compact('quiz', 'soalsGrouped'));
    }

    public function attempt($id)
    {
        $quiz = Quiz::with('soals')->findOrFail($id);
        $soalsGrouped = $quiz->soals->groupBy('bidang');
        return view('quiz.attempt', compact('quiz', 'soalsGrouped'));
    }

    public function submit(Request $request, $id)
    {
        $quiz = Quiz::with('soals')->findOrFail($id);
        $jawaban = $request->input('jawaban', []);

        $result = $this->calculateResult($quiz, $jawaban);

        return view('quiz.result', $result);
    }

    public function result(Request $request)
    {
        $jawaban = $request->input('jawaban', []);
        $score = 0;

        foreach ($jawaban as $id => $jawab) {
            $soal = Soal::find($id);
            if ($soal && $soal->jawaban_benar === $jawab) {
                $score++;
            }
        }

        return view('quiz.result', [
            'score' => $score,
            'total' => count($jawaban)
        ]);
    }

    public function saveAnswer(Request $request, $id)
    {
        $soalId = $request->input('soal_id');
        $answer = $request->input('answer');

        $answers = $request->session()->get("quiz.{$id}.answers", []);
        $answers[$soalId] = $answer;
        $request->session()->put("quiz.{$id}.answers", $answers);

        return response()->json(['status' => 'success']);
    }
}