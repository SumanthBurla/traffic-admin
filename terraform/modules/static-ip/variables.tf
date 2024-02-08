variable "vm_name" {
  type        = string
  description = "name for the instance"
}
variable "region" {
  type        = string
  description = "region for the ip_address"
}
variable "address_type" {
  type        = string
  description = "type of the ip_address"
  default     = "EXTERNAL"
}