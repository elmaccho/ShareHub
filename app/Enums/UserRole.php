<?php

namespace App\Enums;

class UserRole{
    const ADMIN = 'Admin';
    const MODERATOR = 'Moderator';
    const USER = 'User';
    const TYPES = [
        self::ADMIN,
        self::MODERATOR,
        self::USER
    ];
}