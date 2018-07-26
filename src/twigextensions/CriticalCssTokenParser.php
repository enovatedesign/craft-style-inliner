<?php
/**
 * Style Inliner Plugin for Craft CMS 3
 *
 * @copyright Copyright 2018 Enovate Design Ltd.
 */

namespace enovatedesign\styleinliner\twigextensions;

use Twig_Token;
use Twig_TokenParser;

/**
 * Class CriticalCssTokenParser
 *
 * @author Mike Pepper <mike.pepper@enovate.co.uk>
 * @package StyleInliner
 * @since 1.1.0
 */
class CriticalCssTokenParser extends Twig_TokenParser
{
    /**
     * @return string
     */
    public function getTag(): string
    {
        return 'criticalcss';
    }

    public function parse(Twig_Token $token): CriticalCssNode
    {
        $lineno = $token->getLine();
        $stream = $this->parser->getStream();
        $expressionParser = $this->parser->getExpressionParser();
        $nodes = [];

        $nodes['value'] = $expressionParser->parseExpression();
        $stream->expect(Twig_Token::BLOCK_END_TYPE);

        return new CriticalCssNode($nodes, [], $lineno, $this->getTag());
    }
}