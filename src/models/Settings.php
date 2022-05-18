<?php
/**
 * Style Inliner Plugin for Craft CMS 4
 *
 * @copyright Copyright 2018 Enovate Design Ltd.
 */

namespace enovatedesign\styleinliner\models;

use craft\base\Model;

/**
 * Class StyleInlinerService
 *
 * @author Mike Pepper <mike.pepper@enovate.co.uk>
 * @package InlineStyler
 * @since 1.1.0
 */
class Settings extends Model
{
    /**
     * @var string The path prefix for critical CSS files
     */
    public string $criticalPrefix = '@webroot/';

    public bool $criticalCss = true;
}
