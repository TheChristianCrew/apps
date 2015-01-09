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

  /** @var \phpbb\request\request */
  protected $request;

  /** @var string phpBB root path */
  protected $phpbb_root_path;

  /**
   * Contructor
   *
   * @param \phpbb\config\config		          $config           Config object
   * @param \phpbb\controller\helper	        $helper           Helper object
   * @param \phpbb\template\template          $template         Template object
   * @param \phpbb\user				                $user             User object
   * @param \phpbb\request\request            $request          Request object
   * @param string                            $phpbb_root_path  phpbb_root_path
   * @access public
   */
  public function __construct(\phpbb\config\config $config, \phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\user $user, \phpbb\request\request $request, $phpbb_root_path) {
    $this->config = $config;
    $this->helper = $helper;
    $this->template = $template;
    $this->user = $user;
    $this->request = $request;
    $this->phpbb_root_path = $phpbb_root_path;
  }

  /**
   * Display app page
   *
   * @return \Symfony\Component\HttpFoundation\Response A Symfony Response object
   * @access public
   */
  public function display($app = '') {

    global $phpbb_root_path;

    $apps = $this->apps();

    $language_file = 'app_default_lang';
    $template = 'app_default.html';

    /**
     * Check if an application has been requested and whether or not the
     * requested app exists in the app array
     */
    if (!empty($app) && array_key_exists($app, $apps)) {

      // Assign template vars
      $this->template->assign_vars(array(
        'L_FORM_ACTION' => './'. $app,
      ));

      $language_file = 'app_'. $app .'_lang';
      $template = 'app_'. $app .'.html';

    }

    // Load language file
    $this->user->add_lang_ext('thechristiancrew/apps', $language_file);

    // Render template
    return $this->helper->render($template, $this->user->lang('PAGE_TITLE'));

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

  /**
   * Process form
   */
  public function processForm($app = '') {

    $template = 'app_submitted.html';

    $title = 'Test Topic';
    $post = $this->request->variable('ingame_name', '');

    // Submit post
    $result = $this->submitPost();

    // Load failed submitted template if submission wasn't successful
    if (!$result) {
      $template = 'app_submitted_failed.html';
    }

    // Load language file
    $this->user->add_lang_ext('thechristiancrew/apps', 'app_'. $app .'_submitted_lang');

    // Render template
    return $this->helper->render($template, $this->user->lang('PAGE_TITLE'));

  }

}
