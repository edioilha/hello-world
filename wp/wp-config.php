<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'A7QivAzO,1q;22^;l F_2(U|FKSHWX#5)UF+b5<54=&3`$;fCm+ }PYv%;@_ll,p');
define('SECURE_AUTH_KEY',  'Z=-${+Lb|@v`AZjRe,vNYcgbOSi:|l/H~]Pq1}&WN9>JfKpg3^[BI.|sbVJEJ{.J');
define('LOGGED_IN_KEY',    'Qk[+@gT_Z?sB|Tl/}>x$h-^W9IB@b<S+TH 4o+E5<Vyi-IR5$AU-TT^cC,!bgObj');
define('NONCE_KEY',        'E4kZr]L)r#LU Hv^K|hfSU|u^}Xnd(?`][cnVUKD8;~:cqF&)?G&cqA/|EL!mZVE');
define('AUTH_SALT',        '{?C<3T6q:if:;,hj ,&O(v<<Lpb~Cgj%Oh3jp-A49hI6h2Ax<bawIVltgMl`z(Q;');
define('SECURE_AUTH_SALT', 'rSR|QqrX=I_}<-n!qR-D0@E6,LR`CHZ]IqUtat~/Q4) ?P ea-69$`*gAp~{d8zG');
define('LOGGED_IN_SALT',   'm>_dz )``(l:cay?0Zqkl#F$G9WFEW|TEq@G7?a=8m 0gN}pjf(kU<LT )iPxu@z');
define('NONCE_SALT',       'B@lc0yV~Tv4eb=B;]QMhIaPKnUb||/RAJCI+tG[;Dh:C56heR <zXu,5;8D1UUP*');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');