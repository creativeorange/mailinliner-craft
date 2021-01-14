<?php
/**
 * Mail Inliner plugin for Craft CMS 3.x
 *
 * Takes us back to 1999
 *
 * @link      https://www.creativeorange.nl
 * @copyright Copyright (c) 2018 Creativeorange
 */

namespace creativeorange\craft\mailinliner\services;

use creativeorange\craft\mailinliner\MailInliner;

use Craft;
use craft\base\Component;
use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;

/**
 * @author    Creativeorange
 * @package   MailInliner
 * @since     0.1.0
 */
class MailInlinerService extends Component
{
    // Public Methods
    // =========================================================================

    /*
     * @return mixed
     */
    public function compile($body, $options = array())
    {
        $body = "<!-- body -->\n" . $body . "\n<!-- /body -->";
        $converter = new CssToInlineStyles();

        return (string) $converter->convert($body);
    }
}
