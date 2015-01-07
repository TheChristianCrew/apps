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

  /* @var \phpbb\user */
  protected $user;

  /**
   * Contructor
   *
   * @param \phpbb\config\config		          $config           Config object
   * @param \phpbb\controller\helper	        $helper           Helper object
   * @param \phpbb\template\template          $template         Template object
   * @param \phpbb\user				                $user             User object
   * @access public
   */
  public function __construct(\phpbb\config\config $config, \phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\user $user) {
    $this->config = $config;
    $this->helper = $helper;
    $this->template = $template;
    $this->user = $user;
  }

  /**
   * Display app page
   *
   * @return \Symfony\Component\HttpFoundation\Response A Symfony Response object
   * @access public
   */
  public function display($app = '') {

    // Check if an application has been requested
    if (!empty($app)) {

      // Get the appropriate language file
      $this->user->add_lang_ext('thechristiancrew/apps', 'app_'. $app .'_lang');

      // Render template
      return $this->helper->render('app_'. $app .'.html', $this->user->lang('PAGE_TITLE'));

    } else {

      return $this->helper->render('app_default.html', 'Applications');

    }

  }

}
