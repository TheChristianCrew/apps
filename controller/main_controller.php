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

  /** @var string phpBB root path */
  protected $phpbb_root_path;

  /**
   * Contructor
   *
   * @param \phpbb\config\config		          $config           Config object
   * @param \phpbb\controller\helper	        $helper           Helper object
   * @param \phpbb\template\template          $template         Template object
   * @param \phpbb\user				                $user             User object
   * @param string                            $phpbb_root_path  phpbb_root_path
   * @access public
   */
  public function __construct(\phpbb\config\config $config, \phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\user $user, $phpbb_root_path) {
    $this->config = $config;
    $this->helper = $helper;
    $this->template = $template;
    $this->user = $user;
    $this->phpbb_root_path = $phpbb_root_path;
  }

  /**
   * Display app page
   *
   * @return \Symfony\Component\HttpFoundation\Response A Symfony Response object
   * @access public
   */
  public function display($app = '') {

    // Get app configuration
    $apps = $this->apps();

    // Check if an application has been requested
    if (!empty($app) && array_key_exists($app, $apps)) {

      // Assign template vars
      $template_vars = array(
        'ACTION_URL' => $this->phpbb_root_path .'app.php/thechristiancrew/apps/'. $app
      );
      $this->template->assign_vars($template_vars);

      // Get the appropriate language file
      $this->user->add_lang_ext('thechristiancrew/apps', 'app_'. $app .'_lang');

      // Render template
      return $this->helper->render('app_'. $app .'.html', $this->user->lang('PAGE_TITLE'));

    } else {

      return $this->helper->render('app_default.html', 'Applications');

    }

  }

  /**
   * Configure apps
   *
   * @access private
   */
  private function apps() {

    $apps = array(
      'join' => array(
        'slug' => 'join',
        'forum_id' => '2',
      ),
      'adminrequest' => array(
        'slug' => 'adminrequest',
        'forum_id' => '2',
      )
    );

    return $apps;

  }

}
