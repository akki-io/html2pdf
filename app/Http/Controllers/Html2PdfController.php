<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

class Html2PdfController extends Controller
{
    /**
     * Convert html to pdf.
     *
     * @param Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function index(Request $request): Response
    {
        $this->validate($request, [
            'html' => 'required',
            'options' => 'nullable|array',
        ]);

        $html = $request->input('html');
        $options = $request->input('options');

        $snappy = App::make('snappy.pdf');

        return new Response(
            $snappy->getOutputFromHtml($html, $options),
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="file.pdf"',
            ]
        );
    }
}
