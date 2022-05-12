<?php
/**
 * Style Inliner Plugin for Craft CMS 4
 *
 * @copyright Copyright 2018 Enovate Design Ltd.
 */

namespace enovatedesign\styleinliner\twigextensions;

use Craft;
use enovatedesign\styleinliner\StyleInliner;
use Twig\Node\Node;

/**
 * Class CriticalCssNode
 *
 * @author Mike Pepper <mike.pepper@enovate.co.uk>
 * @package StyleInliner
 * @since 1.0.0
 */
class CriticalCssNode extends Node
{
    public function compile(\Twig_Compiler $compiler)
    {

        if (!StyleInliner::$plugin->getSettings()->criticalCss) {
            return;
        }


        $value = $this->getNode('value');

        $compiler->addDebugInfo($this);

        $compiler
            ->write(StyleInliner::class . "::\$plugin->styleInliner->criticalCss(")
            ->subcompile($value)
            ->write(");");
    }
}