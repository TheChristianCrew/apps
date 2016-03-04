<?php
/**
 * Apps default language file
 */

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
  exit;
}

if (empty($lang) || !is_array($lang))
{
  $lang = array();
}

$lang = array_merge($lang, array(
  'PAGE_TITLE' => 'Application Not Found',
  'ERROR_TEXT' => 'Either you didn\'t request an application or the requested application doesn\'t exist. Please try again.'
));
