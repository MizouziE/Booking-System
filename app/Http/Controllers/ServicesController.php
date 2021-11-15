<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index(Service $service)
    {
        $services = Service::all();

        return view('services.index', compact('services'));
    }

    public function store(Service $service)
    {
        request()->validate(['name' => 'required', 'description' => 'required']);

        Service::create(request(['name', 'description', 'price']));

        return redirect('/services');
    }

    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }
}
