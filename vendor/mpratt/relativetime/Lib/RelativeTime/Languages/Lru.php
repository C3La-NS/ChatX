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
        'now' => 'сейчас',
        'ago' => '%s',
        'left' => '%s left',
        'seconds' => array(
            'plural' => '%d сек.',
            'singular' => '%d секунда',
        ),
        'minutes' => array(
            'plural' => '%d мин.',
            'singular' => '%d минута',
        ),
        'hours' => array(
            'plural' => '%d ч.',
            'singular' => '%d час',
        ),
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
