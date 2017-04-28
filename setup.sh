# when ran from inside Pandoc-Web-Interface/ will copy all necessary files to root of web directory
echo "copying tool to /var/www/html/ . . ."
cp -r * /var/www/html/

# copy PHP settings to correct path
echo "copying php.ini to /etc/php/7.0/apache2/ . . ."
sudo cp php.ini /etc/php/7.0/apache2/php.ini

# Restart Apache2
echo "restarting apache . . ."
sudo service apache2 restart
