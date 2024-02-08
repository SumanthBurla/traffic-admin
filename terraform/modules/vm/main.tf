#virtual machine 
resource "google_compute_instance" "vm" {
  name                      = var.vm_name
  machine_type              = var.machine_type
  zone                      = var.zone
  tags                      = var.tags
  allow_stopping_for_update = var.allow_stopping_for_update
  deletion_protection       = var.deletion_protection
  boot_disk {
    initialize_params {
      image = var.bootdisk_image
      size  = var.bootdisk_size
      type  = var.bootdisk_type
    }
  }
  network_interface {
    subnetwork = var.subnetwork
    access_config {
      nat_ip = var.ip_address
    }
  }


  provisioner "file" {
    source      = var.file_src_path1
    destination = var.file_des_path1
    connection {
      host        = self.network_interface.0.access_config.0.nat_ip
      type        = "ssh"
      user        = var.username
      private_key = file(var.privatekeypath)
    }
  }
  provisioner "file" {
    source      = var.file_src_path2
    destination = var.file_des_path2
    connection {
      host        = self.network_interface.0.access_config.0.nat_ip
      type        = "ssh"
      user        = var.username
      private_key = file(var.privatekeypath)
    }
  }
  provisioner "remote-exec" {
    connection {
      host        = self.network_interface.0.access_config.0.nat_ip
      type        = "ssh"
      user        = var.username
      private_key = file(var.privatekeypath)
    }
    inline = [
      "sudo apt-get update -y",
      "sudo apt-get install apache2 git php -y",
      "sudo apt-get install php-pgsql php7.3-curl -y",
      "sudo sleep 5",
      "cd /var/www/html/",
      "sudo rm -r index.html",
      "sudo git clone https://github.com/SumanthBurla/traffic-admin.git",
      "sudo mv traffic-admin/* .",
      "sudo rm -fr traffic-admin/",
      "sudo sed -i 's/35.224.235.124/${var.pgsql_instance_address}/g' /var/www/html/include/config.php",
      "sudo sed -i 's/35.224.235.124/${var.pgsql_instance_address}/g' /var/www/html/api/config/Database.php",
      "sudo sed -i 's/35.232.126.157/${var.ip_address}/g' /var/www/html/loginAPI.php",
      "sudo sed -i 's/35.232.126.157/${var.ip_address}/g' /var/www/html/GenerateChallan.php",
      "sudo sed -i 's/35.232.126.157/${var.ip_address}/g' /var/www/html/cleared.php",
      "sudo sed -i 's/35.232.126.157/${var.ip_address}/g' /var/www/html/pending.php",
      "sudo rm /etc/php/7.3/apache2/php.ini",
      "sudo rm -f /etc/apache2/apache2.conf",
      "sudo cp /home/sumanthburla12/php.ini /etc/php/7.3/apache2/",
      "sudo cp /home/sumanthburla12/apache2.conf /etc/apache2/",
      "sudo a2enmod headers",
      "sudo systemctl restart apache2",
      "sudo apache2ctl restart"
    ]
  }
  metadata = {
    ssh-keys = "${var.username}:${file(var.publickeypath)}"
  }
  # metadata_startup_script = file(var.startup_script)
}


