<?php
/**
 * @file
 * profiles.ds.inc
 */

/**
 * Implements hook_ds_field_settings_info().
 */
function profiles_ds_field_settings_info() {
  $export = array();

  $ds_fieldsetting = new stdClass();
  $ds_fieldsetting->api_version = 1;
  $ds_fieldsetting->id = 'user|user|default';
  $ds_fieldsetting->entity_type = 'user';
  $ds_fieldsetting->bundle = 'user';
  $ds_fieldsetting->view_mode = 'default';
  $ds_fieldsetting->settings = array(
    'qa_asking_anchor' => array(
      'weight' => '4',
      'label' => 'hidden',
      'format' => 'default',
    ),
    'question_form' => array(
      'weight' => '10',
      'label' => 'hidden',
      'format' => 'default',
    ),
    'user_og_description' => array(
      'weight' => '0',
      'label' => 'hidden',
      'format' => 'default',
      'ft' => array(
        'func' => 'theme_ds_field_reset',
      ),
    ),
    'polls_archive_view' => array(
      'weight' => '0',
      'label' => 'hidden',
      'format' => 'default',
      'ft' => array(
        'func' => 'theme_ds_field_reset',
      ),
    ),
    'polls_profile_last' => array(
      'weight' => '10',
      'label' => 'hidden',
      'format' => 'default',
      'ft' => array(
        'func' => 'theme_ds_field_reset',
      ),
    ),
    'qa_link_counter' => array(
      'weight' => '5',
      'label' => 'hidden',
      'format' => 'default',
      'ft' => array(
        'func' => 'theme_ds_field_expert',
        'ow' => TRUE,
        'ow-el' => 'div',
        'ow-cl' => 'float-left',
      ),
    ),
    'questions_and_answers' => array(
      'weight' => '9',
      'label' => 'hidden',
      'format' => 'default',
      'ft' => array(
        'func' => 'theme_ds_field_minimal',
      ),
    ),
    'field_user_constituency' => array(
      'ft' => array(
        'func' => 'theme_ds_field_expert',
        'lb-col' => TRUE,
        'ow' => TRUE,
        'ow-el' => 'div',
        'ow-cl' => 'field-item clearfix odd',
      ),
    ),
    'field_user_fname' => array(
      'ft' => array(
        'func' => 'theme_ds_field_minimal',
      ),
    ),
    'field_user_job_skills' => array(
      'ft' => array(
        'func' => 'theme_ds_field_expert',
        'lb-el' => 'div',
        'lb-cl' => 'label-inline',
        'lb-col' => TRUE,
        'ow' => TRUE,
        'ow-el' => 'div',
        'ow-cl' => 'field-item clearfix even',
      ),
    ),
    'field_user_lname' => array(
      'ft' => array(
        'func' => 'theme_ds_field_minimal',
      ),
    ),
    'field_user_parliament' => array(
      'ft' => array(
        'func' => 'theme_ds_field_expert',
        'ow' => TRUE,
        'ow-el' => 'p',
        'ow-cl' => '',
      ),
    ),
    'field_user_party' => array(
      'ft' => array(
        'func' => 'theme_ds_field_minimal',
      ),
    ),
    'field_user_picture' => array(
      'ft' => array(
        'func' => 'theme_ds_field_expert',
        'ow' => TRUE,
        'ow-el' => 'div',
        'ow-cl' => 'file-image float-left push-bottom-l',
      ),
    ),
    'group_polls' => array(
      'ft' => array(
        'func' => 'theme_ds_field_reset',
      ),
    ),
    'group_user_polls_archive' => array(
      'ft' => array(
        'func' => 'theme_ds_field_reset',
      ),
    ),
    'group_user_polls_last' => array(
      'ft' => array(
        'func' => 'theme_ds_field_reset',
      ),
    ),
    'group_user_polls' => array(
      'ft' => array(
        'func' => 'theme_ds_field_reset',
      ),
    ),
  );
  $export['user|user|default'] = $ds_fieldsetting;

  $ds_fieldsetting = new stdClass();
  $ds_fieldsetting->api_version = 1;
  $ds_fieldsetting->id = 'user|user|user_search';
  $ds_fieldsetting->entity_type = 'user';
  $ds_fieldsetting->bundle = 'user';
  $ds_fieldsetting->view_mode = 'user_search';
  $ds_fieldsetting->settings = array(
    'name' => array(
      'weight' => '2',
      'label' => 'hidden',
      'format' => 'default',
      'formatter_settings' => array(
        'link' => '1',
        'wrapper' => 'div',
        'class' => 'float-right link-profile',
      ),
      'ft' => array(
        'func' => 'theme_ds_field_minimal',
      ),
    ),
    'field_user_fname' => array(
      'ft' => array(
        'func' => 'theme_ds_field_minimal',
      ),
    ),
    'field_user_lname' => array(
      'ft' => array(
        'func' => 'theme_ds_field_minimal',
      ),
    ),
    'field_user_party' => array(
      'ft' => array(
        'func' => 'theme_ds_field_minimal',
      ),
    ),
    'field_user_picture' => array(
      'ft' => array(
        'func' => 'theme_ds_field_expert',
        'ow' => TRUE,
        'ow-el' => 'div',
        'ow-cl' => 'float-left',
      ),
    ),
    'group_user_name' => array(
      'ft' => array(
        'func' => 'theme_ds_field_expert',
        'ow' => TRUE,
        'ow-el' => 'div',
        'ow-cl' => 'h3',
      ),
    ),
  );
  $export['user|user|user_search'] = $ds_fieldsetting;

  return $export;
}

/**
 * Implements hook_ds_custom_fields_info().
 */
function profiles_ds_custom_fields_info() {
  $export = array();

  $ds_field = new stdClass();
  $ds_field->api_version = 1;
  $ds_field->field = 'ask_a_question';
  $ds_field->label = 'Soon you can ask questions';
  $ds_field->field_type = 6;
  $ds_field->entities = array(
    'node' => 'node',
    'user' => 'user',
  );
  $ds_field->properties = array(
    'block' => 'block|1',
    'block_render' => '2',
  );
  $export['ask_a_question'] = $ds_field;

  $ds_field = new stdClass();
  $ds_field->api_version = 1;
  $ds_field->field = 'go_to_profile';
  $ds_field->label = 'Go to profile';
  $ds_field->field_type = 7;
  $ds_field->entities = array(
    'user' => 'user',
  );
  $ds_field->properties = array(
    'default' => array(),
    'settings' => array(
      'show_title' => array(
        'type' => 'checkbox',
      ),
      'title_wrapper' => array(
        'type' => 'textfield',
        'description' => 'Eg: h1, h2, p',
      ),
      'ctools' => array(
        'type' => 'ctools',
      ),
    ),
  );
  $export['go_to_profile'] = $ds_field;

  $ds_field = new stdClass();
  $ds_field->api_version = 1;
  $ds_field->field = 'polls_archive_view';
  $ds_field->label = 'Polls archive view';
  $ds_field->field_type = 6;
  $ds_field->entities = array(
    'user' => 'user',
  );
  $ds_field->properties = array(
    'block' => 'views|polls_profile-block',
    'block_render' => '1',
  );
  $export['polls_archive_view'] = $ds_field;

  $ds_field = new stdClass();
  $ds_field->api_version = 1;
  $ds_field->field = 'polls_profile_last';
  $ds_field->label = 'Polls profile last';
  $ds_field->field_type = 6;
  $ds_field->entities = array(
    'user' => 'user',
  );
  $ds_field->properties = array(
    'block' => 'views|polls_profile-last',
    'block_render' => '1',
  );
  $export['polls_profile_last'] = $ds_field;

  $ds_field = new stdClass();
  $ds_field->api_version = 1;
  $ds_field->field = 'qa_asking_anchor';
  $ds_field->label = 'Q & A ask anchor';
  $ds_field->field_type = 6;
  $ds_field->entities = array(
    'node' => 'node',
    'user' => 'user',
  );
  $ds_field->properties = array(
    'block' => 'block|5',
    'block_render' => '3',
  );
  $export['qa_asking_anchor'] = $ds_field;

  $ds_field = new stdClass();
  $ds_field->api_version = 1;
  $ds_field->field = 'qa_link_counter';
  $ds_field->label = 'Q&A link and counter';
  $ds_field->field_type = 6;
  $ds_field->entities = array(
    'user' => 'user',
  );
  $ds_field->properties = array(
    'block' => 'views|qa_counter_link-block',
    'block_render' => '3',
  );
  $export['qa_link_counter'] = $ds_field;

  $ds_field = new stdClass();
  $ds_field->api_version = 1;
  $ds_field->field = 'question_form';
  $ds_field->label = 'Question form';
  $ds_field->field_type = 6;
  $ds_field->entities = array(
    'user' => 'user',
  );
  $ds_field->properties = array(
    'block' => 'webform|client-block-17',
    'block_render' => '1',
  );
  $export['question_form'] = $ds_field;

  $ds_field = new stdClass();
  $ds_field->api_version = 1;
  $ds_field->field = 'question_form_anonymous';
  $ds_field->label = 'Question form anonymous';
  $ds_field->field_type = 6;
  $ds_field->entities = array(
    'user' => 'user',
  );
  $ds_field->properties = array(
    'block' => 'webform|client-block-796',
    'block_render' => '2',
  );
  $export['question_form_anonymous'] = $ds_field;

  $ds_field = new stdClass();
  $ds_field->api_version = 1;
  $ds_field->field = 'questions_and_answers';
  $ds_field->label = 'Questions and answers';
  $ds_field->field_type = 6;
  $ds_field->entities = array(
    'user' => 'user',
  );
  $ds_field->properties = array(
    'block' => 'views|profile_questions_answers-block',
    'block_render' => '1',
  );
  $export['questions_and_answers'] = $ds_field;

  $ds_field = new stdClass();
  $ds_field->api_version = 1;
  $ds_field->field = 'sharethis_polls_profile';
  $ds_field->label = 'ShareThis polls profile';
  $ds_field->field_type = 6;
  $ds_field->entities = array(
    'user' => 'user',
  );
  $ds_field->properties = array(
    'block' => 'views|polls_profile-block_2',
    'block_render' => '3',
  );
  $export['sharethis_polls_profile'] = $ds_field;

  $ds_field = new stdClass();
  $ds_field->api_version = 1;
  $ds_field->field = 'user_og_description';
  $ds_field->label = 'User OG Description';
  $ds_field->field_type = 5;
  $ds_field->entities = array(
    'user' => 'user',
  );
  $ds_field->properties = array(
    'code' => array(
      'value' => '<?php
global $user;
$user_fields = user_load($user->uuid);
$firstname = $user_fields->field_user_fname[\'und\'][\'0\'][\'value\'];
$lastname = $user_fields->field_user_lname[\'und\'][\'0\'][\'value\'];
$sitename = token_replace(\'[site:name]\');

$description = "I found something interesting on ".$sitename.". Check it out!";
$element = array(
  \'#tag\' => \'meta\', 
  \'#attributes\' => array(
    \'property\' => \'og:description\',
    \'content\' => $description,
  ),
);
drupal_add_html_head($element, \'og_description\');
?>',
      'format' => 'php_code',
    ),
    'use_token' => 1,
  );
  $export['user_og_description'] = $ds_field;

  return $export;
}

/**
 * Implements hook_ds_layout_settings_info().
 */
function profiles_ds_layout_settings_info() {
  $export = array();

  $ds_layout = new stdClass();
  $ds_layout->api_version = 1;
  $ds_layout->id = 'user|user|default';
  $ds_layout->entity_type = 'user';
  $ds_layout->bundle = 'user';
  $ds_layout->view_mode = 'default';
  $ds_layout->layout = 'ds_1col';
  $ds_layout->settings = array(
    'hide_empty_regions' => 0,
    'hide_sidebars' => 0,
    'regions' => array(
      'ds_content' => array(
        0 => 'group_audience',
        1 => 'user_og_description',
        2 => 'polls_archive_view',
        3 => 'field_user_picture',
        4 => 'group_user_commitee_tab',
        5 => 'group_user_polls',
        6 => 'field_user_fname',
        7 => 'group_user_name',
        8 => 'field_user_parliament',
        9 => 'field_user_lname',
        10 => 'field_user_commitee',
        11 => 'field_user_party',
        12 => 'qa_asking_anchor',
        13 => 'field_user_political_roles',
        14 => 'qa_link_counter',
        15 => 'group_basics',
        16 => 'group_user_basics',
        17 => 'group_roles',
        18 => 'group_user_commitee',
        19 => 'group_polls',
        20 => 'questions_and_answers',
        21 => 'polls_profile_last',
        22 => 'question_form',
        23 => 'field_user_more',
        24 => 'group_user_basics_basics',
        25 => 'field_user_job_skills',
        26 => 'field_user_constituency',
        27 => 'group_user_basics_additional',
        28 => 'group_user_polls_last',
        29 => 'group_user_polls_archive',
      ),
    ),
    'fields' => array(
      'group_audience' => 'ds_content',
      'user_og_description' => 'ds_content',
      'polls_archive_view' => 'ds_content',
      'field_user_picture' => 'ds_content',
      'group_user_commitee_tab' => 'ds_content',
      'group_user_polls' => 'ds_content',
      'field_user_fname' => 'ds_content',
      'group_user_name' => 'ds_content',
      'field_user_parliament' => 'ds_content',
      'field_user_lname' => 'ds_content',
      'field_user_commitee' => 'ds_content',
      'field_user_party' => 'ds_content',
      'qa_asking_anchor' => 'ds_content',
      'field_user_political_roles' => 'ds_content',
      'qa_link_counter' => 'ds_content',
      'group_basics' => 'ds_content',
      'group_user_basics' => 'ds_content',
      'group_roles' => 'ds_content',
      'group_user_commitee' => 'ds_content',
      'group_polls' => 'ds_content',
      'questions_and_answers' => 'ds_content',
      'polls_profile_last' => 'ds_content',
      'question_form' => 'ds_content',
      'field_user_more' => 'ds_content',
      'group_user_basics_basics' => 'ds_content',
      'field_user_job_skills' => 'ds_content',
      'field_user_constituency' => 'ds_content',
      'group_user_basics_additional' => 'ds_content',
      'group_user_polls_last' => 'ds_content',
      'group_user_polls_archive' => 'ds_content',
    ),
    'classes' => array(),
  );
  $export['user|user|default'] = $ds_layout;

  $ds_layout = new stdClass();
  $ds_layout->api_version = 1;
  $ds_layout->id = 'user|user|user_search';
  $ds_layout->entity_type = 'user';
  $ds_layout->bundle = 'user';
  $ds_layout->view_mode = 'user_search';
  $ds_layout->layout = 'ds_1col';
  $ds_layout->settings = array(
    'hide_empty_regions' => 0,
    'hide_sidebars' => 0,
    'regions' => array(
      'ds_content' => array(
        0 => 'field_user_picture',
        1 => 'group_user_name',
        2 => 'field_user_fname',
        3 => 'name',
        4 => 'field_user_lname',
        5 => 'field_user_party',
      ),
    ),
    'fields' => array(
      'field_user_picture' => 'ds_content',
      'group_user_name' => 'ds_content',
      'field_user_fname' => 'ds_content',
      'name' => 'ds_content',
      'field_user_lname' => 'ds_content',
      'field_user_party' => 'ds_content',
    ),
    'classes' => array(),
  );
  $export['user|user|user_search'] = $ds_layout;

  return $export;
}

/**
 * Implements hook_ds_view_modes_info().
 */
function profiles_ds_view_modes_info() {
  $export = array();

  $ds_view_mode = new stdClass();
  $ds_view_mode->api_version = 1;
  $ds_view_mode->view_mode = 'pw_file_landscape_l';
  $ds_view_mode->label = 'pw_file_landscape_l';
  $ds_view_mode->entities = array(
    'file' => 'file',
  );
  $export['pw_file_landscape_l'] = $ds_view_mode;

  $ds_view_mode = new stdClass();
  $ds_view_mode->api_version = 1;
  $ds_view_mode->view_mode = 'pw_file_portrait_l';
  $ds_view_mode->label = 'pw_file_portrait_l';
  $ds_view_mode->entities = array(
    'file' => 'file',
  );
  $export['pw_file_portrait_l'] = $ds_view_mode;

  $ds_view_mode = new stdClass();
  $ds_view_mode->api_version = 1;
  $ds_view_mode->view_mode = 'pw_file_portrait_m';
  $ds_view_mode->label = 'pw_file_portrait_m';
  $ds_view_mode->entities = array(
    'file' => 'file',
  );
  $export['pw_file_portrait_m'] = $ds_view_mode;

  $ds_view_mode = new stdClass();
  $ds_view_mode->api_version = 1;
  $ds_view_mode->view_mode = 'pw_file_portrait_s';
  $ds_view_mode->label = 'pw_file_portrait_s';
  $ds_view_mode->entities = array(
    'file' => 'file',
  );
  $export['pw_file_portrait_s'] = $ds_view_mode;

  $ds_view_mode = new stdClass();
  $ds_view_mode->api_version = 1;
  $ds_view_mode->view_mode = 'user_search';
  $ds_view_mode->label = 'User search';
  $ds_view_mode->entities = array(
    'user' => 'user',
  );
  $export['user_search'] = $ds_view_mode;

  return $export;
}
