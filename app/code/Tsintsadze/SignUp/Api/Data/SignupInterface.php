<?php

namespace Tsintsadze\SignUp\Api\Data;

interface SignupInterface
{
    public const SIGNUP_ID = "signup_id";
    public const NAME = "name";
    public const DATE = "date";

    /**
     * @return int
     */
    public function getSignupId(): int;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getDate(): string;
}
