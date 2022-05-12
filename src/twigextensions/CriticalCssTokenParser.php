<?php
/**
 * Style Inliner Plugin for Craft CMS 4
 *
 * @copyright Copyright 2018 Enovate Design Ltd.
 */

namespace enovatedesign\styleinliner\twigextensions;


use Twig\Token;

/**
 * Class CriticalCssTokenParser
 *
 * @author Mike Pepper <mike.pepper@enovate.co.uk>
 * @package StyleInliner
 * @since 1.1.0
 */
class CriticalCssTokenParser extends \Twig\TokenParser\AbstractTokenParser
{
    /**
     * @return string
     */
    public function getTag(): string
    {
        return 'criticalcss';
    }

    public function parse(Token $token): CriticalCssNode
    {
        $lineno = $token->getLine();
        $stream = $this->parser->getStream();
        $expressionParser = $this->parser->getExpressionParser();
        $nodes = [];

        $nodes['value'] = $expressionParser->parseExpression();
        $stream->expect(Token::BLOCK_END_TYPE);

        return new CriticalCssNode($nodes, [], $lineno, $this->getTag());
    }
}