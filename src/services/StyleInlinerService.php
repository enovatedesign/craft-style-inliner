<?php
/**
 * Style Inliner Plugin for Craft CMS 3
 *
 * @copyright Copyright 2018 Enovate Design Ltd.
 */

namespace enovatedesign\styleinliner\services;

use Craft;
use craft\base\Component;
use enovatedesign\styleinliner\StyleInliner;
use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;
use function file_get_contents;
use function rtrim;

/**
 * Class StyleInlinerService
 *
 * @author Mike Pepper <mike.pepper@enovate.co.uk>
 * @package InlineStyler
 * @since 1.0.0
 */
class StyleInlinerService extends Component
{
    // Private Properties
    // =========================================================================

    /**
     * @var CssToInlineStyles
     */
    private $_service;

    /**
     * @var array
     */
    private $_criticalPaths = [];
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->_service = new CssToInlineStyles();
    }

    /**
     * Inlines <style> tags inside HTML. Any rules in $css will be appended.
     *
     * @param string $html
     * @param string|null $css
     *
     * @return string
     */
    public function inlineCss($html, $css = null)
    {
        return $this->_service->convert($html, $css);
    }

    /**
     * Inlines an entire CSS file into the <head> of the document.
     *
     * @param $path
     * @throws \yii\base\ExitException
     *
     * @return null
     */
    public function criticalCss($path)
    {
        if (in_array($path, $this->_criticalPaths)) {
            return;
        }

        $settings = StyleInliner::$plugin->getSettings();

        $fullPath = join('/', [
            trim(Craft::getAlias($settings->criticalPrefix), '/'),
            trim($path, '/')
        ]).'.css';

        if (file_exists($fullPath)) {
            $content = @file_get_contents($fullPath);
            $this->_criticalPaths[] = $path;

            Craft::$app->getView()->registerCss($content, [], 'critical');
        }
    }
}