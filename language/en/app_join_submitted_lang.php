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
  'PAGE_TITLE' => 'Thank you!',
  'TEST_VAR' => 'Test',
  'SUBMITTED_TEXT' => 'Thank you for submitting your application!',
));
