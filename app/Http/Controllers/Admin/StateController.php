<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\StateService;
use App\Http\Requests\State\Request as StateRequest;
use App\Models\State;
use Inertia\Inertia;

class StateController extends Controller
{
    private $view = "Admin/State";
    private $route = "admin.state";
    private $stateService;

    public function __construct()
    {
        $this->stateService = new StateService;
    }

    public function index(StateRequest $request)
    {
        $data['states'] = fn() => $this->stateService->listing();
        return Inertia::render("$this->view/Index", $data);
    }

    public function create()
    {
        return Inertia::render("$this->view/Create");
    }

    public function store(StateRequest $request)
    {
        $state = $this->stateService->store($request->validated());
        return redirect()->route("$this->route.index");
    }

    public function edit(State $state)
    {
        $data['state'] = fn() => $this->stateService->resource($state->id);
        return Inertia::render("$this->view/Edit", $data);
    }

    public function update(State $state, StateRequest $request)
    {
        $state = $this->stateService->update($state->id, $request->validated());
        return redirect()->route("$this->route.index");
    }
}
