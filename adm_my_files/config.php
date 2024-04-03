<?php
/**
 ***********************************************************************************************
 * Configuration file of Admidio
 *
 * @copyright The Admidio Team
 * @see https://www.admidio.org/
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2.0 only
 ***********************************************************************************************
 */

// Select your database system for example 'mysql' or 'pgsql'
$gDbType = 'mysql';

// Access to the database of the SQL-Server
$g_adm_srv  = '192.168.4.79';     // Host
$g_adm_port = 3310;     // Port
$g_adm_db   = 'admidio';     // Database-Name
$g_adm_usr  = 'admidio'; // Username
$g_adm_pw   = 'admidio'; // Password

// Table prefix for Admidio-Tables in database
// Example: 'adm'
$g_tbl_praefix = 'adm2';

// URL to this Admidio installation
// Example: 'https://www.admidio.org/example'
$g_root_path = 'http://localhost:9000/admidio';

// The name of the timezone in which your organization is located.
// This must be one of the strings that are defined here https://www.php.net/manual/en/timezones.php
// Example: 'Europe/Berlin'
$gTimezone = 'America/Phoenix';

// If this flag is set = 1 then you must enter your loginname and password
// for an update of the Admidio database to a new version of Admidio.
// For a more comfortable and easy update you can set this preference = 0.
$gLoginForUpdate = 1;
