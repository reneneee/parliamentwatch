<?php

/**
 * @file
 * AJAX Commands examples.
 *
 * This demonstrates each of the
 * new AJAX commands. This is consolidated into a dense page because
 * it's advanced material and because it would spread itself all over creation
 * otherwise.
 */

/**
 * Form to display the AJAX Coucils for managment.
 */
function german_councils_list($form, &$form_state) {
    $form = array();

    // Show off the AJAX 'restripe' command. Also shows classic AJAX replacement
    // on the "how many rows" processing.
    $form['restripe_command_example_fieldset'] = array(
        '#type' => 'fieldset',
        '#title' => t("Manage Councils")
    );
    db_set_active(CIVICRM_DB);
    $states = db_select("civicrm_state_province", 's')
            ->fields('s', array('id', 'name'))
            ->condition('country_id', 1082)
            ->execute();
    $all_states = array();
    $first_state = '';
    while ($row = $states->fetchAssoc()) {
        if ($first_state == '') {
            $first_state = $row['id'];
        }
        $all_states[$row['id']] = $row['name'];
    }
//    echo $first_state;
//    exit;
    $option_group_id = db_query("SELECT id FROM civicrm_option_group WHERE title = 'German Councils'")->fetchField();
    $councils = db_select("civicrm_option_value", 'c')
            ->fields('c', array('id', 'name', 'label'))
            ->condition('option_group_id', $option_group_id)
            ->condition('name', $first_state)
            ->orderBy('label', 'ASC')
            ->execute();
    db_set_active();
    $output = '';
    while ($row = $councils->fetchAssoc()) {
        $edit = l('Edit', 'direct_debit/councils/add/' . $row['id'] . '/' . $first_state);
        $delete = l('Delete', 'direct_debit/councils/delete/' . $row['id'], array('html' => TRUE, 'attributes' => array('onclick' => 'return confirm("Are you sure?\nYou want to delete this record.","Delete Record");')));
        $output .= "<tr><td width='100%'>" . $row['label'] . "</td><td width='10%'>$edit</td><td width='10%'>$delete</td></tr>";
    }
    if ($output == '') {
        $output = "<tr><td width='100%'>" . t("No record found.") . "</td></tr>";
    }

    $form['restripe_command_example_fieldset']['restripe_num_rows'] = array(
        '#type' => 'select',
        '#default_value' => !empty($form_state['values']['restripe_num_rows']) ? $form_state['values']['restripe_num_rows'] : 1,
        '#options' => $all_states,
        '#ajax' => array(
            'callback' => 'german_councils_list_restripe_num_rows',
            'method' => 'replace',
            'wrapper' => 'restripe_table',
        ),
    );
    $form['restripe_command_example_fieldset']['restripe_restripe'] = array(
        '#type' => 'hidden',
        '#value' => t("Restripe the table"),
        '#suffix' => "<div id='restripe_div'>
                  <table id='restripe_table'>
                  $output
                  </table>
                  </div>
                  <div id='restripe_status'></div>",
    );

    return $form;
}

/**
 * 'restripe' rows callback.
 *
 * Rebuilds the table with the selected number of rows.
 */
function german_councils_list_restripe_num_rows($form, $form_state) {
    $state_id = $form_state['values']['restripe_num_rows'];
    db_set_active(CIVICRM_DB);
    $option_group_id = db_query("SELECT id FROM civicrm_option_group WHERE title = 'German Council'")->fetchField();
    $councils = db_select("civicrm_option_value", 'c')
            ->fields('c', array('id', 'name', 'label'))
            ->condition('option_group_id', $option_group_id)
            ->condition('name', $state_id)
            ->orderBy('label', 'ASC')
            ->execute();
    db_set_active();

    $output = "<table id='restripe_table'>";
    $count = 0;
    while ($row = $councils->fetchAssoc()) {
        $count = 1;
        $edit = l('Edit', 'direct_debit/councils/add/' . $row['id'] . '/' . $state_id);

        $delete = l('Delete', 'direct_debit/councils/delete/' . $row['id'], array('html' => TRUE, 'attributes' => array('onclick' => 'return confirm("Are you sure?\nYou want to delete this record.","Delete Record");')));
        $output .= "<tr><td width='80%'>" . $row['label'] . "</td><td width='10%'>$edit</td><td width='10%'>$delete</td></tr>";
    }
    if ($count == 0) {
        $output .= "<tr><td width='80%'>No record found.</td></tr>";
    }
    $output .= "</table>";
    return $output;
}

function manage_councils_form($form, &$form_state, $no_js_use = FALSE) {
    // Because we have many fields with the same values, we have to set
    // #tree to be able to access them.
    $form['#tree'] = TRUE;
    $form['names_fieldset'] = array(
        '#type' => 'fieldset',
        '#title' => t('Add Council'),
        // Set up the wrapper so that AJAX will be able to replace the fieldset.
        '#prefix' => '<div id="names-fieldset-wrapper">',
        '#suffix' => '</div>',
    );
    db_set_active(CIVICRM_DB);
    $states = db_select("civicrm_state_province", 's')
            ->fields('s', array('id', 'name'))
            ->condition('country_id', 1082)
            ->execute();
    $all_states = array();
    while ($row = $states->fetchAssoc()) {
        $all_states[$row['id']] = $row['name'];
    }
    $council_name = '';
    $state_id = '';
    $mode = 'add';
    if (arg(3) != "" && arg(4) != "") {
        $council_name = db_query("SELECT label FROM civicrm_option_value WHERE id = " . arg(3))->fetchField();
        $state_id = arg(4);
        $mode = 'edit';
    }
    db_set_active();
    $form['names_fieldset']['german_states'] = array(
        '#type' => 'select',
        '#required' => TRUE,
        '#title' => t('States Name'),
        '#default_value' => $state_id,
        '#options' => $all_states,
    );
    // Build the fieldset with the proper number of names. We'll use
    // $form_state['num_names'] to determine the number of textfields to build.
    if (empty($form_state['num_names'])) {
        $form_state['num_names'] = 1;
    }
    for ($i = 0; $i < $form_state['num_names']; $i++) {
        $form['names_fieldset']['name'][$i] = array(
            '#type' => 'textfield',
            '#required' => TRUE,
            '#default_value' => $council_name,
            '#title' => t('Council Name'),
        );
    }

    if ($mode == 'add') {
        $form['names_fieldset']['add_name'] = array(
            '#type' => 'submit',
            '#value' => t('Add one more'),
            '#submit' => array('manage_councils_form_add_one'),
            // properties of #ajax.
            '#ajax' => array(
                'callback' => 'manage_councils_form_callback',
                'wrapper' => 'names-fieldset-wrapper',
            ),
        );

        if ($form_state['num_names'] > 1) {
            $form['names_fieldset']['remove_name'] = array(
                '#type' => 'submit',
                '#value' => t('Remove one'),
                '#submit' => array('manage_councils_form_remove_one'),
                '#ajax' => array(
                    'callback' => 'manage_councils_form_callback',
                    'wrapper' => 'names-fieldset-wrapper',
                ),
            );
        }
    }
    $form['submit'] = array(
        '#type' => 'submit',
        '#value' => t('Submit'),
    );


    // This simply allows us to demonstrate no-javascript use without
    // actually turning off javascript in the browser. Removing the #ajax
    // element turns off AJAX behaviors on that element and as a result
    // ajax.js doesn't get loaded.
    // For demonstration only! You don't need this.
    if ($no_js_use) {
        // Remove the #ajax from the above, so ajax.js won't be loaded.
        if (!empty($form['names_fieldset']['remove_name']['#ajax'])) {
            unset($form['names_fieldset']['remove_name']['#ajax']);
        }
        unset($form['names_fieldset']['add_name']['#ajax']);
    }

    return $form;
}

/**
 * Callback for both ajax-enabled buttons.
 *
 * Selects and returns the fieldset with the names in it.
 */
function manage_councils_form_callback($form, $form_state) {
    return $form['names_fieldset'];
}

/**
 * Submit handler for the "add-one-more" button.
 *
 * Increments the max counter and causes a rebuild.
 */
function manage_councils_form_add_one($form, &$form_state) {
    $form_state['num_names']++;
    $form_state['rebuild'] = TRUE;
}

/**
 * Submit handler for the "remove one" button.
 *
 * Decrements the max counter and causes a form rebuild.
 */
function manage_councils_form_remove_one($form, &$form_state) {
    if ($form_state['num_names'] > 1) {
        $form_state['num_names']--;
    }
    $form_state['rebuild'] = TRUE;
}

/**
 * Final submit handler.
 *
 * Reports what values were finally set.
 */
function manage_councils_form_submit($form, &$form_state) {

    $councils = $form_state['values']['names_fieldset']['name'];
    $german_state = $form_state['values']['names_fieldset']['german_states'];
    db_set_active(CIVICRM_DB);
    
    $concil_id = '';
    $state_id = '';
    $concil_id = arg(3);
    $state_id = arg(4);
    if ($concil_id != "" && $state_id != "") {
        $action = "db_update";
    } else {
        $action = "db_insert";
    }
    $option_group_id = db_query("SELECT id FROM civicrm_option_group WHERE title = 'German Councils'")->fetchField();
    
    $weight = ''; //TODO will fetch from db +1 
    if ($action == "db_insert") {
        foreach ($councils as $council) {
//            echo 'sdf'; exit;
            $query = db_insert('civicrm_option_value')->fields(array('option_group_id', 'label', 'value', 'name', 'grouping', 'filter', 'is_default', 'weight', 'description', 'is_optgroup',
                'is_reserved', 'is_active', 'component_id', 'domain_id', 'visibility_id'));

            $query->values(array(
                'option_group_id' => $option_group_id,
                'label' => $council,
                'value' => $council,
                'name' => $german_state,
                'grouping' => NULL,
                'filter' => NULL,
                'is_default' => 0,
                'weight' => $weight + 1,
                'description' => NULL,
                'is_optgroup' => 0,
                'is_reserved' => 0,
                'is_active' => 1,
                'component_id' => NULL,
                'domain_id' => NULL,
                'visibility_id' => NULL,
            ));
            $query->execute();
        }
        db_set_active();
        drupal_set_message(t('Council has been added succesfully.'));
    } else {
        foreach ($councils as $council) {
            db_update('civicrm_option_value')
                    ->fields(array(
                        'option_group_id' => $option_group_id,
                        'label' => $council,
                        'value' => $council,
                        'name' => $german_state,
                        'grouping' => NULL,
                        'filter' => NULL,
                        'is_default' => 0,
                        'weight' => $weight + 1,
                        'description' => NULL,
                        'is_optgroup' => 0,
                        'is_reserved' => 0,
                        'is_active' => 1,
                        'component_id' => NULL,
                        'domain_id' => NULL,
                        'visibility_id' => NULL,
                    ))
                    ->condition('id', $concil_id)
                    ->execute();
        }
        db_set_active();
        drupal_set_message(t('Council has been updated succesfully.'));
        drupal_goto("direct_debit/councils/add/" . $concil_id . '/' . $german_state);
    }
}

function council_delete() {
    db_set_active(CIVICRM_DB);
    $council_id = arg(3);
    $num_deleted = db_delete('civicrm_option_value')
            ->condition('id', $council_id)
            ->execute();
    db_set_active();
    drupal_set_message(t("Record deleted successfuly."));
    drupal_goto("direct_debit/councils/manage");
}