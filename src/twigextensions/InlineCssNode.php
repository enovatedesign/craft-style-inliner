<?php
/**
 * Style Inliner Plugin for Craft CMS 3
 *
 * @copyright Copyright 2018 Enovate Design Ltd.
 */

namespace enovatedesign\styleinliner\twigextensions;

use enovatedesign\styleinliner\StyleInliner;

/**
 * Class InlineCssNode
 *
 * @author Mike Pepper <mike.pepper@enovate.co.uk>
 * @package StyleInliner
 * @since 1.0.0
 */
class InlineCssNode extends \Twig_Node
{
    /**
     * @param \Twig_Compiler $compiler
     */
    public function compile(\Twig_Compiler $compiler)
    {
        $compiler
            ->write("ob_start();\n")
            ->subcompile($this->getNode('body'))
            ->write("\$body = ob_get_clean();\n")
            ->write("echo ".StyleInliner::class."::\$plugin->styleInliner->inlineCss(\$body);");
    }
}