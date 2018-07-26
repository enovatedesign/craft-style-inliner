<?php
/**
 * Style Inliner Plugin for Craft CMS 3
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
     * @var string The path prefix (after the document root) for critical CSS files
     */
    public $criticalPrefix = '';
}
