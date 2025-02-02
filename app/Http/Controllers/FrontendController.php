<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http; // Để gọi API
use Illuminate\View\View;

class FrontendController extends Controller
{
    public function index(): View
    {
        $response = Http::get('http://nampox.local/api/products');

        $products = $response->json();

        return view('welcome', compact('products'));
    }
}
