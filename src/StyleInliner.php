<?php
/**
 * Style Inliner Plugin for Craft CMS 3
 *
 * @copyright Copyright 2018 Enovate Design Ltd.
 */

namespace enovatedesign\styleinliner;

use enovatedesign\styleinliner\models\Settings;
use enovatedesign\styleinliner\twigextensions\StyleInlinerTwigExtension;

use Craft;
use craft\base\Plugin;
use craft\web\twig\variables\CraftVariable;

use yii\base\Event;

/**
 * Class StyleInliner
 *
 * @author Mike Pepper <mike.pepper@enovate.co.uk>
 * @package StyleInliner
 * @since 1.0.0
 */
class StyleInliner extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * Static property of an instance of this class
     *
     * @var StyleInliner
     */
    public static $plugin;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        self::$plugin = $this;

        Craft::$app->getView()->registerTwigExtension(new StyleInlinerTwigExtension());

        Event::on(CraftVariable::class, CraftVariable::EVENT_INIT, function (Event $e) {
            /** @var CraftVariable $variable */
            $variable = $e->sender;

            // Attach a service:
            $variable->set('styleinliner', StyleInlinerTwigExtension::class);
        });

    }

    protected function createSettingsModel()
    {
        return new Settings();
    }

}