<?php
/**
 * Russian
 *
 * @author  C3La-NS
 * @link    https://xlns.ru
 * 
 * This is a russian language configuration file for RelativeTime
 *
 */

namespace RelativeTime\Languages;

/**
 * Russian Translation
 */
class Lru extends \RelativeTime\Adapters\Language
{
    protected $strings = array(
        'days' => array(
            'plural' => '%d дн.',
            'singular' => '%d день',
        ),
        'months' => array(
            'plural' => '%d мес.',
            'singular' => '%d месяц',
        ),
        'years' => array(
            'plural' => '%d г.',
            'singular' => '%d год',
        ),
    );
}

?>
