<?php

namespace App\Exceptions\Interfaces;

interface JsonResposeable
{
    public function getStatusCode(): int;
}
