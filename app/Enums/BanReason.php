<?php

namespace App\Enums;

class BanReason{
    const TYPES = [
        'SPAM' => 'Spam',
        'HARASSMENT' => 'Harassment',
        'HATE_SPEECH' => 'Hate speech',
        'ILLEGAL_ACTIVITIES' => 'Illegal activities',
        'TROLLING' => 'Trolling',
        'VIOLATION_OF_FORUM_RULES' => 'Violation of forum rules',
        'POSTING_MALICIOUS_CONTENT' => 'Posting malicious content',
        'OTHER' => 'Other'
    ];
}