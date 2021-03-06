<?php
/**
 * @file
 * pw_blog.ds.inc
 */

/**
 * Implements hook_ds_field_settings_info().
 */
function pw_blog_ds_field_settings_info() {
  $export = array();

  $ds_fieldsetting = new stdClass();
  $ds_fieldsetting->api_version = 1;
  $ds_fieldsetting->id = 'node|blogpost|full';
  $ds_fieldsetting->entity_type = 'node';
  $ds_fieldsetting->bundle = 'blogpost';
  $ds_fieldsetting->view_mode = 'full';
  $ds_fieldsetting->settings = array(
    'anchor_to_top' => array(
      'weight' => '6',
      'label' => 'hidden',
      'format' => 'default',
      'ft' => array(
        'func' => 'theme_ds_field_minimal',
      ),
    ),
    'custom_comment_counter' => array(
      'weight' => '4',
      'label' => 'hidden',
      'format' => 'default',
      'ft' => array(
        'func' => 'theme_ds_field_expert',
        'ow' => TRUE,
        'ow-el' => 'div',
        'ow-cl' => 'comment-count',
      ),
    ),
    'sharethis' => array(
      'weight' => '0',
      'label' => 'hidden',
      'format' => 'default',
      'ft' => array(
        'func' => 'theme_ds_field_reset',
      ),
    ),
    'title' => array(
      'weight' => '1',
      'label' => 'hidden',
      'format' => 'default',
      'ft' => array(
        'func' => 'theme_ds_field_reset',
      ),
    ),
    'comments' => array(
      'weight' => '7',
      'label' => 'hidden',
      'format' => 'default',
    ),
    'author' => array(
      'weight' => '4',
      'label' => 'inline',
      'format' => 'author',
      'ft' => array(
        'func' => 'theme_ds_field_expert',
        'lb' => ' by ',
        'lb-col' => TRUE,
      ),
    ),
    'post_date' => array(
      'weight' => '3',
      'label' => 'inline',
      'format' => 'ds_post_date_medium',
      'ft' => array(
        'func' => 'theme_ds_field_expert',
        'lb' => 'Posted on ',
        'lb-col' => TRUE,
      ),
    ),
    'field_blogpost_blogtags' => array(
      'ft' => array(
        'func' => 'theme_ds_field_expert',
        'ow' => TRUE,
        'ow-el' => 'div',
        'ow-cl' => 'icon-taxonomy',
      ),
    ),
    'field_teaser_image' => array(
      'ft' => array(
        'func' => 'theme_ds_field_expert',
        'ow' => TRUE,
        'ow-el' => 'div',
        'ow-cl' => 'file-image float-left push-bottom-s',
      ),
    ),
    'group_blog_author' => array(
      'ft' => array(
        'func' => 'theme_ds_field_reset',
      ),
    ),
  );
  $export['node|blogpost|full'] = $ds_fieldsetting;

  $ds_fieldsetting = new stdClass();
  $ds_fieldsetting->api_version = 1;
  $ds_fieldsetting->id = 'node|blogpost|print';
  $ds_fieldsetting->entity_type = 'node';
  $ds_fieldsetting->bundle = 'blogpost';
  $ds_fieldsetting->view_mode = 'print';
  $ds_fieldsetting->settings = array(
    'title' => array(
      'weight' => '0',
      'label' => 'hidden',
      'format' => 'default',
    ),
    'comments' => array(
      'weight' => '6',
      'label' => 'hidden',
      'format' => 'default',
    ),
    'author' => array(
      'weight' => '5',
      'label' => 'inline',
      'format' => 'author',
      'ft' => array(
        'func' => 'theme_ds_field_expert',
        'lb' => ' von ',
        'lb-col' => TRUE,
        'ow' => TRUE,
        'ow-el' => 'span',
        'ow-cl' => 'author',
      ),
    ),
    'post_date' => array(
      'weight' => '4',
      'label' => 'inline',
      'format' => 'ds_post_date_medium',
      'ft' => array(
        'func' => 'theme_ds_field_expert',
        'lb' => 'Veröffentlicht am ',
        'lb-col' => TRUE,
        'ow' => TRUE,
        'ow-el' => 'span',
        'ow-cl' => 'date',
      ),
    ),
    'field_blogpost_blogtags' => array(
      'ft' => array(
        'func' => 'theme_ds_field_expert',
        'ow' => TRUE,
        'ow-el' => 'div',
        'ow-cl' => 'field-type-taxonomy-term-reference clearfix clear-both',
        'fis' => TRUE,
        'fis-el' => 'ul',
        'fis-cl' => '',
        'fi' => TRUE,
        'fi-el' => 'li',
        'fi-cl' => '',
      ),
    ),
  );
  $export['node|blogpost|print'] = $ds_fieldsetting;

  $ds_fieldsetting = new stdClass();
  $ds_fieldsetting->api_version = 1;
  $ds_fieldsetting->id = 'node|blogpost|search_result';
  $ds_fieldsetting->entity_type = 'node';
  $ds_fieldsetting->bundle = 'blogpost';
  $ds_fieldsetting->view_mode = 'search_result';
  $ds_fieldsetting->settings = array(
    'title' => array(
      'weight' => '1',
      'label' => 'hidden',
      'format' => 'default',
      'formatter_settings' => array(
        'link' => '0',
        'wrapper' => 'h4',
        'class' => '',
      ),
    ),
    'node_link' => array(
      'weight' => '4',
      'label' => 'hidden',
      'format' => 'default',
      'ft' => array(
        'func' => 'theme_ds_field_expert',
        'fi' => TRUE,
        'fi-el' => 'span',
        'fi-cl' => 'read-more',
      ),
    ),
    'post_date' => array(
      'weight' => '0',
      'label' => 'hidden',
      'format' => 'ds_post_date_date_short',
    ),
    'body' => array(
      'ft' => array(
        'func' => 'theme_ds_field_expert',
        'ow' => TRUE,
        'ow-el' => 'span',
        'ow-cl' => 'light',
      ),
    ),
  );
  $export['node|blogpost|search_result'] = $ds_fieldsetting;

  $ds_fieldsetting = new stdClass();
  $ds_fieldsetting->api_version = 1;
  $ds_fieldsetting->id = 'node|blogpost|teaser';
  $ds_fieldsetting->entity_type = 'node';
  $ds_fieldsetting->bundle = 'blogpost';
  $ds_fieldsetting->view_mode = 'teaser';
  $ds_fieldsetting->settings = array(
    'sharethis' => array(
      'weight' => '0',
      'label' => 'hidden',
      'format' => 'default',
      'ft' => array(
        'func' => 'theme_ds_field_reset',
      ),
    ),
    'title' => array(
      'weight' => '1',
      'label' => 'hidden',
      'format' => 'default',
      'formatter_settings' => array(
        'link' => '1',
        'wrapper' => 'h3',
        'class' => '',
      ),
      'ft' => array(
        'func' => 'theme_ds_field_minimal',
      ),
    ),
    'comments' => array(
      'weight' => '8',
      'label' => 'hidden',
      'format' => 'default',
    ),
    'author' => array(
      'weight' => '4',
      'label' => 'inline',
      'format' => 'author',
      'ft' => array(
        'func' => 'theme_ds_field_expert',
        'lb' => ' by ',
        'lb-col' => TRUE,
        'ow' => TRUE,
        'ow-el' => 'span',
        'ow-cl' => 'author',
      ),
    ),
    'post_date' => array(
      'weight' => '3',
      'label' => 'inline',
      'format' => 'ds_post_date_medium',
      'ft' => array(
        'func' => 'theme_ds_field_expert',
        'lb' => 'Posted on ',
        'lb-col' => TRUE,
        'ow' => TRUE,
        'ow-el' => 'span',
        'ow-cl' => 'date',
      ),
    ),
    'body' => array(
      'ft' => array(
        'func' => 'theme_ds_field_minimal',
      ),
    ),
    'field_blogpost_blogtags' => array(
      'ft' => array(
        'func' => 'theme_ds_field_expert',
        'ow' => TRUE,
        'ow-el' => 'div',
        'ow-cl' => 'icon-taxonomy clearfix clear-both',
      ),
    ),
    'field_teaser_image' => array(
      'ft' => array(
        'func' => 'theme_ds_field_expert',
        'ow' => TRUE,
        'ow-el' => 'div',
        'ow-cl' => 'float-left file-image push-bottom-s clear-both',
      ),
    ),
    'group_blogtags_author' => array(
      'ft' => array(
        'func' => 'theme_ds_field_reset',
      ),
    ),
  );
  $export['node|blogpost|teaser'] = $ds_fieldsetting;

  return $export;
}

/**
 * Implements hook_ds_custom_fields_info().
 */
function pw_blog_ds_custom_fields_info() {
  $export = array();

  $ds_field = new stdClass();
  $ds_field->api_version = 1;
  $ds_field->field = 'anchor_to_top';
  $ds_field->label = 'Anchor to top';
  $ds_field->field_type = 6;
  $ds_field->entities = array(
    'node' => 'node',
  );
  $ds_field->properties = array(
    'block' => 'block|7',
    'block_render' => '3',
  );
  $export['anchor_to_top'] = $ds_field;

  $ds_field = new stdClass();
  $ds_field->api_version = 1;
  $ds_field->field = 'block_newsletter_order';
  $ds_field->label = 'Newsletter bestellen';
  $ds_field->field_type = 6;
  $ds_field->entities = array(
    'node' => 'node',
  );
  $ds_field->properties = array(
    'block' => 'block|3',
    'block_render' => '1',
  );
  $export['block_newsletter_order'] = $ds_field;

  $ds_field = new stdClass();
  $ds_field->api_version = 1;
  $ds_field->field = 'custom_comment_counter';
  $ds_field->label = 'Custom Comment Counter';
  $ds_field->field_type = 5;
  $ds_field->entities = array(
    'comment' => 'comment',
    'node' => 'node',
  );
  $ds_field->properties = array(
    'code' => array(
      'value' => '<?php

// Load and print comment count
$node = node_load(arg(1));
if($node->comment_count == 0){
    print t("Bisher keine Kommentare");
}
else if($node->comment_count == 1){
    print "1 Kommentar";
}
else{
    print $node->comment_count." Kommentare";
}

?>',
      'format' => 'php_code',
    ),
    'use_token' => 0,
  );
  $export['custom_comment_counter'] = $ds_field;

  $ds_field = new stdClass();
  $ds_field->api_version = 1;
  $ds_field->field = 'rss';
  $ds_field->label = 'RSS';
  $ds_field->field_type = 7;
  $ds_field->entities = array(
    'node' => 'node',
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
  $export['rss'] = $ds_field;

  return $export;
}

/**
 * Implements hook_ds_layout_settings_info().
 */
function pw_blog_ds_layout_settings_info() {
  $export = array();

  $ds_layout = new stdClass();
  $ds_layout->api_version = 1;
  $ds_layout->id = 'node|blogpost|full';
  $ds_layout->entity_type = 'node';
  $ds_layout->bundle = 'blogpost';
  $ds_layout->view_mode = 'full';
  $ds_layout->layout = 'ds_1col';
  $ds_layout->settings = array(
    'hide_empty_regions' => 0,
    'hide_sidebars' => 0,
    'regions' => array(
      'ds_content' => array(
        0 => 'sharethis',
        1 => 'title',
        2 => 'group_blog_author',
        3 => 'field_blogpost_blogtags',
        4 => 'group_blog_metainformation',
        5 => 'post_date',
        6 => 'author',
        7 => 'custom_comment_counter',
        8 => 'field_teaser_image',
        9 => 'body',
        10 => 'anchor_to_top',
        11 => 'comments',
      ),
    ),
    'fields' => array(
      'sharethis' => 'ds_content',
      'title' => 'ds_content',
      'group_blog_author' => 'ds_content',
      'field_blogpost_blogtags' => 'ds_content',
      'group_blog_metainformation' => 'ds_content',
      'post_date' => 'ds_content',
      'author' => 'ds_content',
      'custom_comment_counter' => 'ds_content',
      'field_teaser_image' => 'ds_content',
      'body' => 'ds_content',
      'anchor_to_top' => 'ds_content',
      'comments' => 'ds_content',
    ),
    'classes' => array(),
    'hide_page_title' => '1',
    'page_option_title' => '',
  );
  $export['node|blogpost|full'] = $ds_layout;

  $ds_layout = new stdClass();
  $ds_layout->api_version = 1;
  $ds_layout->id = 'node|blogpost|print';
  $ds_layout->entity_type = 'node';
  $ds_layout->bundle = 'blogpost';
  $ds_layout->view_mode = 'print';
  $ds_layout->layout = 'ds_1col';
  $ds_layout->settings = array(
    'hide_empty_regions' => 0,
    'hide_sidebars' => 0,
    'regions' => array(
      'ds_content' => array(
        0 => 'title',
        1 => 'group_blog_submitted',
        2 => 'field_blogpost_blogtags',
        3 => 'post_date',
        4 => 'author',
        5 => 'body',
        6 => 'comments',
      ),
    ),
    'fields' => array(
      'title' => 'ds_content',
      'group_blog_submitted' => 'ds_content',
      'field_blogpost_blogtags' => 'ds_content',
      'post_date' => 'ds_content',
      'author' => 'ds_content',
      'body' => 'ds_content',
      'comments' => 'ds_content',
    ),
    'classes' => array(),
  );
  $export['node|blogpost|print'] = $ds_layout;

  $ds_layout = new stdClass();
  $ds_layout->api_version = 1;
  $ds_layout->id = 'node|blogpost|search_result';
  $ds_layout->entity_type = 'node';
  $ds_layout->bundle = 'blogpost';
  $ds_layout->view_mode = 'search_result';
  $ds_layout->layout = 'panels-flexible:agw_date_left';
  $ds_layout->settings = array(
    'hide_empty_regions' => 0,
    'hide_sidebars' => 0,
    'regions' => array(
      'center' => array(
        0 => 'post_date',
      ),
      'right' => array(
        0 => 'title',
        1 => 'group_search_blog_body',
        2 => 'body',
        3 => 'node_link',
      ),
    ),
    'fields' => array(
      'post_date' => 'center',
      'title' => 'right',
      'group_search_blog_body' => 'right',
      'body' => 'right',
      'node_link' => 'right',
    ),
    'classes' => array(),
  );
  $export['node|blogpost|search_result'] = $ds_layout;

  $ds_layout = new stdClass();
  $ds_layout->api_version = 1;
  $ds_layout->id = 'node|blogpost|teaser';
  $ds_layout->entity_type = 'node';
  $ds_layout->bundle = 'blogpost';
  $ds_layout->view_mode = 'teaser';
  $ds_layout->layout = 'ds_1col';
  $ds_layout->settings = array(
    'hide_empty_regions' => 0,
    'hide_sidebars' => 0,
    'regions' => array(
      'ds_content' => array(
        0 => 'sharethis',
        1 => 'title',
        2 => 'group_blogtags_author',
        3 => 'post_date',
        4 => 'author',
        5 => 'field_teaser_image',
        6 => 'body',
        7 => 'field_blogpost_blogtags',
        8 => 'comments',
      ),
    ),
    'fields' => array(
      'sharethis' => 'ds_content',
      'title' => 'ds_content',
      'group_blogtags_author' => 'ds_content',
      'post_date' => 'ds_content',
      'author' => 'ds_content',
      'field_teaser_image' => 'ds_content',
      'body' => 'ds_content',
      'field_blogpost_blogtags' => 'ds_content',
      'comments' => 'ds_content',
    ),
    'classes' => array(),
  );
  $export['node|blogpost|teaser'] = $ds_layout;

  return $export;
}
