<?php
/*  Copyright 2012  Shubham Sachdeva  (email : shubham.sachdeva@limesurvey.org)

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
/**
 Author: Shubham Sachdeva
 Plugin Name: SurveyPress
 Plugin URI: http://wordpress.org/extend/plugins/surveypress/
 Description: <strong>LimeSurvey + WordPress = A perfect combination of blog fully capable of managing surveys</strong>. Using this plugin, you can integrate LimeSurvey with WordPress to make registered users take surveys. Allow them to make their own survey(s) and so on.
 Version: 1.0.9
 Author URI: http://sachdevashubham.blogspot.com/
 License: GPLv2
 */

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
    echo _e("Hi there!  I'm just a plugin, not much I can do when called directly.");
	exit;
}


define('_PLUGIN_NAME_', 'SurveyPress');
define('_PLUGIN_VERSION_', '1.0.9!');
define('_PLUGIN_URL_', plugin_dir_url( __FILE__ ));

/**
 * Global variables assosciated with config screen
 */

// variables for the top menu content. 
$db_option_name   = 'db_name';
$db_option_user   = 'db_user';
$db_option_host   = 'db_host';
$db_option_pwd    = 'db_pwd';
$db_option_prefix = 'db_prefix';
$db_option_url    = 'ls_base_url';

// respective values from database.
// Read in existing option value from database
$db_value_name   = get_option( $db_option_name );
$db_value_user   = get_option( $db_option_user );
$db_value_host   = get_option( $db_option_host );
$db_value_pwd    = get_option( $db_option_pwd );
$db_value_prefix = get_option( $db_option_prefix );
$db_value_url    = get_option( $db_option_url );


/**
 * Global variables assosciated with option screen
 */

// variables for the option menu content. 
$apply_option_default_permissions = 'apply_default_permissions';
$show_option_survey_notification  = 'show_survey_notification';
$show_option_import_users         = 'import_users';
$same_option_password             = 'same_password';
$list_option_public_surveys       = 'list_public_survey_only';
// respective values from database.
// Read in existing option value from database
if ( get_option( $apply_option_default_permissions ) == '' ) 
{
    $apply_value_default_permissions = 1;
}
else
{
    $apply_value_default_permissions = (int) get_option( $apply_option_default_permissions );
}

if ( get_option( $show_option_survey_notification ) == '' ) 
{
    $show_value_survey_notification = 1;
}
else
{
    $show_value_survey_notification = (int) get_option( $show_option_survey_notification );
}

if ( get_option( $show_option_import_users ) == '' ) 
{
    $show_value_import_users = 1;
}
else
{
    $show_value_import_users = (int) get_option( $show_option_import_users );
}

if ( get_option( $same_option_password ) == '' ) 
{
    $same_value_password = 1;
}
else
{
    $same_value_password = (int) get_option( $same_option_password );
}

if ( get_option( $list_option_public_surveys ) == '' ) 
{
    $list_value_public_surveys = 1;
}
else
{
    $list_value_public_surveys = (int) get_option( $list_option_public_surveys );
}

/**
 * Global variables assosciated with mapping screen
 */


// Read in existing mapping value from database
$map_role_subscriber_create_survey   = (int) get_option( 'map_role_subscriber_create_survey' );
$map_role_subscriber_config          = (int) get_option( 'map_role_subscriber_config' );
$map_role_subscriber_create_user     = (int) get_option( 'map_role_subscriber_create_user' );
$map_role_subscriber_del_user        = (int) get_option( 'map_role_subscriber_del_user' );
$map_role_subscriber_manage_template = (int) get_option( 'map_role_subscriber_manage_template' );
$map_role_subscriber_manage_label    = (int) get_option( 'map_role_subscriber_manage_label' );

$map_role_administrator_create_survey   = (int) get_option( 'map_role_administrator_create_survey' );
$map_role_administrator_config          = (int) get_option( 'map_role_administrator_config' );
$map_role_administrator_create_user     = (int) get_option( 'map_role_administrator_create_user' );
$map_role_administrator_del_user        = (int) get_option( 'map_role_administrator_del_user' );
$map_role_administrator_manage_template = (int) get_option( 'map_role_administrator_manage_template' );
$map_role_administrator_manage_label    = (int) get_option( 'map_role_administrator_manage_label' );

$map_role_editor_create_survey   = (int) get_option( 'map_role_editor_create_survey' );
$map_role_editorr_config          = (int) get_option( 'map_role_editor_config' );
$map_role_editor_create_user     = (int) get_option( 'map_role_editor_create_user' );
$map_role_editor_del_user        = (int) get_option( 'map_role_editor_del_user' );
$map_role_editor_manage_template = (int) get_option( 'map_role_editor_manage_template' );
$map_role_editor_manage_label    = (int) get_option( 'map_role_editor_manage_label' );

$map_role_author_create_survey   = (int) get_option( 'map_role_author_create_survey' );
$map_role_author_config          = (int) get_option( 'map_role_author_config' );
$map_role_author_create_user     = (int) get_option( 'map_role_author_create_user' );
$map_role_author_del_user        = (int) get_option( 'map_role_author_del_user' );
$map_role_author_manage_template = (int) get_option( 'map_role_author_manage_template' );
$map_role_author_manage_label    = (int) get_option( 'map_role_author_manage_label' );

$map_role_contributor_create_survey   = (int) get_option( 'map_role_contributor_create_survey' );
$map_role_contributor_config          = (int) get_option( 'map_role_contributor_config' );
$map_role_contributor_create_user     = (int) get_option( 'map_role_contributor_create_user' );
$map_role_contributor_del_user        = (int) get_option( 'map_role_contributor_del_user' );
$map_role_contributor_manage_template = (int) get_option( 'map_role_contributor_manage_template' );
$map_role_contributor_manage_label    = (int) get_option( 'map_role_contributor_manage_label' );

/**
 * Global LimeSurvey database connection variables.
 */
 $lsdb                     = new wpdb( $db_value_user, $db_value_pwd, $db_value_name, $db_value_host );
 $db_connection_error_name = "db_connection_error";
 $db_connection_error      = get_option( $db_connection_error_name );

/**
 * Bridge_WP_LS
 * 
 * @package SurveyPress  
 * @author Shubham Sachdeva
 * @copyright 2012
 * @version 1.0.9
 * @access public
 */
class Bridge_WP_LS {
    
    // an - a unique identifier!
    /**
     * Bridge_WP_LS::an_add_menus()
     * adds menu to the dashboard of users/admin.
     * @return
     */
    function an_add_menus()  
    {
        global $show_value_survey_notification;
        $permission = '';
        if ((int)$show_value_survey_notification == 1)
        {
            $permission = 'read';
        }
        else
        {
            $permission = 'manage_options';
        }
        
        // Add a new top-level menu:
        $hook_suffix_top_menu = add_menu_page(__('Bridge WP LS plugin','menu-test'), __('SurveyPress','menu-test'), $permission, 'an-survey-config', array('Bridge_WP_LS', 'an_add_config_menu'));
        
        // Add hook for action executed when plugin's options page is loaded
        add_action( 'load-' . $hook_suffix_top_menu , array('Bridge_WP_LS','an_top_menu_loaded') );
        
        // Add a submenu to the custom top-level menu:
        //add_submenu_page('an-survey', __('Configure this plugin','menu-test'), __('Configuration','menu-test'), 'manage_options', 'an-bridge-config', array('bridge_wp_ls', 'an_add_menu_1'));
    
        // Add a second submenu to the custom top-level menu:
        $hook_suffix_top_menu = add_submenu_page('an-survey-config', __('Bridge WP LS plugin','menu-test'), __('Configuration','menu-test'), $permission, 'an-survey-config');
        
        // Add hook for action executed when plugin's options page is loaded
        add_action( 'load-' . $hook_suffix_top_menu , array('Bridge_WP_LS','an_top_menu_loaded') );
        
        // Add a second submenu to the custom top-level menu:
        add_submenu_page('an-survey-config', __('Map the roles and user permissions','menu-test'), __('Mapping','menu-test'), 'manage_options', 'an-bridge-map',array('Bridge_WP_LS', 'an_add_menu_mapping'));
        
        // Add a submenu to the custom top-level menu:
        add_submenu_page('an-survey-config', __('Customize','menu-test'), __('Customize','menu-test'), 'manage_options', 'an-bridge-opt', array('Bridge_WP_LS', 'an_add_menu_options'));
    
        
    }
    
    // an_add_top_menu() displays the page content for the custom Test Toplevel menu
    /**
     * Bridge_WP_LS::an_add_config_menu()
     * adds configuration page. It displays configuration options pertaining to LimeSurvey.
     * @return
     */
    function an_add_config_menu() 
    {
        include 'view/config-menu.php';        
    }
    
    // an_add_menu_mapping() displays the page content for the first submenu
    // of the custom Test Toplevel menu
    /**
     * Bridge_WP_LS::an_add_menu_mapping()
     * adds mapping page. It displays the mapping options between user permissions of LS and capabilities of WP.
     * @return
     */
    function an_add_menu_mapping() 
    {
        if (!current_user_can('manage_options')) 
        { 
		  wp_die( __('You do not have sufficient permissions to access this page.') );
        }
        include 'view/mapping-menu.php';
    }
    
    // an_add_menu_options() displays the page content for the second submenu
    // of the custom Test Toplevel menu
    /**
     * Bridge_WP_LS::an_add_menu_options()
     * adds Options page. It displays some plugin options, some customization options to admin which control the bahaviour of this plugin.
     * @return
     */
    function an_add_menu_options() 
    {
        if (!current_user_can('manage_options')) 
        { 
		  wp_die( __('You do not have sufficient permissions to access this page.') );
        }
        include 'view/option-menu.php'; 
    }
    
    //called when top lovele menu has been loaded!
    /**
     * Bridge_WP_LS::an_top_menu_loaded()
     * It removes the admin notice of "plugin not being configured" when it's plugin configuraytion page.
     * @return
     */
    function an_top_menu_loaded()
    {
        
        // Current page is options page for our plugin, so do not display notice
    	// (remove hook responsible for this)
    	remove_action( 'admin_notices', array( 'Bridge_WP_LS', 'an_add_admin_notice' ) );
    }
    
    
    //this function will output proper notice on administration panel
    /**
     * Bridge_WP_LS::an_add_admin_notice()
     * It displays the admin notice of "plugin not being configired" on every admin page. To remove the admin notice on some specific page, modify an_top_menu_loaded()
     * @return
     */
    function an_add_admin_notice()
    {
        if (!current_user_can('manage_options')) 
        { 
		  return ;
        }
        
        $wpurl = get_bloginfo( 'wpurl' );
        $pluginurl = $wpurl.'/wp-admin/admin.php?page=an-survey-config'
        
?>
        <div id='notice' class='updated fade'><p>
<?php
        echo _e("You haven't configured '<strong><a href='".$pluginurl."' title='SurveyPress' >"._PLUGIN_NAME_."</a></strong>' plugin properly!"); 
?>
        </p></div>
<?php
              
    }
    
    /**
     * Bridge_WP_LS::an_insert_into_ls()
     * This function import the users from WP to LS.
     * @return
     */
    function an_insert_into_ls( $username, $password )
    {
        //global $wpdb,$db_option_user,$db_option_host,$db_option_pwd,$db_option_name;
        global $db_value_host,$db_value_name,$db_value_pwd,$db_value_user,$db_value_prefix,$lsdb;
        
        global $apply_value_default_permissions,$same_value_password;
        
        $userinfo = get_user_by( 'login', $username );
        //$lsdb = new wpdb( $db_value_user, $db_value_pwd, $db_value_name, $db_value_host );
        //switch on sql error is any!
        $lsdb->show_errors();
        // information required to add users to lsdb
        // 1. parent ID
        // 2. full name
        // 3. username
        // 4. password (hashed!)
        // 5. email of user
        // 6. dbprefix of LS
        
        //parent ID (by default - 0(admin)!)
             
        require_once dirname( __FILE__ ) . '/sha256.php';
        $adminusername = 'admin';
        $pwd = SHA256::hashing($password);
        
        
        // Verify whether this record is in LS database or not.
        $rows = $lsdb->query( $lsdb->prepare( "SELECT * FROM ".$db_value_prefix."users WHERE users_name = %s AND password = %s", $username, $pwd ) );
        
        if( $rows === 1 )
        {
            //no need to update, entry already exist there!
            return TRUE;
        }
        else
        {
             
            if ( $rows === FALSE )
            {
                //echo "Query failed!";
                return FALSE;
            }
            else
            {
                //password has changed in wp, update it in LS or user doesn't yet exist!
                $rows = $lsdb->query( $lsdb->prepare( "SELECT uid FROM ".$db_value_prefix."users WHERE users_name = %s", $username ) );
                
                if ( $rows === 0 )
                {
                    //insert query!
                    
                    
                    $puid = $lsdb->get_var( "SELECT uid FROM ".$db_value_prefix."users WHERE users_name = '".$adminusername."'" );
                    //echo $userinfo->user_login."--".$userinfo->user_firstname." ".$userinfo->user_lastname."--".$userinfo->user_email."--".$puid;
                    //exit();
                    
                    if ( ((int)$apply_value_default_permissions) == 1 )
                    {
                        $create_survey    = 0 ;
                        $configurator     = 0 ;
                        $create_user      = 0 ;
                        $del_user         = 0 ;
                        $manage_templates = 0 ;
                        $manage_labels    = 0 ;
                    }
                    else
                    {
                        if ( !empty( $userinfo->roles ) && is_array( $userinfo->roles ) ) {
                        	/*
                            foreach ( $userinfo->roles as $role )
                        		echo $role;
                            */
                            $role = $userinfo->roles[0];
                        } //end inner if
                        
                        switch ( $role )
                        {
                            case "administrator" :
                                
                                global $map_role_administrator_config,$map_role_administrator_create_survey,$map_role_administrator_del_user;
                                global $map_role_administrator_manage_label,$map_role_administrator_manage_template,$map_role_administrator_create_user;
                                
                                $create_survey    = $map_role_administrator_create_survey;
                                $configurator     = $map_role_administrator_config;
                                $create_user      = $map_role_administrator_create_user;
                                $del_user         = $map_role_administrator_del_user;
                                $manage_templates = $map_role_administrator_manage_template;
                                $manage_labels    = $map_role_administrator_manage_label;
                                
                                break;
                            case "editor" :
                                
                                global $map_role_editor_config,$map_role_editor_create_survey,$map_role_editor_del_user;
                                global $map_role_editor_manage_label,$map_role_editor_manage_template,$map_role_editor_create_user;
                                
                                $create_survey    = $map_role_editor_create_survey;
                                $configurator     = $map_role_editor_config;
                                $create_user      = $map_role_editor_create_user;
                                $del_user         = $map_role_editor_del_user;
                                $manage_templates = $map_role_editor_manage_template;
                                $manage_labels    = $map_role_editor_manage_label;
                                
                                break;
                            case "author" :
                                
                                global $map_role_author_config,$map_role_author_create_survey,$map_role_author_del_user;
                                global $map_role_author_manage_label,$map_role_author_manage_template,$map_role_author_create_user;
                                
                                $create_survey    = $map_role_author_create_survey;
                                $configurator     = $map_role_author_config;
                                $create_user      = $map_role_author_create_user;
                                $del_user         = $map_role_author_del_user;
                                $manage_templates = $map_role_author_manage_template;
                                $manage_labels    = $map_role_author_manage_label;
                                
                                break;
                            case "contributor" :
                                
                                global $map_role_contributor_config,$map_role_contributor_create_survey,$map_role_contributor_del_user;
                                global $map_role_contributor_manage_label,$map_role_contributor_manage_template,$map_role_contributor_create_user;
                                
                                $create_survey    = $map_role_contributor_create_survey;
                                $configurator     = $map_role_contributor_config;
                                $create_user      = $map_role_contributor_create_user;
                                $del_user         = $map_role_contributor_del_user;
                                $manage_templates = $map_role_contributor_manage_template;
                                $manage_labels    = $map_role_contributor_manage_label;
                                
                                break;
                            case "subscriber" :
                                
                                global $map_role_subscriber_config,$map_role_subscriber_create_survey,$map_role_subscriber_del_user;
                                global $map_role_subscriber_manage_label,$map_role_subscriber_manage_template,$map_role_subscriber_create_user;
                                
                                $create_survey    = $map_role_subscriber_create_survey;
                                $configurator     = $map_role_subscriber_config;
                                $create_user      = $map_role_subscriber_create_user;
                                $del_user         = $map_role_subscriber_del_user;
                                $manage_templates = $map_role_subscriber_manage_template;
                                $manage_labels    = $map_role_subscriber_manage_label;
                                
                                break;
                        } //end switch
                        
                    } ///end outer if-else
                    
                    $success = $lsdb->insert( 
                    	$db_value_prefix.'users', 
                    	array( 
                    		'users_name' => $userinfo->user_login, 
                    		'password' => $pwd,
                            'full_name' => $userinfo->user_firstname.' '.$userinfo->user_lastname, 
                    		'parent_id' => $puid,
                            'lang' => 'auto', 
                    		'email' => $userinfo->user_email,
                            'create_survey' => $create_survey, 
                    		'create_user' => $create_user,
                    		'delete_user' => $del_user,
                            'superadmin' => 0, 
                    		'configurator' => $configurator,
                            'manage_template' => $manage_templates, 
                    		'manage_label' => $manage_labels
                    	),
                    	array( 
                    		'%s', 
                    		'%s',
                            '%s', 
                    		'%d',
                            '%s', 
                    		'%s',
                            '%d',
                            '%d',
                            '%d',
                            '%d',
                            '%d',
                            '%d',
                            '%d',
                            '%d'
                    	) 
                    );
                    
                    if ( $success )
                    {
                        $uid = $lsdb->insert_id;
                        return $lsdb->insert( 
                                $db_value_prefix.'templates_rights', 
                            	array( 
                            		'uid' => $uid, 
                            		'folder' => 'default',
                                    'use' => 1 
                            	),
                            	array( 
                            		'%d', 
                            		'%s',
                                    '%d'
                            	) 
                        );
                    }
                    else
                    {
                        return FALSE;
                    }
                    
                    
                    
                    //echo "inserting query!";
                    //return TRUE;
                }
                else
                {
                    
                    //TODO: Is this the required behaviour?
                    if ( ((int)$same_value_password) == 1 )
                    {
                        //passwords can be different, so no need to update LS password!
                        return TRUE;
                    }
                    //No! password should be same and it should be WP password, let's update it.
                    if ( $rows === 1 && ( ((int)$same_value_password) == 0 ) )
                    {
                        
                        //update query
                        //BLACKLIST : admin
                        if ( strcmp($username,'admin') == 0 )
                        {
                            return TRUE;
                        }
                        return $lsdb->update( 
                                $db_value_prefix.'users', 
                                array( 
                                    'password' => $pwd
                                ),
                                array(
                                    'users_name' => $userinfo->user_login
                                ),
                               	array( 
                                    '%s'
                                ),
                                array( 
                                    '%s'
                                ) 
                        );
                        
                        //echo "updatng query!";
                        //return TRUE;
                        
                    }
                    else
                    {
                        //echo "query failed!";
                        return FALSE;
                    }
                }
                
            }
        }
        
        
    }
    
    /**
     * Bridge_WP_LS::an_check_user_authentication()
     * This function first authenticate user, then call an_insert_into_ls() to import the user from WP to LS.
     * @return
     */
    function an_check_user_authentication( $username ) {
        
        global $db_connection_error, $show_value_import_users;
        
        
        if ( $db_connection_error == TRUE || $show_value_import_users == 0 ) {
            return;
        }
        $username = sanitize_user($username);
        
     	if(!username_exists($username)) {
            return;
        }
        //TODO: sanitize it!
        $postpwd = $_POST['pwd'];
        $postpwd = trim( $postpwd );
        
        
        $userinfo = wp_authenticate( $username, $postpwd );
        
        if ( is_wp_error( $userinfo ) )
        {
            echo $userinfo->get_error_message();
            return FALSE;
            
        }
           
        
        if ( ! self::an_insert_into_ls( $username, $postpwd ) )
        {        
            echo "unable to update records in ls table with given credentials!";
            exit();
        }

    }
    
    
    
    
}


/**
 * Hooks
 */
// hook to display config,options,mapping pages at admin/user dashboard!
add_action('admin_menu', array('Bridge_WP_LS', 'an_add_menus'));

//hook to import users from WP to LS.
add_action('wp_authenticate',array('Bridge_WP_LS','an_check_user_authentication'));


/*
  Admin Notice Hooks
 */ 
// add admin notice if any of the configration field is empty or not set!
//TODO: Pass argument and make the notice more specific as to which field is to be filled!
if ( get_option( $db_option_host ) == '' )
{
    add_action( 'admin_notices', array('Bridge_WP_LS', 'an_add_admin_notice'));
}

if ( get_option( $db_option_name ) == '' )
{
    add_action( 'admin_notices', array('Bridge_WP_LS', 'an_add_admin_notice')); 
}

if ( get_option( $db_option_user ) == '' )
{
    add_action( 'admin_notices', array('Bridge_WP_LS', 'an_add_admin_notice')); 
}

if ( get_option( $db_option_pwd ) == '' )
{
    add_action( 'admin_notices', array('Bridge_WP_LS', 'an_add_admin_notice')); 
}

if ( get_option( $db_option_prefix ) == '' )
{
    add_action( 'admin_notices', array('Bridge_WP_LS', 'an_add_admin_notice')); 
}

if ( get_option( $db_option_url ) == '' )
{
    add_action( 'admin_notices', array('Bridge_WP_LS', 'an_add_admin_notice')); 
}


?>