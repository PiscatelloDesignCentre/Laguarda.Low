<?php
# Database Configuration
define( 'DB_NAME', 'wp_laguardalowdev' );
define( 'DB_USER', 'laguardalowdev' );
define( 'DB_PASSWORD', 't8Slh93jEFokqmnZDNzH' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'nani_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         '0QGhnf@C+E^!&/B|(i8DiC-66e(?gnF+l`cd+OvKK+@lot*$I|sNZo-enf4/t#+|');
define('SECURE_AUTH_KEY',  '&E(,pa-,XrH-(FuY|%|KW%[pz23(|Xv3D<1TV (n?4$_nm%y[4~Z&SeoH TT*@?j');
define('LOGGED_IN_KEY',    'x&}x.p,XmXX!rr`peW}R{oLPYc/Qg+Q&JE*Q3b?fR7ZFtKB.G$cS`_uitR5|~w~f');
define('NONCE_KEY',        '+IJz6_ucqcYzHvg)O&S{t(N0~6o 4V:FwyH$0|  qK:a2?o6gA=oPfB|3bCN@Yte');
define('AUTH_SALT',        '_D^GQC;So^5F|`-}B<H)pb[vro%4~3H C2H)@$OePNS0ca;*hZZxO.$O/fNjN5+S');
define('SECURE_AUTH_SALT', ';5G,!)Sqq/|++-qwUiKDNe0KmA*cM}%$N+78!>-(Y(P?YtE9;Be2K)z,6;GEG|t>');
define('LOGGED_IN_SALT',   '8-4R>)#5,}m+p=3#a/8Tb^|+Tf0HT.~+fiZ*ERID;#>ta 4YB@UF*f-(-+zc{+SF');
define('NONCE_SALT',       '0ljCQ?h!ml*l 5E)c?7^8Wu3UI+]~K/p;rUG+wRC7~u|k![dVQf;Rx/=`iH!p.z9');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'laguardalowdev' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', 'd1eb7d497f6510b0677e0f03a893256580b3731e' );

define( 'WPE_CLUSTER_ID', '100643' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

// define('WP_DEBUG', true);

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'laguardalowdev.wpengine.com', );

$wpe_varnish_servers=array ( 0 => 'pod-100643', );

$wpe_special_ips=array ( 0 => '104.196.153.81', );

$wpe_ec_servers=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings

define( 'WP_MEMORY_LIMIT', '512M' );
define( 'WP_MAX_MEMORY_LIMIT', '512M' );



# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}
