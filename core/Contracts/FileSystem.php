<?php

namespace Routex\Contracts;

interface FileSystem {
    public static function getRecursiveFilesFromDirectory(string $directory): array;
}