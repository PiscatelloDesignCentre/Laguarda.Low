<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_laguardalowdev');

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
define('AUTH_KEY',         'D1NvH0}OzHpe<,spJayZ-V>i<mp>+qP/6;+UZa5sYc/)x5Q`A-_E^|$A+yS>6H|4');
define('SECURE_AUTH_KEY',  'v8!6w>/<u~0#!~}x^e}A~{?]2|fc=](t@9qVEZ-9y;{n:z&mrEx^Xj@~6P R]ljy');
define('LOGGED_IN_KEY',    '4y3#R6K_!I[IKyDOdk6fD?l(gHk8gP+RetuQeUYr/X}cM;w#_es5pEWp^R]}ez>;');
define('NONCE_KEY',        '<{}syq:PhOP-].;Tp3uk)|6.:KtI;5J+Oz*JW@j8w}+MIg(|g:NFJ( zaft,E$RR');
define('AUTH_SALT',        '[D2?5LzW?3i+U<hF3(~JiagxOZ])AieJsIJ<2UI>?/@<Q8|5>&8<j8|!nJ;hjT,I');
define('SECURE_AUTH_SALT', 'I]}mcId|Q9@lu_qSxOQ~cS!g7w3T4hb1Jy&Il,}iM/{49vo=J4<|/N!r6i~7n(|N');
define('LOGGED_IN_SALT',   ' 3mi~Nut5{:&<=gKlgEqf`h`U]n`Ziwg8%L|38ce5VPA730S---r*8j}?h(hl`jt');
define('NONCE_SALT',       'NBfc|v^YLk<MJ[Zr@*-%cK<W>N9iZ98n9n6j=yHWJRo7PCz7ZSI5/a_&)$HT+EBO');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'nani_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


// Set the site  URL. For Development ONLY on PDC Team Server //

