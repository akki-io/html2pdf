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
            'html' => 'required_without:url',
            'url' => 'nullable|active_url',
            'options' => 'nullable|array',
            'preview' => 'nullable|boolean',
            'filename' => 'nullable|string',
        ]);

        return new Response(
            $this->getOutput($request),
            200,
            $this->getHeaders(
                $request->input('preview') ?? false,
                $request->input('filename') ?? 'file.pdf',
            )
        );
    }

    /**
     * Get the output based on html or url.
     *
     * @param Request $request
     * @return mixed
     */
    private function getOutput(Request $request)
    {
        $snappy = App::make('snappy.pdf');

        $options = $request->input('options') ?? [];

        if ($request->has('url')) {
            return $snappy->getOutput($request->input('url'), $options);
        }

        return $snappy->generateFromHtml($request->input('html'), $options);
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
