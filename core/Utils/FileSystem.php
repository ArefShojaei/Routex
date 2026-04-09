<?php

namespace Routex\Utils;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Routex\Contracts\FileSystem as IFileSystem;

final class FileSystem implements IFileSystem {
    public static function getRecursiveFilesFromDirectory(string $directory): array {
        $files = [];

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($directory, RecursiveDirectoryIterator::SKIP_DOTS)
        );
    
        foreach ($iterator as $file) {
            if (!$file->isFile()) continue;
    
            $files[] = $file->getPathname();
        }
    
        return $files;
    }
}