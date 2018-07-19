<?php
/**
 * Style Inliner Plugin for Craft CMS 3
 *
 * @copyright Copyright 2018 Enovate Design Ltd.
 */

namespace enovatedesign\styleinliner\services;

use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;

use craft\base\Component;

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
}