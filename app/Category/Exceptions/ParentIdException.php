<?php

namespace App\Category\Exceptions;

use Exception;

class ParentIdException extends Exception
{
    public function render()
    {
        return response()->json([
            'error' => 'invalid parent_id'
        ]);
    }
}
