<?php

require_once "vendor/autoload.php";

use Symfony\Component\Finder\Finder;
use Symfony\Component\DomCrawler\Crawler;

class SvgIconCleaner
{
    const RESOURCE_DIR = "resources/svg";

    protected $attrsNotRequired = [
        "id",
        "class",
        "width",
        "height",
    ];

    protected $replacePatterns = [
        '/\s(id=\"[a-b0-9]{2}\")/' => '',
        '/\s(class=\"[a-b0-9]{2}\")/' => '',
        '/\s(height=\"[0-9]+\")/' => '',
        '/\s(width=\"[0-9]+\")/' => '',
    ];

    private function removeAttributes()
    {
        $finder = new Finder();
        $finder->files()->in(self::RESOURCE_DIR);
        foreach ($finder as $file) {
            $text = $file->getContents();
            $newtext = preg_replace(array_keys($this->replacePatterns), array_values($this->replacePatterns), $text);
            if ($text !== $newtext) {
                file_put_contents($file->getRealPath(), $newtext);
            }
        }
    }

    public function process()
    {
        $this->removeAttributes();
    }
}
$svgCleaner = new SvgIconCleaner();
$svgCleaner->process();
