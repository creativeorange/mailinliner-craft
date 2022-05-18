<?php

namespace creativeorange\craft\mailinliner\twigextensions\TokenParser;

use creativeorange\craft\mailinliner\twigextensions\Node\MailInliner_Node;
use Twig\Token;
use Twig\TokenParser\AbstractTokenParser;
use Twig_Error_Syntax;
use Twig_NodeInterface;

class MailInliner_TokenParser extends AbstractTokenParser
{
    /**
     * Parses a token and returns a node.
     *
     * @param Token $token A Token instance
     *
     * @return MailInliner_Node A Twig_NodeInterface instance
     *
     * @throws Twig_Error_Syntax
     */
    public function parse(Token $token)
    {
        $lineNo = $token->getLine();
        $stream = $this->parser->getStream();

        $stream->expect(Token::BLOCK_END_TYPE);

        $nodes['body'] = $this->parser->subparse(array($this, 'decideMailInlinerEnd'), true);

        $stream->expect(Token::BLOCK_END_TYPE);

        return new MailInliner_Node($nodes, [], $lineNo, $this->getTag());
    }

    /**
     * Gets the tag name associated with this token parser.
     *
     * @return string The tag name
     */
    public function getTag()
    {
        return 'mailinliner';
    }

    public function decideMailInlinerEnd(Token $token)
    {
        return $token->test('endmailinliner');
    }

}
