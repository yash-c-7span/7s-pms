<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CityService;
use App\Services\StateService;
use App\Http\Requests\City\Request as CityRequest;
use App\Models\City;
use Inertia\Inertia;

class CityController extends Controller
{
    private $view = "Admin/City";
    private $route = "admin.city";
    private $cityService;
    private $stateService;

    public function __construct()
    {
        $this->cityService = new CityService;
        $this->stateService = new StateService;
    }

    public function index(CityRequest $request): object
    {
        $data['cities'] = fn () => $this->cityService->listing('state');
        return Inertia::render("$this->view/Index", $data);
    }

    public function create()
    {
        $this->stateService->setLimit(-1);
        $data['states'] = fn() => $this->stateService->listing();
        return Inertia::render("$this->view/Create", $data);
    }

    public function store(CityRequest $request): object
    {
        $this->cityService->store($request->validated());
        return redirect()->route("$this->route.index");
    }

    public function edit(City $city, CityRequest $request): object
    {
        $this->stateService->setLimit(-1);
        $data['states'] = fn() => $this->stateService->listing();
        $data['city'] = fn() => $this->cityService->resource($city->id);
        return Inertia::render("$this->view/Edit", $data);
    }

    public function update(City $city, CityRequest $request): object
    {
        $this->cityService->update($city->id, $request->validated());
        return redirect()->route("$this->route.index");
    }
}
