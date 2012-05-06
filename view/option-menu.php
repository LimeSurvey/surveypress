<?php

/**
 * @author Shubham Sachdeva
 * @copyright 2012
 */
 
//global variables
global $apply_option_default_permissions,$show_option_survey_notification,$show_option_import_users,$same_option_password,$list_option_public_surveys;
global $apply_value_default_permissions,$show_value_survey_notification,$show_value_import_users,$same_value_password,$list_value_public_surveys;
global $db_value_prefix;
global $lsdb;

//output the heading.
?>


<div class='wrap'>
    <div id='icon-options-general' class='icon32'>
        <br/>
    </div>
    <h2><?php echo __( 'Customize', 'menu-test' ); ?></h2><br />
    
    <?php       
            
    $hidden_field_name = 'option_form_submit_hidden';
    //$db_field_name = 'mt_favorite_color';

    //process some data of the form
    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
        if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) 
        {
                            
            // Read the posted values
            $apply_value_default_permissions = (int) $_POST[ $apply_option_default_permissions ];
            $show_value_survey_notification  = (int) $_POST[ $show_option_survey_notification ];
            $show_value_import_users         = (int) $_POST[ $show_option_import_users ];
            $same_value_password             = (int) $_POST[ $same_option_password ];
            $list_value_public_surveys       = (int) $_POST[ $list_option_public_surveys ];
        
            
            // Save the posted values in the database
            update_option( $apply_option_default_permissions, $apply_value_default_permissions );
            update_option( $show_option_survey_notification, $show_value_survey_notification );
            update_option( $show_option_import_users, $show_value_import_users );
            update_option( $same_option_password, $same_value_password );
            update_option( $list_option_public_surveys, $list_value_public_surveys );
            
            // Put an settings updated message on the screen

            ?>
            
            <div class='updated'>
                <p><strong><?php _e('Settings saved.', 'menu-test' ); 
                            ?>
                    </strong></p>
            </div>
            
        <?php

        }
                    
        //setting form here
        ?>               

        <p><?php _e("Some customization options!"); ?></p>
                        
        <form name="an_option_form2" method="post" action="">
        <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y" />
            
        <table class="form-table">
            
        <tr valign="top">
        <th scope="row">
        <?php _e("Apply default user permissions to all users?", 'menu-test' ); ?>
        </th>
        <td>
        <fieldset>
        <legend class="screen-reader-text">
        <span><?php _e("Apply default user permissions to all users?", 'menu-test' ); ?></span>
        </legend>
        <p>
        <label>
        <input type="radio" name="<?php echo $apply_option_default_permissions; ?>" value="1" <?php if((int)$apply_value_default_permissions) { ?> checked="checked" <?php } ?> />
        <?php _e("Yes"); ?>
        </label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>
        <input type="radio" name="<?php echo $apply_option_default_permissions; ?>" value="0" <?php if(!((int)$apply_value_default_permissions)) { ?> checked="checked" <?php } ?> />
        <?php _e("No"); ?>
        </label>
        <br /><span class="description">( If set to "Yes", default permissions (i.e. No special permission!) will be set for every user, overriding the permissions set in "Mapping" menu-screen. )</span>
        
        </p>
        </fieldset>
        </td>
        </tr>
            
        <tr valign="top">
        <th scope="row">
        <?php _e("Show users survey(s) to be taken?", 'menu-test' ); ?>
        </th>
        <td>
        <p>
        <label>
        <input type="radio" name="<?php echo $show_option_survey_notification; ?>" value="1" <?php if((int)$show_value_survey_notification) { ?> checked="checked" <?php } ?> />
        <?php _e("Show"); ?>
        </label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>
        <input type="radio" name="<?php echo $show_option_survey_notification; ?>" value="0" <?php if(!((int)$show_value_survey_notification)) { ?> checked="checked" <?php } ?> />
        <?php _e("Hide"); ?>
        </label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="description">( If set to "Show", all users will see a "SurveyPress" tab in there dashboard  showing survey(s) to be taken, if they have been added to that survey. )</span>
        <br />
        <span class="description">Useful only when you have some active surveys listed publicily in LimeSurvey!</span>
        
        </p>
        </td>
        </tr>
        
        <tr valign="top">
        <th scope="row">
        <?php _e("List private active surveys in user dashboard?", 'menu-test' ); ?>
        </th>
        <td>
        <p>
        <label>
        <input type="radio" name="<?php echo $list_option_public_surveys; ?>" value="1" <?php if((int)$list_value_public_surveys) { ?> checked="checked" <?php } ?> />
        <?php _e("Yes"); ?>
        </label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>
        <input type="radio" name="<?php echo $list_option_public_surveys; ?>" value="0" <?php if(!((int)$list_value_public_surveys)) { ?> checked="checked" <?php } ?> />
        <?php _e("No"); ?>
        </label>
        <br /><span class="description">( If set to "Yes", users will see all active surveys(public+private) else only 'Public' surveys will be displayed. Effective only if 'Show user survey(s) to be taken' is set to 'Show'. )</span>
        
        </p>
        </td>
        </tr>
        
               
        <tr valign="top">
        <th scope="row">
        <?php _e("Import users from Wordpress to LimeSurvey?", 'menu-test' ); ?>
        </th>
        <td>
        <p>
        <label>
        <input type="radio" name="<?php echo $show_option_import_users; ?>" value="1" <?php if((int)$show_value_import_users) { ?> checked="checked" <?php } ?> />
        <?php _e("Yes"); ?>
        </label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>
        <input type="radio" name="<?php echo $show_option_import_users; ?>" value="0" <?php if(!((int)$show_value_import_users)) { ?> checked="checked" <?php } ?> />
        <?php _e("No"); ?>
        </label>
        <br /><span class="description">( If set to "Yes", all users (except '<span style="color:blue;">admin</span>') will be imported to LS with default permissions (can be changed later on inside LS!) when they login to WP. )</span>
        
        </p>
        </td>
        </tr>
        
        <tr valign="top">
        <th scope="row">
        <?php _e("Allow passwords of LS and WP to be different for same user?", 'menu-test' ); ?>
        </th>
        <td>
        <p>
        <label>
        <input type="radio" name="<?php echo $same_option_password; ?>" value="1" <?php if((int)$same_value_password) { ?> checked="checked" <?php } ?> />
        <?php _e("Yes"); ?>
        </label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>
        <input type="radio" name="<?php echo $same_option_password; ?>" value="0" <?php if(!((int)$same_value_password)) { ?> checked="checked" <?php } ?> />
        <?php _e("No"); ?>
        </label>
        <br />
        <span class="description">Initially, password of users in both the setups will be same. A user can change it's password in LS. If set to "No", user's LS password will be set to WP password when he/she login in WP (even if he/she change it in LS!)</span>
        
        </p>
        </td>
        </tr>
                       
            
        </table>
            
        <p class="submit">
        <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
        </p>
            
        </form>
            
</div>