<?php

namespace Villaflor\Decree;

use Villaflor\Decree\Actions\ActionInterface;

class Node implements NodeInterface
{
    private array $directions;

    public function __construct(array $directions)
    {
        if (count($directions) < 2) {
            throw new \Exception('Directions must contains more than 1 direction');
        }

        $this->directions = $directions;
    }

    public function handle(array $data): array
    {
        foreach ($this->directions as $direction) {
            if (($direction['rule'])->evaluate()) {
                $data = ($direction['rule'])->log($data);

                if ($direction['next'] instanceof NodeInterface) {
                    $data = ($direction['next'])->handle($data);
                }

                if ($direction['next'] instanceof ActionInterface) {
                    $data = ($direction['next'])->execute($data);
                }
            }
        }

        return $data;
    }
}
