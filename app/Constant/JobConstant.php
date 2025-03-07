<?php

namespace App\Constant;

class JobConstant
{
    public const STATUS_ACTIVE = 'active';
    public const STATUS_INACTIVE = 'inactive';
    public const STATUS_BLOCKED = 'blocked';
    public const STATUS_ON_REVIEW = 'review';
    public const STATUS_EXPIRED = 'expired';

    public const TYPE_FULL_TIME = 'full-time';
    public const TYPE_PART_TIME = 'part-time';
    public const TYPE_CONTRACT = 'contract';
    public const TYPE_TEMPORARY = 'temporary';
    public const TYPE_INTERNSHIP = 'internship';
    public const TYPE_VOLUNTEER = 'volunteer';
    public const TYPE_FREELANCE = 'freelance';
    public const TYPE_OTHER = 'other';
}
