<?php
/** -------- DATABASE-------- */
DEFINE('DB_HOST','localhost');
DEFINE('DB_USER','root');
DEFINE('DB_PASSWORD','');
DEFINE('DB_NAME','qlbaocao');
DEFINE('DB_PREFIX','');

/** -------- CONFIG --------- **/
DEFINE('BASE_URL','http://localhost:8080');//
DEFINE('DEFAULT_LANGUAGE','vi');
DEFINE('PREFIX',MD5('DC_'));
DEFINE('COOKIE_EXPIRY',86400);
DEFINE('TIME_ZONE','Asia/Ho_Chi_Minh');
DEFINE('DEC_POINT',',');
DEFINE('THOUSANDS_SEP','.');


/** Cau hinh Codeigniter4
 * 1. Chay php spark serve bao loi
 * Mo file Xampp\php\php.ini xoa dau ";" o dong extension=intl
 * 2. Tao virtualhost
 * - Them dong: LoadModule vhost_alias_module modules/mod_vhost_alias.so (file httpd.conf)
 * - Them dong:
 *      <VirtualHost *:80>
        DocumentRoot "D:/xampp/htdocs/Codeigniter4/public"
        ServerName quanlybaocao.local
        </VirtualHost>
        <VirtualHost *:80>
        DocumentRoot "D:/xampp/htdocs"
        ServerName localhost
        </VirtualHost>
 *  file httpd-vhosts.conf
 * - Chinh sua trong file host may LAN
 * - Cau hinh lai folder icons trong file httpd-autoindex.conf
 *      Alias /icons/ "./icons/"
        <Directory "./icons">
        Options Indexes MultiViews
        AllowOverride None
        Require all granted
        </Directory>
 *
 */