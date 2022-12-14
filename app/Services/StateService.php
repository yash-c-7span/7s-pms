<?php

namespace App\Services;

use App\Models\State;

class StateService
{
    private $state;

    public function __construct()
    {
        $this->state = new State;    
    }

    public function listing(string ...$relationShip)
    {
        $states = $this->state->with($relationShip);
        return (config('site.pagination.limit') == -1) ? $states->get() : $states->paginate(config('site.pagination.limit'));
    }

    public function store(array $inputs)
    {
        $state = $this->state->create([
            'name' => $inputs['name'],
            'status' => $inputs['status'],
            'created_by' => auth()->id()
        ]);

        return $state;
    }

    public function resource(int $id)
    {
        $state = $this->state->findOrFail($id);
        return $state;
    }

    public function update(int $id, array $inputs)
    {
        $state = $this->resource($id);
        $state->update([
            'name' => $inputs['name'],
            'status' => $inputs['status']
        ]);
        
        return $state;
    }
}