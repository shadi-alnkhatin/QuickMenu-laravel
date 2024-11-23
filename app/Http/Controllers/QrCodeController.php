<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{

    public function generate(Request $request)
{
    // Validate user input
    $request->validate([
        'url' => 'required|url',
        'color' => 'nullable|string',
        'text' => 'nullable|string',
    ]);

    // Generate QR Code
    $qrCode = QrCode::size(300)
        ->backgroundColor(255, 255, 255) // Default white background
        ->color(
            hexdec(substr($request->input('color', '#000000'), 1, 2)), // Red
            hexdec(substr($request->input('color', '#000000'), 3, 2)), // Green
            hexdec(substr($request->input('color', '#000000'), 5, 2))  // Blue
        )
        ->generate($request->url);

    // Embed text or other customizations (if needed)
    return view('qr-code-result', compact('qrCode', 'request'));
}


}
