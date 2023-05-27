<?php

namespace App\DTO;

use Illuminate\Support\Facades\Validator;

class CreateTaskDTO
{
    public $title;
    public $description;

    public string $uuid = '';

    private $error;

    public function __construct($request)
    {
        $this->title = $request['title'] ?? null;
        $this->description = $request['description'] ?? null;

        $this->validate();
    }

    protected function validate(): bool
    {
        $validation = Validator::make([
            'title' => $this->title,
            'description' => $this->description
        ], [
            'title' => 'required|string',
            'description' => 'required|string'
        ]);

        if (!$validation->validate()) {
            $this->error = $validation->validate();
            return false;
        }

        return true;
    }

    public function getError(): array
    {
        return $this->error;
    }
}