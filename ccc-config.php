<?php
/**
 * PHP Version >= 5.4
 *
 * @category  WordPress
 * @package   WordPress_CommentCompetitionConfirm
 * @author    Nepomuk Fraedrich <info@nepda.eu>
 */

// TODO define this via plugin config

/**
 * The value of CCC_CUSTOM_KEY is needed as custom key in the post
 *
 * If CCC_CUSTOM_KEY as custom key in the post has any value, the checkbox will appear in the comment form,
 * if the value is not set, the checkbox will not be processed. Tell this value your publisher!
 */
define('CCC_CUSTOM_KEY',      'gewinnspiel');

/**
 * The CCC_COLUMN_NAME will be used to name the value inside the DB.
 *
 * Your input fields will also have this id and name (for designers)
 */
define('CCC_COLUMN_NAME',     'competition_rules');

/**
 * This CCC_CHECKBOX_TEXT will appear as label for your checkbox. You can place a link inside to your competition
 * conditions
 */
define('CCC_CHECKBOX_TEXT',   'Hiermit bestätige ich, dass ich die
                               <a title="zu den Teilnahmebedingungen (neues Fenster)" target="_blank"
                                    href="/gewinnspiel-teilnahmebedingungen">
                               Teilnahmebedingungen</a> gelesen habe und akzeptiere.
                               Andernfalls kann meine Antwort leider nicht berücksichtigt werden.');

/**
 * CCC_CHECKED_VALUE will be put in the DB and shown in your admin dashboard if the user has checked the checkbox
 */
define('CCC_CHECKED_VALUE',   'akzeptiert: ja');

/**
 * CCC_UNCHECKED_VALUE will be put in the DB and shown in your admin dashboard if the user has NOT checked the checkbox
 */
define('CCC_UNCHECKED_VALUE', 'akzeptiert: nein');

/**
 * The value of CCC_ADMIN_TEXT will be shown as column head in your admin dashboard
 */
define('CCC_ADMIN_TEXT',      'Gewinnspiel akzeptiert?');
