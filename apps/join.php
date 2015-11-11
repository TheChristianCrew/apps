<?php

namespace thechristiancrew\apps\apps;

class join implements apps_interface {

  var $app;

  function __construct($app) {
    $this->app = $app;
  }

  /**
   * Forum ID
   *
   * @return int ID of the forum we'll submit the app to
   */
  public function forumID() {

    $forum_id = 4;

    return $forum_id;

  }

  /**
   * Set the app title
   *
   * @return string App title
   */
  public function title() {

    global $request;

    $title = 'Test';

    return $title;

  }

  /**
   * Set the app body
   *
   * @return string App body
   */
  public function body() {

    global $request;

    // Load the language file
    include($this->phpbb_root_path .'ext/thechristiancrew/apps/language/en/'. $this->app .'_lang.php');

    $body = '[b]'. $lang['INGAME_NAME'] .'[/b]
    '. $request->variable('ingame_name', '');

    return $body;

  }

}
