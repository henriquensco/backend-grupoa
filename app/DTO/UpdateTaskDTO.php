<?php

namespace App\DTO;

use Illuminate\Support\Facades\Validator;

class UpdateTaskDTO
{
    public $title;
    public $description;

    private $error;

    public function __construct($request)
    {
        $this->title = $request['title'] ?? null;
        $this->description = $request['description'] ?? null;

        $this->validate();
    }

    protected function validate(): bool
    {
        return true;
    }

    public function getError(): array
    {
        return $this->error;
    }
}