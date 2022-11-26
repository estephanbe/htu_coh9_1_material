1.  hosts file
    c:\Windows\System32\Drivers\etc\hosts => "Open as administrator"

2.  conf/apache/httpd.conf
    Include etc/extra/httpd-vhosts.conf (remove the hash tag on this line)

3.  conf/apache/extra/httpd-vhosts.conf OR xampp/apache/conf/extra/httpd-vhosts.conf

    <VirtualHost \*:80>
    ServerAdmin webmaster@htudemo.local
    ServerName htudemo.local
    DocumentRoot "/Applications/XAMPP/htdocs/htudemo"
    <Directory "/Applications/XAMPP/htdocs/htudemo">
    Options Indexes FollowSymLinks Includes ExecCGI
    AllowOverride All
    Require all granted
    </Directory>

    ErrorLog "logs/htudemo.local-error_log"
    CustomLog "logs/htudemo.local-access_log" common

    </VirtualHost>
