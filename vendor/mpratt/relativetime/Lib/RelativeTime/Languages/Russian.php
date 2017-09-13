<?php
/**
 * Russian.php
 *
 * @author  Tolya P. (C3La-NS)  <admin@celans.ru>
 * @link    https://celans.ru/
 *
 * This is a russian language configuration file for RelativeTime
 *
 */

namespace RelativeTime\Languages;

/**
 * Russian Translation
 */
class Russian extends \RelativeTime\Adapters\Language
{
    protected $strings = array(
        'now' => 'только что',
        'ago' => '%s назад',
        'left' => '%s left',
        'seconds' => array(
            'plural' => '%d сек.',
            'singular' => '%d секунду',
        ),
        'minutes' => array(
            'plural' => '%d мин.',
            'singular' => '%d минуту',
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
