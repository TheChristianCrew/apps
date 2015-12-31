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

    $apps = array(
      'join',
      'adminrequest'
    );

    $language_file = 'default_lang';
    $template = 'default.html';

    /**
     * Check if an application has been requested
     */
    if (!empty($app) && in_array($app, $apps)) {

      // Assign template vars
      $this->template->assign_vars(array(
        'L_FORM_ACTION' => './'. $app,
      ));

      // Assign the language and template vars
      $language_file = $app .'_lang';
      $template = $app .'_form.html';

    }

    // Load language file
    $this->user->add_lang_ext('thechristiancrew/apps', $language_file);

    // Render template
    return $this->helper->render($template, $this->user->lang('PAGE_TITLE'));

  }

  /**
   * Process form
   */
  public function processForm($app = '') {

    $template = $app .'_form_submitted.html';

    // Get required app class file
    include($this->phpbb_root_path .'ext/thechristiancrew/apps/apps/'. $app .'.php');

    // Instantiate class from included class file
    $app_class = 'thechristiancrew\apps\apps\\'. $app;
    $app_obj = new $app_class;
    $app_obj->setApp($app);
    $app_obj->setRequest($this->request);
    $app_obj->setUser($this->user);

    // Get app data
    $forum_id = $app_obj->getForumID();
    $title = $app_obj->getTopicTitle();
    $body = $app_obj->getTopicBody();

    // Submit post
    $result = $this->submitPost($title, $body, $forum_id);

    // Load failed submitted template if submission wasn't successful
    if (!$result) {
      $template = 'app_submitted_failed.html';
    }

    // Load language file
    $this->user->add_lang_ext('thechristiancrew/apps', 'app_submitted_lang');

    // Render template
    return $this->helper->render($template, $this->user->lang('PAGE_TITLE'));

  }

  /**
   * Submit post
   */
  private function submitPost($title, $body, $forum_id) {

    include($this->phpbb_root_path .'includes/functions_posting.php');

    // Sanitize the form title
    $title = utf8_normalize_nfc($title, '', true);

    // Sanitize the form data
    $body = htmlspecialchars($body);

    // Code from the phpBB message parser
    $match = array('#(script|about|applet|activex|chrome):#i');
    $replace = array("\\1&#058;");
    $body = preg_replace($match, $replace, trim($body));

    // variables to hold the parameters for submit_post
    $uid = $bitfield = $options = '';

    // Setup application acceptance poll
    $poll = array(
			'poll_title' => 'Application Approval',
			'poll_start' => '0',
			'poll_max_options' => '1',
			'poll_length' => '0',
			'poll_vote_change' => 1,
			'poll_options' => array(0 => 'Approve', 1 => 'Deny', 2 => 'Wait'),
		);

    generate_text_for_storage($title, $uid, $bitfield, $options, false, false, false);
    generate_text_for_storage($body, $uid, $bitfield, $options, true, true, true);

    // Set the thread's paramaters
    $params = array(
      'forum_id'            => $forum_id,
      'icon_id'             => false,
      'topic_approved'      => true,
      'enable_bbcode'       => true,
      'enable_smilies'      => true,
      'enable_urls'         => true,
      'enable_sig'          => true,
      'message'             => $body,
      'message_md5'         => md5($body),
      'bbcode_bitfield'     => $bitfield,
      'bbcode_uid'          => $uid,
      'post_edit_locked'    => 0,
      'topic_title'         => $title,
      'notify_set'          => false,
      'notify'              => false,
      'post_time'           => 0,
      'forum_name'          => '',
      'enable_indexing'     => true,
    );

    // Submit the post to phpBB
    $result = submit_post('post', $title, '', POST_NORMAL, $poll, $params);

    return $result;

  }

}
