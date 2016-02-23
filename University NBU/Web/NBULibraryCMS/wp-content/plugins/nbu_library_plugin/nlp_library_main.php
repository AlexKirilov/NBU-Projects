<?php
/*
  Plugin Name: NBU Library Reservetion Plugin
  Plugin URI:
  Description: Reserve Halls in the Library of New Bulgarian University.
  Version: 1.0
  Author: Radoslav
  Author URI:
  License: GPL2
 */

/*  Copyright 2013  Radoslav  (email : )

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

/* * ****************************************************************************
  GLOBALS
 * **************************************************************************** */
/* Plugin name */
$nlp_plugin_name = 'NBU Library Reservetion Plugin';
/* Retvire data from admin options table */
$nlp_plugin_options = get_option('nlp_settings');
/* Get current file location */
$nlp_plugin_current_file_path = plugin_dir_url(__FILE__);
//Plugins dir
$nlp_plugin_dir = plugins_url() . "/nbu_library_plugin";
/* * ****************************************************************************
 * INCLUDES                                                                    *
 * **************************************************************************** */
require_once ('php/nlp_plugin_admin_page.php'); /* Admin page */
require_once ('php/nlp_plugin_functions.php'); /* Plugin functions */
require_once ('php/nlp_plugin_scripts_css_loader.php'); /* Plugin functions */

