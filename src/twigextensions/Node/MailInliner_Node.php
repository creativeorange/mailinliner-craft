<?php

namespace creativeorange\craft\mailinliner\twigextensions\Node;

use Twig\Compiler;
use Twig\Node\Node;

class MailInliner_Node extends Node
{
    public function compile(Compiler $compiler)
    {
        $compiler
            ->addDebugInfo($this);

        $compiler
            ->write("ob_start();\n")
            ->subcompile($this->getNode('body'))
            ->write("\$_compiledBody = ob_get_clean();\n");

        $compiler
            ->write("echo  \creativeorange\craft\mailinliner\MailInliner::getInstance()->mailinliner->compile(\$_compiledBody);\n");
    }
}
