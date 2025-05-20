<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function index()
    {
        return view('certificate.index');
    }

    public function generateCertificate($download = false)
    {
        // Mendapatkan data user yang sedang login
        $user = Auth::user();
        $name = $user->name;  
        $credential = $user->credential;  

        // Buat instance PDF menggunakan FPDI
        $pdf = new Fpdi();

        // Tentukan path template sertifikat
        $templatePath = public_path('certificate/laravel_certificate.pdf');
        $pdf->setSourceFile($templatePath);
        $template = $pdf->importPage(1);
        $size = $pdf->getTemplateSize($template);

        // Menambahkan halaman dan template ke PDF
        $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
        $pdf->useTemplate($template, 0, 0, $size['width'], $size['height']);

        // Menambahkan nama pada sertifikat
        $pdf->SetFont('Helvetica');
        $pdf->SetFontSize(30);
        $pdf->SetXY(100, 95);  // Atur posisi teks
        $pdf->Write(0, $name);

        // Menambahkan credential pada sertifikat
        $pdf->SetFontSize(15);
        $pdf->SetXY(60, 115);  // Atur posisi teks untuk credential
        $pdf->Write(0, $credential);

        $fileName = 'Certificate_'.$name.'.pdf';

        // Jika ingin mengunduh file
        if ($download) {
            return response()->make($pdf->Output('D', $fileName), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="'.$fileName.'"',
            ]);
        } else {
            // Menampilkan sertifikat secara inline
            return response()->make($pdf->Output('I', $fileName), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="'.$fileName.'"',
            ]);
        }
    }

    // Menampilkan sertifikat
    public function viewCertificate()
    {
        return $this->generateCertificate(false);
    }

    // Mengunduh sertifikat
    public function downloadCertificate()
    {   
        return $this->generateCertificate(true);
    }

    // Menampilkan semua sertifikat milik user yang sedang login
    public function userCertificates()
    {
        $user = Auth::user();
        $certificates = $user->certificates()->with(['class.kategori'])->latest('issued_at')->get();
        return view('certificate.user_certificates', compact('certificates'));
    }
}