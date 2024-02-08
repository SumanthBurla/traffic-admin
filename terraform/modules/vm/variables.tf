variable "vm_name" {
  description = "prefix for instance name"
  type        = string
}
variable "machine_type" {
  description = "machine type to be used fo instance"
  type        = string
}
variable "ip_address" {
  type        = string
  description = "ip address for instance"
}
variable "pgsql_instance_address" {
  type        = string
  description = "pgsql_instance_address"
}
variable "zone" {
  description = "zone in which instance is created"
  type        = string
}
variable "tags" {
  description = "list of network tags that are attached to vm "
  type        = list(string)
  default     = ["http-server"]
}
variable "allow_stopping_for_update" {
  description = "true to stop vm when updating vm specifications"
  type        = bool
  default     = true
}
variable "deletion_protection" {
  type        = bool
  description = "deletion_protection for vm"
  default     = false
}
variable "bootdisk_image" {
  description = "specify the boot image to be used"
  type        = string
  default     = "debian-10-buster-v20211028"
}
variable "bootdisk_size" {
  description = "size of the boot disk in GB"
  type        = number
  default     = 10
}
variable "bootdisk_type" {
  description = "Type of bootdisk to be used"
  type        = string
  default     = "pd-ssd"
}
variable "subnetwork" {
  description = "network in which vm is installed "
  type        = string
  default     = "default"
}
variable "file_src_path1" {
  type        = string
  description = "source file path to upload"
  default     = "apache2.conf"
}
variable "file_des_path1" {
  type        = string
  description = "destination file path to upload"
  default     = "apache2.conf"
}
variable "file_src_path2" {
  type        = string
  description = "source file path to upload"
  default     = "php.ini"
}
variable "file_des_path2" {
  type        = string
  description = "destination file path to upload"
  default     = "php.ini"
}

variable "username" {
  type    = string
  default = "sumanthburla12"
}
variable "privatekeypath" {
  type    = string
  default = "id_rsa"
}
variable "publickeypath" {
  type        = string
  description = "path to public "
  default     = "id_rsa.pub"
}

variable "startup_script" {
  type        = string
  description = "startup_script file"
  default     = "./startup_script.sh"
}
# variable "nat_ip" {
#   type = string
#   description = "ip address that is reserved"
# }
