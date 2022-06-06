<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ProductController extends Controller {
    public function index()
    {
        return Inertia::render('Product/Index');
    }
}