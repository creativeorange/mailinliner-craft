<?php
/**
 * Mail Inliner plugin for Craft CMS 3.x
 *
 * Takes us back to 1999
 *
 * @link      https://www.creativeorange.nl
 * @copyright Copyright (c) 2018 Creativeorange
 */

namespace creativeorange\craft\mailinliner;

use creativeorange\craft\mailinliner\services\MailInlinerService as MailInlinerServiceService;
use creativeorange\craft\mailinliner\twigextensions\MailInlinerTwigExtension;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;

use yii\base\Event;

/**
 * Class MailInliner
 *
 * @author    Creativeorange
 * @package   MailInliner
 * @since     0.1.0
 *
 * @property  MailInlinerServiceService $mailInlinerService
 */
class MailInliner extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var MailInliner
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Craft::$app->view->registerTwigExtension(new MailInlinerTwigExtension());

        $this->setComponents([
            'mailinliner' => \creativeorange\craft\mailinliner\services\MailInlinerService::class,
        ]);
    }

    // Protected Methods
    // =========================================================================

}
