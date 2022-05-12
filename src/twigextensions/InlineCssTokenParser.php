<?php
/**
 * Style Inliner Plugin for Craft CMS 4
 *
 * @copyright Copyright 2018 Enovate Design Ltd.
 */

namespace enovatedesign\styleinliner\twigextensions;

use Twig\Error\SyntaxError;
use Twig\Token;

/**
 * Class InlineCssTokenParser
 *
 * @author Mike Pepper <mike.pepper@enovate.co.uk>
 * @package StyleInliner
 * @since 1.0.0
 */
class InlineCssTokenParser extends \Twig\TokenParser\AbstractTokenParser
{
    /**
     * @return string
     */
    public function getTag(): string
    {
        return 'inlinecss';
    }

    /**
     * @param  Token  $token
     *
     * @return bool
     */
    public function decideInlineCssEnd(Token $token): bool
    {
        return $token->test('endinlinecss');
    }

    /**
     * @param  Token  $token
     *
     * @return InlineCssNode
     * @throws SyntaxError
     */
    public function parse(Token $token): InlineCssNode
    {
        $stream = $this->parser->getStream();
        $stream->expect(Token::BLOCK_END_TYPE);
        $body = $this->parser->subparse([$this, 'decideInlineCssEnd'], true);
        $stream->expect(Token::BLOCK_END_TYPE);

        return new InlineCssNode(['body' => $body], [], $token->getLine(), $this->getTag());
    }
}
