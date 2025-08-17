<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CvController extends Controller
{
    // Route: /{locale}/cv/download  → expects $locale as first param
    public function download(string $locale): BinaryFileResponse
    {
        // OPTION A: file in storage/app/cv/darko-cv.pdf
        $path = 'cv/darko-cv.pdf';
        if (Storage::disk('local')->exists($path)) {
            return Storage::disk('local')->download(
                $path,
                $locale === 'de' ? 'Darko-Lebenslauf.pdf' : 'Darko-CV.pdf',
                ['Content-Type' => 'application/pdf']
            );
        }

        // OPTION B: fallback to public/cv/darko-cv.pdf if you prefer public
        $publicFile = public_path('cv/darko-cv.pdf');
        if (file_exists($publicFile)) {
            return response()->download(
                $publicFile,
                $locale === 'de' ? 'Darko-Lebenslauf.pdf' : 'Darko-CV.pdf',
                ['Content-Type' => 'application/pdf']
            );
        }

        abort(404, 'CV not found.');
    }
}



