<?php

namespace creativeorange\craft\mailinliner\twigextensions\Node;

class MailInliner_Node extends \Twig_Node
{
    public function compile(\Twig_Compiler $compiler)
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
