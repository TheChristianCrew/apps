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

    $body = '[b]'. $lang['INGAME_NAME'] .'[/b]
    '. $this->request->variable('ingame_name', '');

    return $body;

  }

}
