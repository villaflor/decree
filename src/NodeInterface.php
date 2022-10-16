<?php

namespace Villaflor\Decree;

interface NodeInterface
{
    public function handle(array $data): array;
}