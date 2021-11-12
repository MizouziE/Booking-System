<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view('services.index', compact('services'));
    }

    public function store()
    {
        request()->validate(['name' => 'required', 'description' => 'required']);

        Service::create(request(['name', 'description', 'price']));

        return redirect('/services');
    }
}
