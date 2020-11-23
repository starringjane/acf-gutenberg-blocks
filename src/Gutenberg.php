<?php

namespace StarringJane\GutenbergBlocks;

use Illuminate\Filesystem\Filesystem;

class Gutenberg
{
    public static function register($blocksOrPath)
    {
        $blocks = [];

        if (is_array($blocksOrPath)) {
            $blocks = $blocksOrPath;
        }

        if (is_string($blocksOrPath)) {
            $blocksDir = trailingslashit(get_stylesheet_directory());
            $blocksDir = trailingslashit($blocksDir . $blocksOrPath);

            foreach ((new Filesystem)->allFiles($blocksDir) as $blockFile) {
                require_once $blockFile->getRealPath();

                if (class_exists($class = basename($blockFile, '.php'))) {
                    $blocks[] = $class;
                }
            }
        }

        foreach ($blocks as $block) {
            new $block();
        }
    }
}
