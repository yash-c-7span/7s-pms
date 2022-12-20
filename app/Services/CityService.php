<?php

namespace App\Services;

use App\Models\City;

class CityService
{
    private $city;

    public function __construct()
    {
        $this->city = new City;
    }

    public function listing(string ...$relationship): object
    {
        $cities = $this->city->with($relationship);
        return (config('site.pagination.limit') == -1) ? $cities->get() : $cities->paginate(config('site.pagination.limit'));
    }

    public function store(array $inputs): City
    {
        $city = $this->city->create([
            'state_id' => $inputs['state_id'],
            'name' => $inputs['name'],
            'status' => $inputs['status']
        ]);

        return $city;
    }

    public function resource(int $id, string ...$relationship): City
    {
        $city = $this->city->with($relationship)->findOrFail($id);
        return $city;
    }

    public function update(int $id, array $inputs): City
    {
        $city = $this->resource($id);

        $city->update([
            'state_id' => $inputs['state_id'],
            'name' => $inputs['name'],
            'status' => $inputs['status']
        ]);

        return $city;
    }
}
