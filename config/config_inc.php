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
$g_absolute_path_default_upload_folder = "{$_SERVER['MOUNT_DIRECTORY']}/"; # used with DISK, must contain trailing \ or /.
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
