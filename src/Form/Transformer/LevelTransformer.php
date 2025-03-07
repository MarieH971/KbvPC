<?php

namespace App\Form\Transformer;

use App\Enum\Level;

use Symfony\Component\Form\DataTransformerInterface;

class LevelTransformer implements DataTransformerInterface
{
    public function transform($value):string
    {
        // Si l'entité a déjà un objet Level, on le renvoie directement
        return $value ? $value->value : '';
    }

    public function reverseTransform($value): ?Level
    {
        
        return $value ? Level::from($value) : null;
    }
}