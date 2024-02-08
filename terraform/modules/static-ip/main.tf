resource "google_compute_address" "static_ip" {
  description  = "static external ip address"
  name         = "${var.vm_name}-ipv4"
  address_type = var.address_type
  region       = var.region
}