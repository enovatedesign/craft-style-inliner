<?php
/**
 * Style Inliner Plugin for Craft CMS 4
 *
 * @copyright Copyright 2018 Enovate Design Ltd.
 */

namespace enovatedesign\styleinliner\twigextensions;

use enovatedesign\styleinliner\StyleInliner;
use Twig\Compiler;
use Twig\Node\Node;

/**
 * Class InlineCssNode
 *
 * @author Mike Pepper <mike.pepper@enovate.co.uk>
 * @package StyleInliner
 * @since 1.0.0
 */
class InlineCssNode extends Node
{
    /**
     * @param Compiler $compiler
     */
    public function compile(Compiler $compiler)
    {
        $compiler
            ->write("ob_start();\n")
            ->subcompile($this->getNode('body'))
            ->write("\$body = ob_get_clean();\n")
            ->write("echo ".StyleInliner::class."::\$plugin->styleInliner->inlineCss(\$body);");
    }
}