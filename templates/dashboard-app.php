<?php
/**
 * Plugin Name: Loan Central
 * Description: A complete loan management and pre-underwriting system for mortgage companies.
 * Version: 1.0.0
 * Author: Tony Medina
 * Text Domain: loan-central
 */

// Prevent direct access
if (!defined('ABSPATH')) exit;

// Define constants
define('LC_PATH', plugin_dir_path(__FILE__));
define('LC_URL', plugin_dir_url(__FILE__));

// Include required files
require_once LC_PATH . 'includes/enqueue.php';
require_once LC_PATH . 'includes/admin-page.php';
