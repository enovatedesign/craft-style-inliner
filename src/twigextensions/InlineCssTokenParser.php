<?php
/**
 * Style Inliner Plugin for Craft CMS 3
 *
 * @copyright Copyright 2018 Enovate Design Ltd.
 */

namespace enovatedesign\styleinliner\twigextensions;

use Twig_Node;
use Twig_Token;
use Twig_TokenParser;

/**
 * Class InlineCssTokenParser
 *
 * @author Mike Pepper <mike.pepper@enovate.co.uk>
 * @package StyleInliner
 * @since 1.0.0
 */
class InlineCssTokenParser extends Twig_TokenParser
{
    /**
     * @return string
     */
    public function getTag(): string
    {
        return 'inlinecss';
    }

    /**
     * @param Twig_Token $token
     *
     * @return bool
     */
    public function decideInlineCssEnd(Twig_Token $token)
    {
        return $token->test('endinlinecss');
    }

    /**
     * @param Twig_Token $token
     *
     * @return InlineCssNode|Twig_Node
     */
    public function parse(Twig_Token $token): InlineCssNode
    {
        $stream = $this->parser->getStream();
        $stream->expect(Twig_Token::BLOCK_END_TYPE);
        $body = $this->parser->subparse([$this, 'decideInlineCssEnd'], true);
        $stream->expect(Twig_Token::BLOCK_END_TYPE);

        return new InlineCssNode(['body' => $body], [], $token->getLine(), $this->getTag());
    }
}
