<?php
/**
 * Style Inliner Plugin for Craft CMS 3
 *
 * @copyright Copyright 2018 Enovate Design Ltd.
 */

namespace enovatedesign\styleinliner\twigextensions;

use enovatedesign\styleinliner\StyleInliner;
use Twig_Extension;
use Twig_TokenParserInterface;

/**
 * Class StyleInlinerTwigExtension
 *
 * @author Mike Pepper <mike.pepper@enovate.co.uk>
 * @package StyleInliner
 * @since 1.0.0
 */
class StyleInlinerTwigExtension extends Twig_Extension
{
    /**
     * Returns the token parser instances to add to the existing list.
     *
     * @return Twig_TokenParserInterface[]
     */
    public function getTokenParsers()
    {
        return [
            new InlineCssTokenParser(),
            new CriticalCssTokenParser(),
        ];
    }

    public function printcriticalcss($key)
    {
        return StyleInliner::$plugin->styleInliner->printCriticalCss($key);
    }

}