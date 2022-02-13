<?php


namespace App\Contracts;

interface productContract
{
    public function store(array $request);
    public function update(array $request);
}
