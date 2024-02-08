resource "google_sql_database_instance" "master" {
  name                 = var.instance_name
  project              = var.project_id
  region               = var.region
  database_version     = var.database_version
  master_instance_name = var.master_instance_name
  deletion_protection  = var.deletion_protection

  settings {
    tier              = var.tier
    activation_policy = var.activation_policy
    disk_autoresize   = var.disk_autoresize
    disk_size         = var.disk_size
    disk_type         = var.disk_type
    pricing_plan      = var.pricing_plan
    availability_type = var.availability_type

    ip_configuration {
      dynamic "authorized_networks" {
        for_each = var.authorized_networks
        content {
          value = authorized_networks.value
        }
      }
    }

  }

  timeouts {
    create = "60m"
    delete = "2h"
  }

}

#DATABASE
resource "google_sql_database" "traffic-admin" {
  count     = var.master_instance_name == "" ? 1 : 0
  name      = var.db_name
  project   = var.project_id
  instance  = google_sql_database_instance.master.name
  charset   = var.db_charset
  collation = var.db_collation
}

#DB_USER
resource "google_sql_user" "traffic-admin" {
  count    = var.master_instance_name == "" ? 1 : 0
  name     = var.user_name
  project  = var.project_id
  instance = google_sql_database_instance.master.name
  password = var.user_password
}

