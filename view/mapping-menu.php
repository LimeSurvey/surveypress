<?php

/**
 * @author Shubham Sachdeva
 * @copyright 2012
 */
 
//global variables
global $map_role_subscriber_create_survey,$map_role_subscriber_config,$map_role_subscriber_create_user,$map_role_subscriber_del_user,$map_role_subscriber_manage_template,$map_role_subscriber_manage_label;
global $map_role_administrator_create_survey,$map_role_administrator_config,$map_role_administrator_create_user,$map_role_administrator_del_user,$map_role_administrator_manage_template,$map_role_administrator_manage_label;
global $map_role_editor_create_survey,$map_role_editor_config,$map_role_editor_create_user,$map_role_editor_del_user,$map_role_editor_manage_template,$map_role_editor_manage_label;
global $map_role_author_create_survey,$map_role_author_config,$map_role_author_create_user,$map_role_author_del_user,$map_role_author_manage_template,$map_role_author_manage_label;
global $map_role_contributor_create_survey,$map_role_contributor_config,$map_role_contributor_create_user,$map_role_contributor_del_user,$map_role_contributor_manage_template,$map_role_contributor_manage_label;

//output the heading.
?>


<div class='wrap'>
    <div id='icon-options-general' class='icon32'>
        <br/>
    </div>
    <h2><?php echo __( 'Mapping', 'menu-test' ); ?></h2><br />
    
    <?php       
            
    $hidden_field_name = 'mapping_form_submit_hidden';
    //$db_field_name = 'mt_favorite_color';

    //process some data of the form
    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
        if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) 
        {
                            
            // Read the posted values
            $map_role_subscriber_create_survey   = (int) ( isset($_POST['map_role_subscriber_create_survey']) )   ? ( $_POST['map_role_subscriber_create_survey'] )   : ( 0 );
            $map_role_subscriber_config          = (int) ( isset($_POST['map_role_subscriber_config']) )          ? ( $_POST['map_role_subscriber_config'] )          : ( 0 );
            $map_role_subscriber_create_user     = (int) ( isset($_POST['map_role_subscriber_create_user']) )     ? ( $_POST['map_role_subscriber_create_user'] )     : ( 0 );
            $map_role_subscriber_del_user        = (int) ( isset($_POST['map_role_subscriber_del_user']) )        ? ( $_POST['map_role_subscriber_del_user'] )        : ( 0 );
            $map_role_subscriber_manage_template = (int) ( isset($_POST['map_role_subscriber_manage_template']) ) ? ( $_POST['map_role_subscriber_manage_template'] ) : ( 0 );
            $map_role_subscriber_manage_label    = (int) ( isset($_POST['map_role_subscriber_manage_template']) ) ? ( $_POST['map_role_subscriber_manage_label'] )    : ( 0 );
            
            $map_role_administrator_create_survey   = (int) ( isset($_POST['map_role_administrator_create_survey']) )   ? ( $_POST['map_role_administrator_create_survey'] )   : ( 0 );
            $map_role_administrator_config          = (int) ( isset($_POST['map_role_administrator_config']) )          ? ( $_POST['map_role_administrator_config'] )          : ( 0 );
            $map_role_administrator_create_user     = (int) ( isset($_POST['map_role_administrator_create_user']) )     ? ( $_POST['map_role_administrator_create_user'] )     : ( 0 );
            $map_role_administrator_del_user        = (int) ( isset($_POST['map_role_administrator_del_user']) )        ? ( $_POST['map_role_administrator_del_user'] )        : ( 0 );
            $map_role_administrator_manage_template = (int) ( isset($_POST['map_role_administrator_manage_template']) ) ? ( $_POST['map_role_administrator_manage_template'] ) : ( 0 );
            $map_role_administrator_manage_label    = (int) ( isset($_POST['map_role_administrator_manage_label']) )    ? ( $_POST['map_role_administrator_manage_label'] )    : ( 0 );
            
            $map_role_editor_create_survey   = (int) ( isset($_POST['map_role_editor_create_survey']) )   ? ( $_POST['map_role_editor_create_survey'] )   : ( 0 );
            $map_role_editor_config          = (int) ( isset($_POST['map_role_editor_config']) )          ? ( $_POST['map_role_editor_config'] )          : ( 0 );
            $map_role_editor_create_user     = (int) ( isset($_POST['map_role_editor_create_user']) )     ? ( $_POST['map_role_editor_create_user'] )     : ( 0 );
            $map_role_editor_del_user        = (int) ( isset($_POST['map_role_editor_del_user']) )        ? ( $_POST['map_role_editor_del_user'] )        : ( 0 );
            $map_role_editor_manage_template = (int) ( isset($_POST['map_role_editor_manage_template']) ) ? ( $_POST['map_role_editor_manage_template'] ) : ( 0 );
            $map_role_editor_manage_label    = (int) ( isset($_POST['map_role_editor_manage_label']) )    ? ( $_POST['map_role_editor_manage_label'] )    : ( 0 );
            
            $map_role_author_create_survey   = (int) ( isset($_POST['map_role_author_create_survey']) )   ? ( $_POST['map_role_author_create_survey'] )   : ( 0 );
            $map_role_author_config          = (int) ( isset($_POST['map_role_author_config']) )          ? ( $_POST['map_role_author_config'] )          : ( 0 );
            $map_role_author_create_user     = (int) ( isset($_POST['map_role_author_create_user']) )     ? ( $_POST['map_role_author_create_user'] )     : ( 0 );
            $map_role_author_del_user        = (int) ( isset($_POST['map_role_author_del_user']) )        ? ( $_POST['map_role_author_del_user'] )        : ( 0 );
            $map_role_author_manage_template = (int) ( isset($_POST['map_role_author_manage_template']) ) ? ( $_POST['map_role_author_manage_template'] ) : ( 0 );
            $map_role_author_manage_label    = (int) ( isset($_POST['map_role_author_manage_label']) )    ? ( $_POST['map_role_author_manage_label'] )    : ( 0 );
            
            $map_role_contributor_create_survey   = (int) ( isset($_POST['map_role_contributor_create_survey']) )   ? ( $_POST['map_role_contributor_create_survey'] )   : ( 0 );
            $map_role_contributor_config          = (int) ( isset($_POST['map_role_contributor_config']) )          ? ( $_POST['map_role_contributor_config'] )          : ( 0 );
            $map_role_contributor_create_user     = (int) ( isset($_POST['map_role_contributor_create_user']) )     ? ( $_POST['map_role_contributor_create_user'] )     : ( 0 );
            $map_role_contributor_del_user        = (int) ( isset($_POST['map_role_contributor_del_user']) )        ? ( $_POST['map_role_contributor_del_user'] )        : ( 0 );
            $map_role_contributor_manage_template = (int) ( isset($_POST['map_role_contributor_manage_template']) ) ? ( $_POST['map_role_contributor_manage_template'] ) : ( 0 );
            $map_role_contributor_manage_label    = (int) ( isset($_POST['map_role_contributor_manage_label']) )    ? ( $_POST['map_role_contributor_manage_label'] )    : ( 0 );
                
        
            // Save the posted values in the database
            update_option( 'map_role_subscriber_create_survey', $map_role_subscriber_create_survey );
            update_option( 'map_role_subscriber_config', $map_role_subscriber_config );
            update_option( 'map_role_subscriber_create_user', $map_role_subscriber_create_user );
            update_option( 'map_role_subscriber_del_user', $map_role_subscriber_del_user );
            update_option( 'map_role_subscriber_manage_template', $map_role_subscriber_manage_template );
            update_option( 'map_role_subscriber_manage_label', $map_role_subscriber_manage_label );  
            
            update_option( 'map_role_administrator_create_survey', $map_role_administrator_create_survey );
            update_option( 'map_role_administrator_config', $map_role_administrator_config );
            update_option( 'map_role_administrator_create_user', $map_role_administrator_create_user );
            update_option( 'map_role_administrator_del_user', $map_role_administrator_del_user );
            update_option( 'map_role_administrator_manage_template', $map_role_administrator_manage_template );
            update_option( 'map_role_administrator_manage_label', $map_role_administrator_manage_label );
            
            update_option( 'map_role_editor_create_survey', $map_role_editor_create_survey );
            update_option( 'map_role_editor_config', $map_role_editor_config );
            update_option( 'map_role_editor_create_user', $map_role_editor_create_user );
            update_option( 'map_role_editor_del_user', $map_role_editor_del_user );
            update_option( 'map_role_editor_manage_template', $map_role_editor_manage_template );
            update_option( 'map_role_editor_manage_label', $map_role_editor_manage_label );
            
            update_option( 'map_role_author_create_survey', $map_role_author_create_survey );
            update_option( 'map_role_author_config', $map_role_author_config );
            update_option( 'map_role_author_create_user', $map_role_author_create_user );
            update_option( 'map_role_author_del_user', $map_role_author_del_user );
            update_option( 'map_role_author_manage_template', $map_role_author_manage_template );
            update_option( 'map_role_author_manage_label', $map_role_author_manage_label );
            
            update_option( 'map_role_contributor_create_survey', $map_role_contributor_create_survey );
            update_option( 'map_role_contributor_config', $map_role_contributor_config );
            update_option( 'map_role_contributor_create_user', $map_role_contributor_create_user );
            update_option( 'map_role_contributor_del_user', $map_role_contributor_del_user );
            update_option( 'map_role_contributor_manage_template', $map_role_contributor_manage_template );
            update_option( 'map_role_contributor_manage_label', $map_role_contributor_manage_label );          
        
            // Put an settings updated message on the screen

            ?>
            
            <div class='updated'>
                <p><strong><?php _e('Settings saved.', 'menu-test' ); ?></strong></p>
            </div>
            
        <?php

        }
            
        //setting form here
        ?>               

        <p><?php _e("Map the role of users in WP to the appropriate user/template permissions in LS: "); ?></p>
                        
        <form name="an_mapping_form2" method="post" action="">
        <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y" />
            
        <table class="form-table">
        
        <tr valign="top">
        <th scope="row">
        &nbsp;
        </th>
        <th scope="row">
        <strong><?php _e("Create survey", 'menu-test' ); ?></strong>
        </th>
        <th>
        <strong><?php _e("Configurator", 'menu-test' ); ?></strong>
        </th>
        <th>
        <strong><?php _e("Create user", 'menu-test' ); ?></strong>
        </th>
        <th>
        <strong><?php _e("Delete user", 'menu-test' ); ?></strong>
        </th>
        <th>
        <strong><?php _e("Use all/manage templates", 'menu-test' ); ?></strong>
        </th>
        <th>
        <strong><?php _e("Manage labels", 'menu-test' ); ?></strong>
        </th>
        </tr>
            
        <tr valign="top">
        <th scope="row">
        <strong><?php _e("Subscriber", 'menu-test' ); ?></strong>
        </th>
        <td>
        <input type="checkbox" name="map_role_subscriber_create_survey" value="1" <?php if((int)$map_role_subscriber_create_survey) { ?> checked="checked" <?php } ?> />
        </td>
        <td>
        <input type="checkbox" name="map_role_subscriber_config" value="1" <?php if((int)$map_role_subscriber_config) { ?> checked="checked" <?php } ?> />
        </td>
        <td>
        <input type="checkbox" name="map_role_subscriber_create_user" value="1" <?php if((int)$map_role_subscriber_create_user) { ?> checked="checked" <?php } ?> />
        </td>
        <td>
        <input type="checkbox" name="map_role_subscriber_del_user" value="1" <?php if((int)$map_role_subscriber_del_user) { ?> checked="checked" <?php } ?> />
        </td>
        <td>
        <input type="checkbox" name="map_role_subscriber_manage_template" value="1" <?php if((int)$map_role_subscriber_manage_template) { ?> checked="checked" <?php } ?> />
        </td>
        <td>
        <input type="checkbox" name="map_role_subscriber_manage_label" value="1" <?php if((int)$map_role_subscriber_manage_label) { ?> checked="checked" <?php } ?> />
        </td>
        </tr>
            
        <tr valign="top">
        <th scope="row">
        <strong><?php _e("Administrator", 'menu-test' ); ?></strong>
        </th>
        <td>
        <input type="checkbox" name="map_role_administrator_create_survey" value="1" <?php if((int)$map_role_administrator_create_survey) { ?> checked="checked" <?php } ?> />
        </td>
        <td>
        <input type="checkbox" name="map_role_administrator_config" value="1" <?php if((int)$map_role_administrator_config) { ?> checked="checked" <?php } ?> />
        </td>
        <td>
        <input type="checkbox" name="map_role_administrator_create_user" value="1" <?php if((int)$map_role_administrator_create_user) { ?> checked="checked" <?php } ?> />
        </td>
        <td>
        <input type="checkbox" name="map_role_administrator_del_user" value="1" <?php if((int)$map_role_administrator_del_user) { ?> checked="checked" <?php } ?> />
        </td>
        <td>
        <input type="checkbox" name="map_role_administrator_manage_template" value="1" <?php if((int)$map_role_administrator_manage_template) { ?> checked="checked" <?php } ?> />
        </td>
        <td>
        <input type="checkbox" name="map_role_administrator_manage_label" value="1" <?php if((int)$map_role_administrator_manage_label) { ?> checked="checked" <?php } ?> />
        </td>
        </tr>
            
        <tr valign="top">
        <th scope="row">
        <strong><?php _e("Editor", 'menu-test' ); ?></strong>
        </th>
        <td>
        <input type="checkbox" name="map_role_editor_create_survey" value="1" <?php if((int)$map_role_editor_create_survey) { ?> checked="checked" <?php } ?> />
        </td>
        <td>
        <input type="checkbox" name="map_role_editor_config" value="0" <?php if((int)$map_role_editor_config) { ?> checked="checked" <?php } ?> />
        </td>
        <td>
        <input type="checkbox" name="map_role_editor_create_user" value="1" <?php if((int)$map_role_editor_create_user) { ?> checked="checked" <?php } ?> />
        </td>
        <td>
        <input type="checkbox" name="map_role_editor_del_user" value="1" <?php if((int)$map_role_editor_del_user) { ?> checked="checked" <?php } ?> />
        </td>
        <td>
        <input type="checkbox" name="map_role_editor_manage_template" value="1" <?php if((int)$map_role_editor_manage_template) { ?> checked="checked" <?php } ?> />
        </td>
        <td>
        <input type="checkbox" name="map_role_editor_manage_label" value="1" <?php if((int)$map_role_editor_manage_label) { ?> checked="checked" <?php } ?> />
        </td>
        </tr>
        
        <tr valign="top">
        <th scope="row">
        <strong><?php _e("Author", 'menu-test' ); ?></strong>
        </th>
        <td>
        <input type="checkbox" name="map_role_author_create_survey" value="1" <?php if((int)$map_role_author_create_survey) { ?> checked="checked" <?php } ?> />
        </td>
        <td>
        <input type="checkbox" name="map_role_author_config" value="1" <?php if((int)$map_role_author_config) { ?> checked="checked" <?php } ?> />
        </td>
        <td>
        <input type="checkbox" name="map_role_author_create_user" value="1" <?php if((int)$map_role_author_create_user) { ?> checked="checked" <?php } ?> />
        </td>
        <td>
        <input type="checkbox" name="map_role_author_del_user" value="1" <?php if((int)$map_role_author_del_user) { ?> checked="checked" <?php } ?> />
        </td>
        <td>
        <input type="checkbox" name="map_role_author_manage_template" value="1" <?php if((int)$map_role_author_manage_template) { ?> checked="checked" <?php } ?> />
        </td>
        <td>
        <input type="checkbox" name="map_role_author_manage_label" value="1" <?php if((int)$map_role_author_manage_label) { ?> checked="checked" <?php } ?> />
        </td>
        </tr>
        
        <tr valign="top">
        <th scope="row">
        <strong><?php _e("Contributor", 'menu-test' ); ?></strong>
        </th>
        <td>
        <input type="checkbox" name="map_role_contributor_create_survey" value="1" <?php if((int)$map_role_contributor_create_survey) { ?> checked="checked" <?php } ?> />
        </td>
        <td>
        <input type="checkbox" name="map_role_contributor_config" value="1" <?php if((int)$map_role_contributor_config) { ?> checked="checked" <?php } ?> />
        </td>
        <td>
        <input type="checkbox" name="map_role_contributor_create_user" value="1" <?php if((int)$map_role_contributor_create_user) { ?> checked="checked" <?php } ?> />
        </td>
        <td>
        <input type="checkbox" name="map_role_contributor_del_user" value="1" <?php if((int)$map_role_contributor_del_user) { ?> checked="checked" <?php } ?> />
        </td>
        <td>
        <input type="checkbox" name="map_role_contributor_manage_template" value="1" <?php if((int)$map_role_contributor_manage_template) { ?> checked="checked" <?php } ?> />
        </td>
        <td>
        <input type="checkbox" name="map_role_contributor_manage_label" value="1" <?php if((int)$map_role_contributor_manage_label) { ?> checked="checked" <?php } ?> />
        </td>
        </tr>
                        
        
        <tr>
        <td colspan="7"><br /><span class="description"><strong>NOTE</strong>: Once configured, these settings will be effective to users who login for the first time after this plugin was activated! Permission of users who login between the time,this plugin was activated, and the time, this plugin is configured properly as per requirement, need to be set separately at LS admin-end. </span></td>
        </tr>
          
        </table>
            
        <p class="submit">
        <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
        </p>
            
        </form>
            
</div>