sudo apt-get update -y
sudo apt-get install apache2 git php -y
sudo apt-get install php-pgsql php7.3-curl -y
sudo sleep 5
cd /var/www/html/
sudo rm -r index.html
sudo git clone https://github.com/SumanthBurla/traffic-admin.git
sudo mv traffic-admin/* .
sudo rm -fr traffic-admin/
sudo sed -i 's/IP/${var.ip_address}/g' /var/www/html/include/config.php
sudo sed -i 's/IP/${var.ip_address}/g' /var/www/html/api/config/Database.php
sudo sed -i 's/IP/${var.ip_address}/g' /var/www/html/loginAPI.php
sudo sed -i 's/IP/${var.ip_address}/g' /var/www/html/GenerateChallan.php
sudo sed -i 's/IP/${var.ip_address}/g' /var/www/html/cleared.php
sudo sed -i 's/IP/${var.ip_address}/g' /var/www/html/pending.php
sudo rm /etc/php/7.3/apache2/php.ini
sudo rm -f /etc/apache2/apache2.conf
sudo cp /home/sumanthburla12/php.ini /etc/php/7.3/apache2/
sudo cp /home/sumanthburla12/apache2.conf /etc/apache2/
sudo a2enmod headers
sudo systemctl restart apache2
sudo apache2ctl restart
