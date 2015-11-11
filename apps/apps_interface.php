<?php

namespace thechristiancrew\apps\apps;

interface apps_interface {

  /**
   * Forum ID
   *
   * @return int ID of the forum we'll submit the app to
   */
  public function forumID();

  /**
   * Set the app title
   *
   * @return string App title
   */
  public function title();

  /**
   * Set the app body
   *
   * @param string $app The requested application
   * @return string App body
   */
  public function body();

}
