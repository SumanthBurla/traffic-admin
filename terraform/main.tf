module "admin-portal" {
  depends_on = [
    module.static_ip, module.pgsql
  ]
  source                 = "./modules/vm/"
  vm_name                = var.vm_name
  machine_type           = var.machine_type
  zone                   = var.zone
  ip_address             = module.static_ip.static_ip_address
  pgsql_instance_address = module.pgsql.pgsql_instance_address
}
module "pgsql" {
  depends_on = [
    module.static_ip
  ]
  source              = "./modules/sql/"
  project_id          = var.project_id
  region              = var.region
  instance_name       = var.instance_name
  database_version    = var.database_version
  db_name             = var.db_name
  user_name           = var.user_name
  user_password       = var.user_password
  authorized_networks = tomap({ "value" = "0.0.0.0/0" })
  #authorized_networks = tomap({ "value" = "${module.static_ip.static_ip_address}/32" })
}

module "static_ip" {
  source  = "./modules/static-ip/"
  vm_name = var.vm_name
  region  = var.region

}