<?php

namespace App\Repositories\Contracts;

interface BaseRepositoryInterface
{
    public function all();

    public function first();

    public function store(array $data);

    public function update(array $data, int $id);

    public function delete(int $id);

    public function find(int $id);

    public function with($relation);
}
