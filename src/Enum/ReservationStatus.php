<?php

    namespace App\Enum;

    enum ReservationStatus: string
    {
        case PENDING = 'pending';
        case CONFIRMED = 'confirmed';
        case CANCELLED = 'cancelled';

        
        public static function casesAsArray(): array
        {
            $cases = [];
            foreach (self::cases() as $case) {
                $cases[$case->name] = $case->value;
            }
            return $cases;
        }
    }