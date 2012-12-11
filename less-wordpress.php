<?php
/*
    Plugin Name: LESS WordPress
    Plugin URI: http://iamkoch.com/less-wordpress/
    Description: A drop in and forget LESS plugin for Wordpress
    Version: 0.1
    Author: Antony Koch
    Author URI: http://iamkoch.com
*/

/*  Copyright 2012 Antony Koch

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

$is_debug = defined('WP_DEBUG') && WP_DEBUG;

// add admin pages
add_action('admin_menu', 'less_wordpress_add_pages');

function less_wordpress_add_pages() {
    add_options_page( 'LESS Wordpress Options', 'LESS Wordpress', 'manage_options', 'iamkoch.less', 'display_less_menu' );
}

function display_less_menu() { ?>
    <div class="less-form-wrapper">
        Debug is <?php
            global $is_debug;
        
            echo ($is_debug ? "ON" : "OFF")
        ?>
    </div>
<? }