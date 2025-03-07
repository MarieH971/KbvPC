<?php

    namespace App\Enum;

    enum Level: string
    {
        case LEVEL_BEGINNER = 'débutant';
        case LEVEL_INTERMEDIATE = 'intermédiaire';
        case LEVEL_ADVANCED = 'Avancé';

        public static function casesAsArray(): array
        {
            $cases = [];
            foreach (self::cases() as $case) {
                $cases[$case->value] = $case->value;
            }

            return $cases;
        }
    }
