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
    }

    protected function createSettingsModel()
    {
        return new Settings();
    }

}