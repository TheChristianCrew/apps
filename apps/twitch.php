<?php

namespace thechristiancrew\apps\apps;

class twitch implements apps_interface {

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

    $forum_id = 127;

    return $forum_id;

  }

  /**
   * The application's topic title
   *
   * @return string App title
   */
  public function getTopicTitle() {

    $title = 'Twitch application submitted by '. $this->user->data['username'];

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

    // Load the language file
    include($this->phpbb_root_path .'ext/thechristiancrew/apps/language/en/'. $this->app .'_lang.php');

    $body = '[size=120][u][b]'. $lang['PERSONAL_INFORMATION'] .'[/b][/u][/size]
    [b][i]'. $lang['INGAME_NAME'] .':[/i][/b] '. $this->request->variable('ingame_name', '') .'
    [b][i]'. $lang['REAL_NAME'] .':[/i][/b] '. $this->request->variable('real_name', '') .'
    [b][i]'. $lang['AGE'] .':[/i][/b] '. $this->request->variable('age', '') .'
    [b][i]'. $lang['TIMEZONE'] .':[/i][/b] '. $this->request->variable('timezone', '') .'
    [b][i]'. $lang['STEAM_COMMUNITY_LINK'] .':[/i][/b] '. $this->request->variable('steam_community_link', '') .'
    [b][i]'. $lang['YOUTUBE_PROFILE_LINK'] .':[/i][/b] '. $this->request->variable('youtube_profile_link', '') .'
    [b][i]'. $lang['TWITCH_PROFILE_LINK'] .':[/i][/b] '. $this->request->variable('twitch_profile_link', '') .'

    [size=120][u][b]'. $lang['STREAMING_INFORMATION'] .'[/b][/u][/size]
    [b][i]'. $lang['TOP_3_GAMES'] .'[/i][/b]
    '. $this->request->variable('top_3_games', '') .'

    [b][i]'. $lang['TOP_3_GENRES'] .'[/i][/b]
    '. $this->request->variable('top_3_genres', '') .'

    [b][i]'. $lang['WHAT_DAYS'] .'[/i][/b]
    '. implode(', ', $this->request->variable('what_days', array('1'=>''))) .'

    [b][i]'. $lang['WHAT_TIME'] .'[/i][/b]
    '. $this->request->variable('what_time', '') .'

    [b][i]'. $lang['WEBCAM'] .'[/i][/b]
    '. $this->request->variable('webcam', '') .'

    [b][i]'. $lang['MIC'] .'[/i][/b]
    '. $this->request->variable('mic', '') .'

    [b][i]'. $lang['RIG'] .'[/i][/b]
    '. $this->request->variable('rig', '') .'

    [size=120][u][b]'. $lang['MEMBERSHIP_INFORMATION'] .'[/b][/u][/size]
    [b][i]'. $lang['ARE_YOU_A_MEMBER'] .'[/i][/b]
    '. $this->request->variable('are_you_a_member', '') .'

    [b][i]'. $lang['HOW_LONG'] .'[/i][/b]
    '. $this->request->variable('how_long', '') .'

    [b][i]'. $lang['ABOUT_YOU'] .'[/i][/b]
    '. $this->request->variable('about_you', '') .'

    [b][i]'. $lang['COMMUNITY_BENEFIT'] .'[/i][/b]
    '. $this->request->variable('community_benefit', '') .'

    [size=120][u][b]'. $lang['STREAMING_CODE_OF_CONDUCT'] .'[/b][/u][/size]
    [b][i]'. $lang['SCOC_INTRO'] .'[/i][/b]
    [list]
    [*]'. $lang['CODE_1'] .'
    [*]'. $lang['CODE_2'] .'
    [*]'. $lang['CODE_3'] .'
    [*]'. $lang['CODE_4'] .'
    [*]'. $lang['CODE_5'] .'
    [*]'. $lang['CODE_6'] .'
    [/list]

    [b][i]'. $lang['AGREE'] .'[/i][/b]
    '. $this->request->variable('agree', '');

    return $body;

  }

}
