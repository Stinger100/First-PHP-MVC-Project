<?php

namespace App\Foundation;

interface Entity
{
    public function convertEntity(array $data): self;
}
