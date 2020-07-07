<?php

namespace App\Http\Controllers;

use App\Repositories\PortfolioRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        resolve(PortfolioRepository::class)->create($request->all());
        return redirect()->route('index');
    }
}
