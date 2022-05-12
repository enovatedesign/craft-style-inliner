<?php
/**
 * Style Inliner Plugin for Craft CMS 4
 *
 * @copyright Copyright 2018 Enovate Design Ltd.
 */

namespace enovatedesign\styleinliner\services;

use Craft;
use craft\base\Component;
use enovatedesign\styleinliner\StyleInliner;
use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;
use function file_get_contents;

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
    private CssToInlineStyles $_service;

    /**
     * @var array
     */
    private array $_criticalFilenames = [];

    /**
     * @inheritdoc
     */
    public function init() : void
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
    public function inlineCss($html, $css = null): string
    {
        return $this->_service->convert($html, $css);
    }

    /**
     * Inlines an entire CSS file into the <head> of the document.
     *
     * @param $filename
     *
     * @throws \yii\base\ExitException
     *
     */
    public function criticalCss($filename) : void
    {
        if (in_array($filename, $this->_criticalFilenames)) {
            return;
        }

        $settings = StyleInliner::$plugin->getSettings();
        $fullPath = Craft::getAlias($settings->criticalPrefix . $filename . '.css');
        if (file_exists($fullPath) && $content = @file_get_contents($fullPath)) {
            $this->_criticalFilenames[] = $filename;
            Craft::$app->getView()->registerCss($content, [], 'critical');
        }
    }

    /**
     * Inlines an entire CSS file wherever you specify it
     *
     * e.g: {{  craft.styleinliner.printcriticalcss('fullwidth') | raw }}
     *
     * @param $filename
     * @return string
     * @throws \yii\base\ExitException
     *
     */
    public function printCriticalCss($filename): string
    {
        if (in_array($filename, $this->_criticalFilenames)) {
            return '';
        }

        $settings = StyleInliner::$plugin->getSettings();
        $fullPath = Craft::getAlias($settings->criticalPrefix . $filename . '.css');
        $content = '<style>';
        $contents = @file_get_contents($fullPath);

        if (file_exists($fullPath) && $contents) {
            $content .= $contents;
            $this->_criticalFilenames[] = $filename;
            $content .= '</style>';
            return $content;
        }

        return '';
    }

}