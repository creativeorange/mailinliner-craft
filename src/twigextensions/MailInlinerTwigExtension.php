<?php
/**
 * Mail Inliner plugin for Craft CMS 3.x
 *
 * Takes us back to 1999
 *
 * @link      https://www.creativeorange.nl
 * @copyright Copyright (c) 2018 Creativeorange
 */

namespace creativeorange\craft\mailinliner\twigextensions;

use creativeorange\craft\mailinliner\MailInliner;

use Craft;
use creativeorange\craft\mailinliner\twigextensions\TokenParser\MailInliner_TokenParser;

/**
 * @author    Creativeorange
 * @package   MailInliner
 * @since     0.1.0
 */
class MailInlinerTwigExtension extends \Twig_Extension
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'mailinliner';
    }

    /**
     * @inheritdoc
     */
    public function getTokenParsers()
    {
        return array(
            new MailInliner_TokenParser()
        );
    }
}
