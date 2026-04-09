<?php

namespace Routex\Contracts;

interface Singleton {
    public static function getInstance(): self;
}