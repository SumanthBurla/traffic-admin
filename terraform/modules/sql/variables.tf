variable "instance_name" {
  type        = string
  description = "name for the instance"
}
variable "project_id" {
  type        = string
  description = "The project to deploy to, if not set the default provider project is used."
}

variable "authorized_networks" {
  type        = map(string)
  description = "ip address for instance"
}

variable "region" {
  type        = string
  description = "Region for cloud resources"
}
variable "database_version" {
  type        = string
  description = "The version of of the database. For example, `MYSQL_5_6` or `POSTGRES_9_6`."
}

variable "master_instance_name" {
  type        = string
  description = "The name of the master instance to replicate"
  default     = ""
}
variable "deletion_protection" {
  type    = bool
  default = false
}

variable "tier" {
  type        = string
  description = "The machine tier (First Generation) or type (Second Generation). "
  default     = "db-f1-micro"
}

variable "db_name" {
  type        = string
  description = "Name of the default database to create"
}

variable "db_charset" {
  type        = string
  description = "The charset for the default database"
  default     = "UTF8"
}

variable "db_collation" {
  type        = string
  description = "The collation for the default database. Example for MySQL databases: 'utf8_general_ci', and Postgres: 'en_US.UTF8'"
  default     = "en_US.UTF8"
}

variable "user_name" {
  type        = string
  description = "The name of the default user"
}

variable "user_password" {
  type        = string
  description = "The password for the default user. If not set, a random one will be generated and available in the generated_user_password output variable."
}

variable "activation_policy" {
  type        = string
  description = "This specifies when the instance should be active. Can be either `ALWAYS`, `NEVER` or `ON_DEMAND`."
  default     = "ALWAYS"
}

variable "disk_autoresize" {
  type        = bool
  description = "Second Generation only. Configuration to increase storage size automatically."
  default     = true
}

variable "disk_size" {
  type        = number
  description = "Second generation only. The size of data disk, in GB. Size of a running instance cannot be reduced but can be increased."
  default     = 10
}

variable "disk_type" {
  type        = string
  description = "Second generation only. The type of data disk: `PD_SSD` or `PD_HDD`."
  default     = "PD_SSD"
}
variable "pricing_plan" {
  type        = string
  description = "First generation only. Pricing plan for this instance, can be one of `PER_USE` or `PACKAGE`."
  default     = "PER_USE"
}
# variable "ip_configuration" {
#   description = "The ip_configuration settings subblock"
#   default     = {}
# }
variable "availability_type" {
  type        = string
  description = "This specifies whether a PostgreSQL instance should be set up for high availability (REGIONAL) or single zone (ZONAL)."
  default     = "ZONAL"
}


