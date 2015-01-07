<?php

namespace thechristiancrew\apps\controller;

/**
 * Main Controller
 */
class main_controller {

  /* @var \phpbb\config\config */
  protected $config;

  /** @var \phpbb\controller\helper */
  protected $helper;

  /** @var \phpbb\template\template */
  protected $template;

  /**
   * Contructor
   *
   * @param \phpbb\config\config		          $config           Config object
   * @param \phpbb\controller\helper	        $helper           Helper object
   * @param \phpbb\template\template          $template         Template object
   * @access public
   */
  public function __construct(\phpbb\config\config $config, \phpbb\controller\helper $helper, \phpbb\template\template $template) {

    $this->config = $config;
    $this->helper = $helper;
    $this->template = $template;

  }

  /**
   * Display app page
   *
   * @return \Symfony\Component\HttpFoundation\Response A Symfony Response object
   * @access public
   */
  public function display($app = '') {

    return $this->helper->render('apps_home.html');

  }

}
