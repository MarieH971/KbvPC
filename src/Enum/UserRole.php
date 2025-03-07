<?php


namespace App\Enum;



    namespace App\Enum;
    enum UserRole: string
    {
        
        case ROLE_USER = 'Adhérent';
        case ROLE_ADMIN = 'Admin';

    
    public static function casesAsArray(): array
    {
        $cases = [];
        foreach (self::cases() as $case) {
            $cases[$case->name] = $case->value;
        }
        return $cases;
    }
}