<?php
/**
 * English
 *
 * @author  Michael Pratt <pratt@hablarmierda.net>
 * @link    http://www.michael-pratt.com/
 * 
 * @modified  C3La-NS
 * @link      https://xlns.ru/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace RelativeTime\Languages;

/**
 * English Translation
 */
class Len extends \RelativeTime\Adapters\Language
{
    protected $strings = array(
        'now' => 'now',
        'ago' => '%s',
        'left' => '%s left',
        'seconds' => array(
            'plural' => '%d sec.',
            'singular' => '%d sec.',
        ),
        'minutes' => array(
            'plural' => '%d min.',
            'singular' => '%d min.',
        ),
        'hours' => array(
            'plural' => '%d h.',
            'singular' => '%d hour',
        ),
        'days' => array(
            'plural' => '%d d.',
            'singular' => '%d day',
        ),
        'months' => array(
            'plural' => '%d mo.',
            'singular' => '%d mo.',
        ),
        'years' => array(
            'plural' => '%d y.',
            'singular' => '%d year',
        ),
    );
}

?>
