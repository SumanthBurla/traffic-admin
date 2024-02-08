output "vm_id" {
  value = google_compute_instance.vm.*.instance_id
}
output "instance_name" {
  value = google_compute_instance.vm[*].name
}
output "vm_internal_ip" {
  value = google_compute_instance.vm.*.network_interface.0.network_ip
}
output "vm_external_ip" {
  value = google_compute_instance.vm.*.network_interface.0.access_config.0.nat_ip
}
