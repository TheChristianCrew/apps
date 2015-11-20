<?php

namespace thechristiancrew\apps\apps;

interface apps_interface {

  /**
   * Sets the name of the application being requested
   *
   * @param string $app The request application
   */
  public function setApp($app);

  /**
   * Sets the request data class
   * https://wiki.phpbb.com/PhpBB3.1/RFC/Request_class
   *
   * @param \phpbb\request\request $request phpBB's request class
   */
  public function setRequest(\phpbb\request\request $request);

  /**
   * The Forum ID where the application will get posted to
   *
   * @return int ID of the forum we'll submit the app to
   */
  public function getForumID();

  /**
   * The application's topic title
   *
   * @return string App title
   */
  public function getTopicTitle();

  /**
   * The application topic body
   *
   * @param string $app The requested application
   * @return string App body
   */
  public function getTopicBody();

}
