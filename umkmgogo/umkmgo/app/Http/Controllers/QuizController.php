<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Soal;
use Illuminate\Http\Request;
use App\Models\KategoriUmkm;
use App\Models\ClassModel;

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
        
        if (empty($jawaban)) {
            $jawaban = $request->session()->get("quiz.{$id}.answers", []);
        }

        if (count($jawaban) !== $quiz->soals->count()) {
            return redirect()->back()->with('error', 'Mohon jawab semua pertanyaan.');
        }

        
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

            // Simpan hasil akhir untuk tiap bidang
            $hasilAkhir[$bidang] = [
                'level' => $level,
                'saran' => $saran,
            ];

            // Mendapatkan kelas yang direkomendasikan berdasarkan bidang dan level
            if (in_array($level, ['Beginner', 'Intermediate'])) {
                $matchedClasses = ClassModel::where('field', $bidang)
                    ->where('level', strtolower($level)) // Ubah level ke lowercase jika perlu
                    ->get();
                $recommendedClasses = $recommendedClasses->merge($matchedClasses);
            }
        }

        // Mengirimkan ke view
        return view('quiz.result', compact('hasilAkhir', 'recommendedClasses'));

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

            // Mendapatkan kelas yang direkomendasikan berdasarkan bidang dan level
            if (in_array($level, ['Beginner', 'Intermediate'])) {
                $matchedClasses = ClassModel::where('field', $bidang)
                    ->where('level', strtolower($level))
                    ->get();
                $recommendedClasses = $recommendedClasses->merge($matchedClasses);
            }
        }

        return view('quiz.result', compact('hasilAkhir', 'recommendedClasses'));
    }
}