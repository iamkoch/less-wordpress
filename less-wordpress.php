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
    <div class="wrapper">
        <div class="info">
            <h1>LESS Wordpress</h1>
            <h2>How to use</h2>
            <ol>
                <li>In your style.css file, add the usual WP comment block and nothing else</li>
                <li>Create a folder off of your theme root called less</li>
                <li>Create a file in this folder called application.less</li>
                <li>Switch on development mode and hit save</li>
            </ol>
            <h2>What does this do?</h2>
            <p>Each time you visit your site the plugin will generate the style.css file for you, unminified</p>
            <h2>Won't this affect performance?</h2>
            <p>Yes, but you don't care - you're in development</p>
            <h2>Ah, but what about when I want to make my site live?</h2>
            <p>Simple - switch to production mode, choose minification or not and hit save.</p>
            <h2>But what will that do?</h2>
            <p>That will compile and minify your CSS into your style.css one last time</p>
        </div>
        <div class="form-wrapper">
            <form name="less-wordpress-settings" action="" method="post">
                <label for="development">Mode</label>
                <p>
                    <input type="radio" value="development" id="development" name="mode" /> Development
                </p>
                <p>
                    <input type="radio" id="production" value="production" name="mode" /> Production
                    <input type="checkbox" id="minify" name="minify" value="minify"/> Minify?
                </p>
                <input type="submit" value="Save"/>
            </form>
        </div>
        <?php
            if ( !empty($_POST) ):
                if ( isset($_POST['development']) ):
                    add_option( "less-wordpress-development", true );
                    delete_option("less-wordpress-production");
                    delete_option("less-wordpress-production-minify");
                elseif ( isset($_POST['production'] ) ):
                    add_option( "less-wordpress-production", true );
                    add_option( "less-wordpress-production-minify", isset($_POST['minify']) );
                    delete_option( "less-wordpress-development" );
                endif;
            endif;
        ?>
    </div>
<? }