# when ran from inside Pandoc-Web-Interface/ will copy all necessary files to root of web directory
cp -r * /var/www/html/

# copy PHP settings to correct path
cp php.ini /etc/php/7.0/apache2/php.ini
