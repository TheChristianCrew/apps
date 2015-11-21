<?php

namespace thechristiancrew\apps\apps;

class join implements apps_interface {

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

    $title = 'New application submitted by '. $this->user->data['username'];

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

    $body = '[b]'. $lang['APP_TYPE'] .'[/b]
    '. $this->request->variable('app_type', '') .'

    [size=120][u][b]'. $lang['PERSONAL_INFORMATION'] .'[/b][/u][/size]
    [b][i]'. $lang['INGAME_NAME'] .':[/i][/b] '. $this->request->variable('ingame_name', '') .'
    [b][i]'. $lang['REAL_NAME'] .':[/i][/b] '. $this->request->variable('real_name', '') .'
    [b][i]'. $lang['AGE'] .':[/i][/b] '. $this->request->variable('age', '') .'
    [b][i]'. $lang['LOCATION'] .':[/i][/b] '. $this->request->variable('location', '') .'
    [b][i]'. $lang['STEAM_COMMUNITY_LINK'] .':[/i][/b] '. $this->request->variable('steam_community_link', '') .'

    [b][i]'. $lang['FAVORITE_FISH_SERVERS'] .'[/i][/b]
    '. implode(', ', $this->request->variable('favorite_fish_servers', array('1'=>''))) .'

    [b][i]'. $lang['OTHER_GAMES'] .'[/i][/b]
    '. $this->request->variable('other_games', '') .'

    [b][i]'. $lang['FORMER_MEMBER'] .'[/i][/b]
    '. $this->request->variable('former_member', '') .'

    [b][i]'. $lang['MEMBER_OF_ANOTHER_CLAN'] .'[/i][/b]
    '. $this->request->variable('member_of_another_clan', '') .'

    [b][i]'. $lang['CLAN_INFO'] .'[/i][/b]
    '. $this->request->variable('clan_info', '') .'

    [size=120][u][b]'. $lang['YOUR_FAITH'] .'[/b][/u][/size]
    '; // Line break

    if ($this->request->variable('app_type', '') == 'CC') {

      $body .= '[b][i]'. $lang['BORN_AGAIN'] .'[/i][/b]
      '. $this->request->variable('born_again', '') .'

      [b][i]'. $lang['TESTIMONY'] .'[/i][/b]
      '. $this->request->variable('testimony', '') .'

      [b][i]'. $lang['MINISTRY_INVOLVEMENT'] .'[/i][/b]
      '. $this->request->variable('ministry_involvement', '') .'

      [b][i]'. $lang['DENOMINATION'] .'[/i][/b]
      '. $this->request->variable('denomination', '') .'
      '; // Line break

    } else {

      $body .= '[b][i]'. $lang['OTHER_RELIGION'] .'[/i][/b]
      '. $this->request->variable('other_religion', '') .'
      '; // Line break

    }

    $body .= '
    [size=120][u][b]'. $lang['ABOUT_YOU'] .'[/b][/u][/size]
    [b][i]'. $lang['WHY_JOIN'] .'[/i][/b]
    '. $this->request->variable('why_join', '') .'

    [b][i]'. $lang['CONTRIBUTE'] .'[/i][/b]
    '. $this->request->variable('contribute', '') .'

    [b][i]'. $lang['KNOW_ANY_MEMBERS'] .'[/i][/b]
    '. $this->request->variable('know_any_members', '') .'

    [b][i]'. $lang['AGREE'] .'[/i][/b]
    '. $this->request->variable('agree', '');

    return $body;

  }

}
