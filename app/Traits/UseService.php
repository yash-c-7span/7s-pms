<?php

namespace App\Traits;

trait useService
{
    public $limit;

    public function setLimit(int $limit): void
    {
        config()->set('site.pagination.limit', $limit);
    }
}
