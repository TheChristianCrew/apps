<?php

namespace thechristiancrew\apps\apps;

class adminrequest implements apps_interface {

  var $app;
  var $request;
  var $user;

  /**
   * Sets the name of the application being requested
   *
   * @param string $app The request application
   */
  public function setApp($app) {
    $this->app = $app;
  }

  /**
   * Sets the request data class
   * https://wiki.phpbb.com/PhpBB3.1/RFC/Request_class
   *
   * @param \phpbb\request\request $request phpBB's request class
   */
  public function setRequest(\phpbb\request\request $request) {
    $this->request = $request;
  }

  /**
   * Sets the user class
   *
   * @param \phpbb\user $user phpBB's user class
   */
  public function setUser(\phpbb\user $user) {
    $this->user = $user;
  }

  /**
   * The Forum ID where the application will get posted to
   *
   * @return int ID of the forum we'll submit the app to
   */
  public function getForumID() {

    $forum_id = 4;

    return $forum_id;

  }

  /**
   * The application's topic title
   *
   * @return string App title
   */
  public function getTopicTitle() {

    $title = 'Admin request submitted by '. $this->user->data['username'];

    return $title;

  }

  /**
   * The application topic body
   *
   * @param string $app The requested application
   * @return string App body
   */
  public function getTopicBody() {

    // Load the language file
    include($this->phpbb_root_path .'ext/thechristiancrew/apps/language/en/'. $this->app .'_lang.php');

    $body = '[size=120][u][b]'. $lang['PERSONAL_INFORMATION'] .'[/b][/u][/size]
    [b][i]'. $lang['INGAME_NAME'] .':[/i][/b] '. $this->request->variable('ingame_name', '') .'
    [b][i]'. $lang['REAL_NAME'] .':[/i][/b] '. $this->request->variable('real_name', '') .'
    [b][i]'. $lang['AGE'] .':[/i][/b] '. $this->request->variable('age', '') .'
    [b][i]'. $lang['LOCATION'] .':[/i][/b] '. $this->request->variable('location', '') .'
    [b][i]'. $lang['STEAM_COMMUNITY_LINK'] .':[/i][/b] '. $this->request->variable('steam_community_link', '') .'

    [b][i]'. $lang['WHAT_DAYS'] .'[/i][/b]
    '. implode(', ', $this->request->variable('what_days', array('1'=>''))) .'

    [b][i]'. $lang['WHAT_TIME'] .'[/i][/b]
    '. $this->request->variable('what_time', '') .'

    [size=120][u][b]'. $lang['MEMBERSHIP_INFORMATION'] .'[/b][/u][/size]
    [b][i]'. $lang['ARE_YOU_A_MEMBER'] .'[/i][/b]
    '. $this->request->variable('are_you_a_member', '') .'

    [b][i]'. $lang['HOW_LONG'] .'[/i][/b]
    '. $this->request->variable('how_long', '') .'

    [size=120][u][b]'. $lang['ADMIN_PHILOSOPHY'] .'[/b][/u][/size]
    [b][i]'. $lang['WHY_GRANT_POWERS'] .'[/i][/b]
    '. $this->request->variable('why_grant_powers', '') .'

    [b][i]'. $lang['IMPROVE_ADMIN_TEAM'] .'[/i][/b]
    '. $this->request->variable('improve_admin_team', '') .'

    [b][i]'. $lang['WHATS_IMPORTANT'] .'[/i][/b]
    '. $this->request->variable('whats_important', '') .'

    [size=120][u][b]'. $lang['ADMIN_DISAGREEMENTS'] .'[/b][/u][/size]
    [b][i]'. $lang['RESOLVE_DISAGREEMENT'] .'[/i][/b]
    '. $this->request->variable('resolve_disagreement', '') .'

    [b][i]'. $lang['HOW_TO_CONTINUE'] .'[/i][/b]
    '. $this->request->variable('how_to_continue', '') .'

    [size=120][u][b]'. $lang['DEALING_WITH_PLAYERS'] .'[/b][/u][/size]
    [b][i]'. $lang['SCENERIO_1'] .'[/i][/b]
    '. $this->request->variable('scenerio_1', '') .'

    [b][i]'. $lang['SCENERIO_2'] .'[/i][/b]
    '. $this->request->variable('scenerio_2', '') .'

    [b][i]'. $lang['SCENERIO_3'] .'[/i][/b]
    '. $this->request->variable('scenerio_3', '') .'

    [b][i]'. $lang['SCENERIO_4'] .'[/i][/b]
    '. $this->request->variable('scenerio_4', '') .'

    [size=120][u][b]'. $lang['ADMIN_CODE_OF_CONDUCT'] .'[/b][/u][/size]
    [b][i]'. $lang['IF_I_AM_ACCEPTED'] .'[/i][/b]
    [list]
    [*]'. $lang['CODE_1'] .'
    [*]'. $lang['CODE_2'] .'
    [*]'. $lang['CODE_3'] .'
    [*]'. $lang['CODE_4'] .'
    [*]'. $lang['CODE_5'] .'
    [*]'. $lang['CODE_6'] .'
    [*]'. $lang['CODE_7'] .'
    [*]'. $lang['CODE_8'] .'
    [/list]

    [b][i]'. $lang['AGREE'] .'[/i][/b]
    '. $this->request->variable('agree', '');

    return $body;

  }

}
