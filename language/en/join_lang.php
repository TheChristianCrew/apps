<?php
/**
 * Join application language file
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

  'PAGE_TITLE'      => 'Application to Join The Christian Crew',

  'INGAME_NAME'     => 'In-Game Name',
  'REAL_NAME'       => 'Real Name'

));
