<?php

namespace App\Controllers;

use App\Models\ShortUrlModel;

class ShortUrlController extends BaseController
{
    protected $urlModel;

    public function __construct()
    {
        $this->urlModel = new ShortUrlModel();
    }

    public function index()
    {
        return view('home');
    }

    public function shorten()
    {
        $originalUrl = $this->request->getPost('original_url');

        if (empty($originalUrl)) {
            return redirect()->back()->with('error', 'Please enter a URL.');
        }

        if (!filter_var($originalUrl, FILTER_VALIDATE_URL)) {
            return redirect()->back()->with('error', 'Please enter a valid URL.');
        }

        $shortCode = $this->generateShortCode();

        $this->urlModel->insert([
            'original_url' => $originalUrl,
            'short_code'   => $shortCode,
            'clicks'       => 0
        ]);

        $shortUrl = base_url($shortCode);

        return redirect()->back()->with('short_url', $shortUrl);
    }

    public function redirectToOriginal($code)
    {
        $urlData = $this->urlModel
            ->where('short_code', $code)
            ->first();

        if (!$urlData) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $this->urlModel->update($urlData['id'], [
            'clicks' => $urlData['clicks'] + 1
        ]);

        return redirect()->to($urlData['original_url']);
    }

    private function generateShortCode($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';

        do {
            $code = '';

            for ($i = 0; $i < $length; $i++) {
                $code .= $characters[random_int(0, strlen($characters) - 1)];
            }

            $exists = $this->urlModel
                ->where('short_code', $code)
                ->first();

        } while ($exists);

        return $code;
    }

    public function apiShorten()
    {
        $data = $this->request->getJSON(true);

        $originalUrl = $data['original_url'] ?? '';

        if (empty($originalUrl)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Please enter a URL.'
            ]);
        }

        if (!filter_var($originalUrl, FILTER_VALIDATE_URL)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid URL.'
            ]);
        }

        $shortCode = $this->generateShortCode();

        $this->urlModel->insert([
            'original_url' => $originalUrl,
            'short_code'   => $shortCode,
            'clicks'       => 0
        ]);

        return $this->response->setJSON([
            'success' => true,
            'short_url' => base_url($shortCode)
        ]);
    }
}