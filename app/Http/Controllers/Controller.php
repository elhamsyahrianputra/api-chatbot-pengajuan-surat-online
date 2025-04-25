<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function getValidIncludes(array $allowedIncludes): array
    {
        $requestedIncludes = explode(',', request()->input('include', ''));
        return array_filter($requestedIncludes, fn($include) => in_array($include, $allowedIncludes));
    }
}
