<?php
/*
  Plugin Name: Comment Competition Confirm - CCC
  Plugin URI: http://github.com/nepda/wp-plugin-ccc
  Description: Fuegt fuer gewisse Beitraege eine zusaetzliche Checkbox an das Kommentarformular um beispielsweise Gewinnspielteilnamebedingungen per Kommentar zu akzeptieren.
  Version: 1.0
  Author: Nepomuk Fraedrich
  Author URI: http://nepda.eu
 */

/**
 * PHP Version >= 5.4
 *
 * @category  WordPress
 * @package   WordPress_CommentCompetitionConfirm
 * @author    Nepomuk Fraedrich <info@nepda.eu>
 */

require_once 'ccc-config.php';

// add the checkbox field to the comment form
function ccc_add_comment_fields($fields) {

    if( get_post_custom_values(CCC_CUSTOM_KEY) ) {
        $fields['competition_rules'] = '<p class="comment-form-public">
                   <input id="' . CCC_COLUMN_NAME . '"
                    name="' . CCC_COLUMN_NAME . '" type="checkbox" />
                   <label for="' . CCC_COLUMN_NAME . '">
                   ' . CCC_CHECKBOX_TEXT . '
                   </label></p>';
    }
    return $fields;
}
add_filter('comment_form_default_fields', 'ccc_add_comment_fields');


// save the checkbox value into comment meta table
function ccc_save_comment_meta_checkbox ( $post_id ) {
    $save_meta_checkbox = $_POST['competition_rules'];


    if ( $save_meta_checkbox == 'on' ) {
        $value = CCC_CHECKED_VALUE;

    } else {
        $value = CCC_UNCHECKED_VALUE;

    }
    add_comment_meta( $post_id, CCC_COLUMN_NAME, $value, true );
}
add_action( 'comment_post', 'ccc_save_comment_meta_checkbox', 1);


// add the column to the comment table view (at the end of the columns)
// called by ccc_editcomments_load (add_filter())
function ccc_editcomments_add_columns( $columns ) {

    $columns['competition_rules'] = CCC_ADMIN_TEXT;
    return $columns;
}


// add filter for admin comment edit view
function ccc_editcomments_load()
{
    $screen = get_current_screen();

    add_filter("manage_{$screen->id}_columns", 'ccc_editcomments_add_columns');
}
add_action('load-edit-comments.php', 'ccc_editcomments_load');


// finally output the value
function ccc_competition_column_cb($col, $comment_id)
{
    // you could expand the switch to take care of other custom columns
    switch($col)
    {
        case CCC_COLUMN_NAME:
            if($t = get_comment_meta($comment_id, CCC_COLUMN_NAME, true))
            {
                echo esc_html($t);
            }
            else
            {
                echo esc_html('');
            }
            break;
    }
}
add_action('manage_comments_custom_column', 'ccc_competition_column_cb', 10, 2);
