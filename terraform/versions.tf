terraform {
  required_version = ">=0.14.0"
  required_providers {
    google = {
      source  = "hashicorp/google"
      version = ">=3.70.0"
    }
  }
}

provider "google" {
  credentials = var.credentials
  project     = var.project_id
  region      = var.region
  zone        = var.zone
}
