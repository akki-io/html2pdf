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
            'preview' => 'nullable|boolean',
            'filename' => 'nullable|string',
        ]);

        $html = $request->input('html');
        $options = $request->input('options') ?? [];

        $snappy = App::make('snappy.pdf');

        return new Response(
            $snappy->getOutputFromHtml($html, $options),
            200,
            $this->getHeaders(
                $request->input('preview') ?? false,
                $request->input('filename') ?? 'file.pdf',
            )
        );
    }

    /**
     * Get the headers.
     *
     * @param false $preview
     * @return string[]
     */
    private function getHeaders(bool $preview, string $filename): array
    {
        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        if (! $preview) {
            $headers['Content-Disposition'] = "attachment; filename=\"{$filename}\"";
        }

        return $headers;
    }
}
