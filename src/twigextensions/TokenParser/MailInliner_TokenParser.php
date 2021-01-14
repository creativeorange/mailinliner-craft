<?php

namespace creativeorange\craft\mailinliner\twigextensions\TokenParser;

use creativeorange\craft\mailinliner\twigextensions\Node\MailInliner_Node;
use Twig_Error_Syntax;
use Twig_NodeInterface;
use Twig_Token;

class MailInliner_TokenParser extends \Twig_TokenParser
{
    /**
     * Parses a token and returns a node.
     *
     * @param Twig_Token $token A Twig_Token instance
     *
     * @return MailInliner_Node A Twig_NodeInterface instance
     *
     * @throws Twig_Error_Syntax
     */
    public function parse(Twig_Token $token)
    {
        $lineNo = $token->getLine();
        $stream = $this->parser->getStream();

        $stream->expect(\Twig_Token::BLOCK_END_TYPE);

        $nodes['body'] = $this->parser->subparse(array($this, 'decideMailInlinerEnd'), true);

        $stream->expect(\Twig_Token::BLOCK_END_TYPE);

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

    public function decideMailInlinerEnd(\Twig_Token $token)
    {
        return $token->test('endmailinliner');
    }

}
