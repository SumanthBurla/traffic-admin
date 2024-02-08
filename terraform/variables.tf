variable "credentials" {
  description = "Provide path to your .json service account key file"
  type        = string
}
variable "project_id" {
  description = "provide project-id in which vpc network to be created"
  type        = string
}
variable "region" {
  description = "Region name"
  type        = string
  default     = "us-central1"
}
variable "zone" {
  description = "Zone"
  type        = string
  default     = "us-central1-b"
}

#VM
variable "vm_name" {
  description = "prefix for instance name"
  type        = string
}
variable "machine_type" {
  description = "machine type to be used fo instance"
  type        = string
}

#PGsql
variable "instance_name" {
  type        = string
  description = "name for the instance"
}

variable "database_version" {
  type        = string
  description = "The version of of the database. For example, `MYSQL_5_6` or `POSTGRES_9_6`."
}
variable "db_name" {
  type        = string
  description = "Name of the default database to create"
}

variable "user_name" {
  type        = string
  description = "The name of the default user"
}

variable "user_password" {
  type        = string
  description = "The password for the default user. If not set, a random one will be generated and available in the generated_user_password output variable."
}

