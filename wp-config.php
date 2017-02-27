<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
//define('DB_NAME', 'db149383_deckercomm');

/** MySQL database username */
//define('DB_USER', 'db149383');

/** MySQL database password */
//define('DB_PASSWORD', 'V@_jz28#Qoo');

/** MySQL hostname */
//define('DB_HOST', 'internal-db.s149383.gridserver.com');

define('DB_NAME', 'deckercomm');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '|Ncoz4E:BhC*xZwgPvO3]n[a8w|7v}?h`I?I_^Y|bR-!dT09OD$.ekFv+cif?0Kq');
define('SECURE_AUTH_KEY',  'qupp+4k9&++G_h*}4U*6d=hC0v>Oy&ed4I2SAbiXL7e2I?L8hP>>4._D>P`+87+m');
define('LOGGED_IN_KEY',    '-g)5:L,+}~@!NKfT1pY#dfNwf+!pD;Wk_}iE}6+7rMaPGZRJ4$*Q%+|6dC|]#,>[');
define('NONCE_KEY',        ' c{y-czMSc_+PV@hxZJ5~,vVW)CXnKMd=TXPnL ]n2e6Zm3ZDf$Ry)4XQ WJ-+xK');
define('AUTH_SALT',        'l2#CgMHLsR=op|Htxx%)&U!@C-6nJLf1z2KTlWiI) |5H5*`Lc>LJjK}+|d4F &{');
define('SECURE_AUTH_SALT', '5M9<L/<Z|K3oW,X--gNe!Qz0jMiXCPTvn_?1;WCS;HoV|v1Uue{kn0fnV|+u<zrk');
define('LOGGED_IN_SALT',   'yNFi`]V0`S}fO/~a4R#eYBUX?!fn<s:1Z[s>r= ke4+<6Fa ERAG2HZI.$$-~B`I');
define('NONCE_SALT',       'Kut%vhB{-%;r<+|+p)Lq%QT`Zp<DUaRQz>!}wXYs/_1bko| ,5z|Z2Zj:o^-.-4-');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'dcom_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
//define('WPLANG', 'en_GB');

//define('ENABLE_CACHE', true);
define('WP_POST_REVISIONS', '7');
define('WP_MEMORY_LIMIT', '256M');
define( 'WP_MAX_MEMORY_LIMIT', '256M' );
define( 'WP_CRON_LOCK_TIMEOUT', 900 );
define( 'WP_CACHE', true );
define( 'CORE_UPGRADE_SKIP_NEW_BUNDLED', true ); //do not add new themes on automatic WP upgrade
define('DISALLOW_FILE_EDIT', true); //disable file editing in administration area

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);
/*
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
define('SCRIPT_DEBUG', true);
@ini_set('display_errors', 0);
*/

define('FORCE_SSL_ADMIN', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
