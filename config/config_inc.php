<?php
# SPDX-FileCopyrightText: ©  Basil Peace
# SPDX-License-Identifier: Apache-2.0

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
$g_allow_signup        = ON;
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

# --- Real names ---
$g_show_realname = ON;
$g_show_user_realname_threshold = REPORTER;  # Set to access level (e.g. VIEWER, REPORTER, DEVELOPER, MANAGER, etc)

# --- Others ---
# $g_default_home_page = 'my_view_page.php';  # Set to name of page to go to after login

/**
 *
 * @global string $g_project_status_enum_string
 */
$g_project_status_enum_string = '1:considered,2:postponed,5:planned,10:in development,50:stable,70:obsolete';

/**
 *
 * @global string $g_status_enum_string
 */
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
 * @global integer $g_bug_reopen_status
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
