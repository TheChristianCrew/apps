<?php

namespace thechristiancrew\apps\apps;

class join implements apps_interface {

  /**
   * Forum ID
   *
   * @return int ID of the forum we'll submit the app to
   */
  public function forumID() {

    $forum_id = 2;

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

    $body = '1, 2, 3...';

    return $body;

  }

}
