<?php
# SPDX-FileCopyrightText: ©  Basil Peace
# SPDX-License-Identifier: GPL-2.0-or-later

# In general the value OFF means the feature is disabled and ON means the
# feature is enabled.  Any other cases will have an explanation.

# Look in http://www.mantisbt.org/docs/ or config_defaults_inc.php for more
# detailed comments.

# --- Database Configuration ---
define('RDS_ENGINES', [
  'aurora' => 'mysqli',
  'aurora-mysql' => 'mysqli',
  'aurora-postgresql' => 'pgsql',
  'mariadb' => 'mysqli',
  'mysql' => 'mysqli',
  'oracle-ee' => 'oci8',
  'oracle-se2' => 'oci8',
  'oracle-se1' => 'oci8',
  'oracle-se' => 'oci8',
  'postgres' => 'pgsql',
  'sqlserver-ee' => 'sqlsrv',
  'sqlserver-se' => 'sqlsrv',
  'sqlserver-ex' => 'sqlsrv',
  'sqlserver-web' => 'sqlsrv',
]);

$g_db_type       = RDS_ENGINES[$_SERVER['RDS_ENGINE']];
$g_hostname      = "{$_SERVER['RDS_HOSTNAME']}:{$_SERVER['RDS_PORT']}";
$g_database_name = $_SERVER['RDS_DB_NAME'];
$g_db_username   = $_SERVER['RDS_USERNAME'];
$g_db_password   = $_SERVER['RDS_PASSWORD'];

# --- Security ---
$g_crypto_master_salt = $_SERVER['CRYPTO_MASTER_SALT']; #  Random string of at least 16 chars, unique to the installation

# --- Anonymous Access / Signup ---
$g_allow_signup        = OFF;
$g_allow_anonymous_login  = OFF;
# $g_anonymous_account    = '';

# --- Email Configuration ---
$g_phpMailer_method    = PHPMAILER_METHOD_SMTP; # or PHPMAILER_METHOD_MAIL, PHPMAILER_METHOD_SENDMAIL
$g_smtp_host      = 'smtp.yandex.ru';           # used with PHPMAILER_METHOD_SMTP
$g_smtp_port = 465;
$g_smtp_connection_mode = 'ssl';
$g_smtp_username    = $_SERVER['SMTP_USERNAME']; # used with PHPMAILER_METHOD_SMTP
$g_smtp_password    = $_SERVER['SMTP_PASSWORD']; # used with PHPMAILER_METHOD_SMTP
$g_webmaster_email   = 'mantisbt@fidata.org';
$g_from_email        = 'noreply@fidata.org';  # the "From: " field in emails
$g_return_path_email = 'mantisbt@fidata.org'; # the return address for bounced mail
$g_from_name      = 'FIDATA MantisBT';
# $g_email_receive_own  = OFF;
# $g_email_send_using_cronjob = OFF;

# --- Attachments / File Uploads ---
$g_allow_file_upload  = ON;
$g_file_upload_method  = DISK; # or DATABASE
$g_absolute_path_default_upload_folder = "{$_SERVER['EFS_MOUNT_DIR']}/"; # used with DISK, must contain trailing \ or /.
# $g_max_file_size    = 5000000;  # in bytes
# $g_preview_attachments_inline_max_size = 256 * 1024;
# $g_allowed_files    = '';    # extensions comma separated, e.g. 'php,html,java,exe,pl'
# $g_disallowed_files    = '';    # extensions comma separated

# --- Branding ---
$g_window_title  = 'FIDATA MantisBT';
# $g_logo_image    = 'images/mantis_logo.png';
# $g_favicon_image = 'images/favicon.ico';
/**
 * CSS file
 */
$g_css_include_file = 'custom.css';

# --- Real names ---
$g_show_realname = ON;
$g_show_user_realname_threshold = REPORTER;  # Set to access level (e.g. VIEWER, REPORTER, DEVELOPER, MANAGER, etc)

# --- Others ---
# $g_default_home_page = 'my_view_page.php';  # Set to name of page to go to after login

$g_project_status_enum_string = '1:considered,2:postponed,5:planned,10:in development,50:stable,70:obsolete';

$g_status_enum_string = '10:new,20:feedback required,40:pending estimation,42:pending prioritization,44:pending planning,46:pending assignment,49:help wanted,50:assigned,55:in progress,80:verification required,90:closed';

/**
 * 'status_enum_workflow' defines the workflow, and reflects a simple
 *  2-dimensional matrix. For each existing status, you define which
 *  statuses you can go to from that status, e.g. from NEW_ you might list statuses
 *  '10:new,20:feedback,30:acknowledged' but not higher ones.
 */
$g_status_enum_workflow = array(
  NEW_                   => '40:pending estimation,20:feedback required,90:closed',
  FEEDBACK_REQUIRED      => '10:new,90:closed',
  PENDING_ESTIMATION     => '42:pending prioritization',
  PENDING_PRIORITIZATION => '44:pending planning',
  PENDING_PLANNING       => '46:pending assignment,49:help wanted',
  PENDING_ASSIGNMENT     => '50:assigned,44:pending planning',
  HELP_WANTED            => '50:assigned,44:pending planning',
  ASSIGNED               => '55:in progress,44:pending planning',
  IN_PROGRESS            => '80:verification required,50:assigned,44:pending planning',
  VERIFICATION_REQUIRED  => '90:closed,50:assigned',
  CLOSED                 => ''
);

/**
 * Status to assign to the bug when reopened.
 */
$g_bug_reopen_status = ASSIGNED;

/**
 * this array sets the access thresholds needed to enter each status listed.
 * if a status is not listed, it falls back to $g_update_bug_status_threshold
 * example:
 * $g_set_status_threshold = array(
 *     ACKNOWLEDGED => MANAGER,
 *     CONFIRMED => DEVELOPER,
 *     CLOSED => MANAGER
 * );
 */
$g_set_status_threshold = array(
  NEW_                   => REPORTER,
  FEEDBACK_REQUIRED      => DEVELOPER,
  PENDING_ESTIMATION     => DEVELOPER,
  PENDING_PRIORITIZATION => DEVELOPER,
  PENDING_PLANNING       => MANAGER,
  PENDING_ASSIGNMENT     => MANAGER,
  HELP_WANTED            => MANAGER,
  ASSIGNED               => MANAGER,
  IN_PROGRESS            => DEVELOPER,
  VERIFICATION_REQUIRED  => DEVELOPER,
  CLOSED                 => REPORTER
);

/**
 * status color codes, using experimental Extended Tango color palette
 * (see http://emilis.info/other/extended_tango/)
 */
$g_status_colors = array(
	'new'                    => '#ef2929', # scarlet red
	'feedback required'      => '#5c3566', # plum (purple)
	'pending estimation'     => '#ce5c00', # orange
	'pending prioritization' => '#fcaf3e', # orange
	'pending planning'       => '#fce94f', # butter (yellow)
	'pending assignment'     => '#c4a000', # butter (yellow)
	'help wanted'            => '#ad7fa8', # plum (purple)
	'assigned'               => '#c17d11', # chocolate (light brown)
	'in progress'            => '#97c4f0', # sky blue
	'verification required'  => '#2a5703', # chameleon (dark green)
	'closed'                 => '#2e3436'  # aluminum (dark grey)
);

$g_priority_enum_string = '10:none,15:perfecting,20:low,30:medium,40:high,60:immediate';
/**
 * Icon associative arrays
 * Status to icon mapping
 */
$g_status_icon_arr = array(
	NONE       => 'fa-lg priority_none',
  PERFECTING => 'thumbs-o-up fa-lg priority_perfecting',
	LOW        => 'fa-chevron-down fa-lg priority_low',
	MEDIUM     => 'fa-minus fa-lg priority_medium',
	HIGH       => 'fa-chevron-up fa-lg priority_high',
	IMMEDIATE  => 'fa-clock-o fa-lg priority_immediate'
);

/**
 * Default bug priority when reporting a new bug
 */
$g_default_bug_priority = NONE;

$g_severity_enum_string = '5:question,8:user story,10:new feature,12:enhancement,20:bug trivial,30:bug text,50:bug minor,55:task,60:bug major,70:bug crash,80:bug block,82:task block,90:bug compliance,92:bug security,94:bug legal';
/**
 * Define the multipliers which are used to determine the effectiveness
 * of reporters based on the severity of bugs. Higher multipliers will
 * result in an increase in reporter effectiveness.
 */
$g_severity_multipliers = array(
	QUESTION       => 1,
	USER_STORY     => 3,
	NEW_FEATURE    => 2,
  ENHANCEMENT    => 2,
	BUG_TRIVIAL    => 2,
	BUG_TEXT       => 2,
	BUG_MINOR      => 4,
  TASK           => 5,
	BUG_MAJOR      => 6,
	BUG_CRASH      => 8,
	BUG_BLOCK      => 10,
	TASK_BLOCK     => 10,
	BUG_COMPLIANCE => 10,
	BUG_SECURITY   => 10,
	BUG_LEGAL      => 10
);

$g_reproducibility_enum_string = '10:always,50:random,70:have not tried,90:unable to reproduce,100:N/A';

$g_resolution_enum_string = '10:open,20:fixed,25:done,30:reopened,40:unable to reproduce,60:duplicate,90:by design,95:invalid';

/**
 * Define the resolutions which are used to determine the effectiveness
 * of reporters based on the resolution of bugs. Higher multipliers will
 * result in a decrease in reporter effectiveness. The only resolutions
 * that need to be defined here are those which match or exceed
 * $g_bug_resolution_not_fixed_threshold.
 */
$g_resolution_multipliers = array(
	UNABLE_TO_REPRODUCE => 2,
	DUPLICATE           => 3,
	BY_DESIGN           => 1,
  INVALID             => 5
);

/**
 * show users with their real name or not
 */
$g_show_realname = ON;

/**
 * Enable relationship graphs support.
 * Show issue relationships using graphs.
 */
$g_relationship_graph_enable = OFF;

/**
 * Specifies whether to enable support for project documents or not.
 * This feature is deprecated and is expected to be moved to a plugin
 * in the future.
 */
$g_enable_project_documentation = ON;

$g_default_email_on_status = ON;

/**
 * When enabled, the email notifications will send the full issue with
 * a hint about the change type at the top, rather than using dedicated
 * notifications that are focused on what changed.  This change can be
 * overridden in the database per user.
 */
$g_email_notifications_verbose = ON;

/**
 * A flag that indicates whether to use CDN (content delivery networks) for loading
 * javascript libraries and their associated CSS.  This improves performance for
 * loading MantisBT pages.  This can be disabled if it is desired that MantisBT
 * doesn't reach out outside corporate network.
 */
$g_cdn_enabled = ON;

#################
# Time tracking #
#################

/**
 * Turn on Time Tracking accounting
 */
$g_time_tracking_enabled = ON;
