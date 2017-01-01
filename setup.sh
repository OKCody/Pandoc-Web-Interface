# In etc/php.ini make the following changes
#   memory_limit = 128M
#   upload_max_filesize = 100M
#   post_max_size = 128M

# Install pandoc
sudo wget -P /etc/yum.repos.d/ https://copr.fedoraproject.org/coprs/petersen/pandoc-el5/repo/epel-5/petersen-pandoc-el5-epel-5.repo
sudo yum install pandoc pandoc-citeproc

# Install unzip
sudo yum install unzip

# This command returns the user which PHP is running under. This user must be
#   the owner of var/www/ ... in order to have write permissions there.
# This will likely return 'apache'
user = ${ps aux | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1}
echo $user

# Make PHP the owner and therefor have RW permissions on www/
sudo chown -R $user /var/www/
