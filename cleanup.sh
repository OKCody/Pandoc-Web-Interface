# removes all files and directories except uploads/
echo "moving into /var/www/html/ . . ."
cd /var/www/html/
echo "before clean-up:"
ls
rm -rf preview stylesheets *.css *.html *.md *.php *.sh
echo "after clean-up:"
ls
