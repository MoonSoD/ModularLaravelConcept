<?php

namespace App\Domain;

abstract class AbstractService
{
    public AbstractRepository $repository;

    public function __construct(AbstractRepository $repository) {
        $this->repository = $repository;
    }
}