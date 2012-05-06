<?php

/**
 * @author Shubham Sachdeva
 * @copyright 2012
 */
 
//global variables
global $option_token_basis,$option_token_uses;
global $value_token_basis,$value_token_uses;
global $token_option_sid_list,$token_value_sid_list,$db_value_prefix;
global $map_role_subscriber_token,$map_role_administrator_token,$map_role_editor_token,$map_role_author_token,$map_role_contributor_token;
global $lsdb;


function randomChars($length,$pattern="23456789abcdefghijkmnpqrstuvwxyz")
{
    $patternlength = strlen($pattern)-1;
    for($i=0;$i<$length;$i++)
    {
        if(isset($key))
            $key .= $pattern{rand(0,$patternlength)};
        else
            $key = $pattern{rand(0,$patternlength)};
    }
    return $key;
}

//output the heading.
?>


<div class='wrap'>
    <div id='icon-options-general' class='icon32'>
        <br/>
    </div>
    <h2><?php echo __( 'Tokens', 'menu-test' ); ?></h2><br />
    
    <?php       
            
    $hidden_field_name = 'option_form_submit_hidden';
    //$db_field_name = 'mt_favorite_color';

    //process some data of the form
    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
        if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) 
        {
                            
            // Read the posted values
            $value_token_basis               = (int) $_POST[ $option_token_basis ];
            $value_token_uses                = (int) $_POST[ $option_token_uses ];
            $token_value_sid_list            = $_POST[ $token_option_sid_list ];
            
            $map_role_subscriber_token       = (int) ( isset($_POST['map_role_subscriber_token']) )    ? ( $_POST['map_role_subscriber_token'] )    : ( 0 );
            $map_role_administrator_token    = (int) ( isset($_POST['map_role_administrator_token']) ) ? ( $_POST['map_role_administrator_token'] ) : ( 0 );
            $map_role_editor_token           = (int) ( isset($_POST['map_role_editor_token']) )        ? ( $_POST['map_role_editor_token'] )        : ( 0 );
            $map_role_author_token           = (int) ( isset($_POST['map_role_author_token']) )        ? ( $_POST['map_role_author_token'] )        : ( 0 );
            $map_role_contributor_token      = (int) ( isset($_POST['map_role_contributor_token']) )   ? ( $_POST['map_role_contributor_token'] )   : ( 0 );
        
            // Save the posted values in the database
            update_option( $option_token_basis, $value_token_basis );
            update_option( $option_token_uses, $value_token_uses );
            update_option( $token_option_sid_list, $token_value_sid_list );
            
            update_option( 'map_role_subscriber_token', $map_role_subscriber_token );
            update_option( 'map_role_administrator_token', $map_role_administrator_token );
            update_option( 'map_role_editor_token', $map_role_editor_token );
            update_option( 'map_role_author_token', $map_role_author_token );
            update_option( 'map_role_contributor_token', $map_role_contributor_token );
            
            $token_msg = '';
            //check on which basis the tokens must be inserted
            if ( $value_token_basis )
            {
                //check if $token_option_sid_list is not empty
                if ( $token_value_sid_list != '' ||  $token_value_sid_list != null )
                {
                    $sid_tokens = explode( ',', $token_value_sid_list );
                    
                    foreach ($sid_tokens as $sid)
                    {
                        $sid = (int) $sid;
                        $lang = $lsdb->get_var( $lsdb->prepare( "SELECT language FROM ".$db_value_prefix."surveys WHERE sid=".$sid.";" ) );
                        //add tokens for users with specified roles.
                        //subscriber
                        if((int)$map_role_subscriber_token)
                        {
                            $users = get_users('role=subscriber');
                            foreach ($users as $user) {
                                
                                $isvalidtoken = false;
                                while ($isvalidtoken == false)
                                {
                                    $newtoken = randomChars(15);
                                    if (!isset($existingtokens[$newtoken]))
                                    {
                                        $isvalidtoken = true;
                                        $existingtokens[$newtoken] = null;
                                    }
                                }
                                $sanitizedtoken = $newtoken;
                                
                                $subscriber = $lsdb->insert( 
                                	$db_value_prefix.'tokens_'.$sid, 
                                	array( 
                                		'firstname' => $user->user_login,
                                        'lastname' => $user->display_name,
                                        'email' => $user->user_email,
                                        'emailstatus' => "OK",
                                        'token' => $sanitizedtoken,
                                        'language' => $lang,
                                        'sent' => 'N',
                                        'remindersent' => 'N',
                                        'completed' => 'N',
                                        'usesleft' => $value_token_uses
                                	),
                                	array( 
                                		'%s', 
                                		'%s',
                                        '%s', 
                                		'%s',
                                        '%s', 
                                		'%s',
                                        '%s',
                                        '%s',
                                        '%s',
                                        '%d'
                                	) 
                                );
                            }
                        }
                        
                        //administrator role
                        if((int)$map_role_administrator_token)
                        {
                            $users = get_users('role=administrator');
                            foreach ($users as $user) {
                                
                                $isvalidtoken = false;
                                while ($isvalidtoken == false)
                                {
                                    $newtoken = randomChars(15);
                                    if (!isset($existingtokens[$newtoken]))
                                    {
                                        $isvalidtoken = true;
                                        $existingtokens[$newtoken] = null;
                                    }
                                }
                                $sanitizedtoken = $newtoken;
                                
                                $administrator = $lsdb->insert( 
                                	$db_value_prefix.'tokens_'.$sid, 
                                	array( 
                                		'firstname' => $user->user_login,
                                        'lastname' => $user->display_name,
                                        'email' => $user->user_email,
                                        'emailstatus' => "OK",
                                        'token' => $sanitizedtoken,
                                        'language' => $lang,
                                        'sent' => 'N',
                                        'remindersent' => 'N',
                                        'completed' => 'N',
                                        'usesleft' => $value_token_uses
                                	),
                                	array( 
                                		'%s', 
                                		'%s',
                                        '%s', 
                                		'%s',
                                        '%s', 
                                		'%s',
                                        '%s',
                                        '%s',
                                        '%s',
                                        '%d'
                                	) 
                                );
                            }
                        }
                        
                        //editor role
                        if((int)$map_role_editor_token)
                        {
                            $users = get_users('role=editor');
                            foreach ($users as $user) {
                                
                                $isvalidtoken = false;
                                while ($isvalidtoken == false)
                                {
                                    $newtoken = randomChars(15);
                                    if (!isset($existingtokens[$newtoken]))
                                    {
                                        $isvalidtoken = true;
                                        $existingtokens[$newtoken] = null;
                                    }
                                }
                                $sanitizedtoken = $newtoken;
                                
                                $editor = $lsdb->insert( 
                                	$db_value_prefix.'tokens_'.$sid, 
                                	array( 
                                		'firstname' => $user->user_login,
                                        'lastname' => $user->display_name,
                                        'email' => $user->user_email,
                                        'emailstatus' => "OK",
                                        'token' => $sanitizedtoken,
                                        'language' => $lang,
                                        'sent' => 'N',
                                        'remindersent' => 'N',
                                        'completed' => 'N',
                                        'usesleft' => $value_token_uses
                                	),
                                	array( 
                                		'%s', 
                                		'%s',
                                        '%s', 
                                		'%s',
                                        '%s', 
                                		'%s',
                                        '%s',
                                        '%s',
                                        '%s',
                                        '%d'
                                	) 
                                );
                            }
                        }
                        
                        //author role
                        if((int)$map_role_author_token)
                        {
                            $users = get_users('role=author');
                            foreach ($users as $user) {
                                
                                $isvalidtoken = false;
                                while ($isvalidtoken == false)
                                {
                                    $newtoken = randomChars(15);
                                    if (!isset($existingtokens[$newtoken]))
                                    {
                                        $isvalidtoken = true;
                                        $existingtokens[$newtoken] = null;
                                    }
                                }
                                $sanitizedtoken = $newtoken;
                                
                                $author = $lsdb->insert( 
                                	$db_value_prefix.'tokens_'.$sid, 
                                	array( 
                                		'firstname' => $user->user_login,
                                        'lastname' => $user->display_name,
                                        'email' => $user->user_email,
                                        'emailstatus' => "OK",
                                        'token' => $sanitizedtoken,
                                        'language' => $lang,
                                        'sent' => 'N',
                                        'remindersent' => 'N',
                                        'completed' => 'N',
                                        'usesleft' => $value_token_uses
                                	),
                                	array( 
                                		'%s', 
                                		'%s',
                                        '%s', 
                                		'%s',
                                        '%s', 
                                		'%s',
                                        '%s',
                                        '%s',
                                        '%s',
                                        '%d'
                                	) 
                                );
                            }
                        }
                        
                        //contributor role
                        if((int)$map_role_contributor_token)
                        {
                            $users = get_users('role=contributor');
                            foreach ($users as $user) {
                                
                                $isvalidtoken = false;
                                while ($isvalidtoken == false)
                                {
                                    $newtoken = randomChars(15);
                                    if (!isset($existingtokens[$newtoken]))
                                    {
                                        $isvalidtoken = true;
                                        $existingtokens[$newtoken] = null;
                                    }
                                }
                                $sanitizedtoken = $newtoken;
                                
                                $contributor = $lsdb->insert( 
                                	$db_value_prefix.'tokens_'.$sid, 
                                	array( 
                                		'firstname' => $user->user_login,
                                        'lastname' => $user->display_name,
                                        'email' => $user->user_email,
                                        'emailstatus' => "OK",
                                        'token' => $sanitizedtoken,
                                        'language' => $lang,
                                        'sent' => 'N',
                                        'remindersent' => 'N',
                                        'completed' => 'N',
                                        'usesleft' => $value_token_uses
                                	),
                                	array( 
                                		'%s', 
                                		'%s',
                                        '%s', 
                                		'%s',
                                        '%s', 
                                		'%s',
                                        '%s',
                                        '%s',
                                        '%s',
                                        '%d'
                                	) 
                                );
                            }
                        }
                    }
                    
                    
                }
                
                
                if ( $token_value_sid_list != '' || $token_value_sid_list != null )
                {
                    //construct new message!
                    $token_msg = " Tokens added for users with roles :";
                    if( (int)$map_role_subscriber_token )
                    {
                        $token_msg .= " Subscriber";
                    }
                    if( (int)$map_role_administrator_token )
                    {
                        $token_msg .= " Administrator";
                    }
                    if( (int)$map_role_editor_token )
                    {
                        $token_msg .= " Editor";
                    }
                    if( (int)$map_role_author_token )
                    {
                        $token_msg .= " Author";
                    }
                    if( (int)$map_role_contributor_token )
                    {
                        $token_msg .= " Contributor";
                    }
                    $token_msg .=" in survey(s) with surveyid(s) :";
                    
                    $sid_tokens = explode( ',', $token_value_sid_list ); 
                    foreach ( $sid_tokens as $sid )
                    {
                       $token_msg .= " ".$sid; 
                    }
                    
                    $token_msg .=".";
                }
                
                //unset values;
                $token_value_sid_list         = '';
                $value_token_uses             = '';
                $map_role_subscriber_token    = 0;
                $map_role_administrator_token = 0;
                $map_role_editor_token        = 0;
                $map_role_author_token        = 0;
                $map_role_contributor_token   = 0;
                
                update_option( $token_option_sid_list, $token_value_sid_list );
                update_option( $option_token_uses, $value_token_uses );
                
                update_option( 'map_role_subscriber_token', $map_role_subscriber_token );
                update_option( 'map_role_administrator_token', $map_role_administrator_token );
                update_option( 'map_role_editor_token', $map_role_editor_token );
                update_option( 'map_role_author_token', $map_role_author_token );
                update_option( 'map_role_contributor_token', $map_role_contributor_token );
                
            }
            
            
            
            // Put an settings updated message on the screen

            ?>
            
            <div class='updated'>
                <p><strong><?php _e('Settings saved.', 'menu-test' ); 
                            if ( $token_msg != '' ) echo $token_msg; ?></strong></p>
            </div>
            
        <?php

        }
                    
        //setting form here
        ?>               

        <p><?php _e("Some token related settings."); ?></p>
                        
        <form name="an_tokens_form" method="post" action="">
        <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y" />
            
        <table class="form-table">
            
        <tr valign="top">
        <th scope="row">
        <?php _e("Insert tokens on bulk basis or user-login basis?", 'menu-test' ); ?>
        </th>
        <td>
        <p>
        <label>
        <input type="radio" name="<?php echo $option_token_basis; ?>" value="1" <?php if((int)$value_token_basis) { ?> checked="checked" <?php } ?> />
        <?php _e("Bulk"); ?>
        </label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>
        <input type="radio" name="<?php echo $option_token_basis; ?>" value="0" <?php if(!((int)$value_token_basis)) { ?> checked="checked" <?php } ?> />
        <?php _e("User-login"); ?>
        </label>
        <br /><span class="description">( Bulk basis - tokens are inserted just once in bulk. User-login basis - tokens are inserted when the user logins. )</span>
        
        </p>

        </td>
        </tr>
            
        <tr valign="top">
        <th scope="row">
        <?php _e("Uses left?", 'menu-test' ); ?>
        </th>
        <td>
        <p>
        
        <input type="text" name="<?php echo $option_token_uses; ?>" value="<?php echo $value_token_uses; ?>" />
        
        <br />
        <span class="description">Number of times a token can be used.</span>
        
        </p>
        </td>
        </tr>
        
                
        <tr valign="top">
        <th scope="row">
        <?php _e("Add token for users with following roles:", 'menu-test' ); ?>
        </th>
        <td>
        <p>
        <label>
        <input type="checkbox" name="map_role_subscriber_token" value="1" <?php if((int)$map_role_subscriber_token) { ?> checked="checked" <?php } ?> />
        <?php _e("Subscriber"); ?>
        </label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>
        <input type="checkbox" name="map_role_administrator_token" value="1" <?php if((int)$map_role_administrator_token) { ?> checked="checked" <?php } ?> />
        <?php _e("Administrator"); ?>
        </label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>
        <input type="checkbox" name="map_role_editor_token" value="1" <?php if((int)$map_role_editor_token) { ?> checked="checked" <?php } ?> />
        <?php _e("Editor"); ?>
        </label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>
        <input type="checkbox" name="map_role_author_token" value="1" <?php if((int)$map_role_author_token) { ?> checked="checked" <?php } ?> />
        <?php _e("Author"); ?>
        </label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>
        <input type="checkbox" name="map_role_contributor_token" value="1" <?php if((int)$map_role_contributor_token) { ?> checked="checked" <?php } ?> />
        <?php _e("Contributor"); ?>
        </label>
        <br />
        <b><?php _e("In surveys with surveyid:"); ?></b><br />
        <input type="text" name="<?php echo $token_option_sid_list; ?>" id="<?php echo $token_option_sid_list; ?>" value="<?php echo $token_value_sid_list; ?>" size="20" class="regular-text" />
        &nbsp;<span class="description">( Comma(,) separated list of surveyid(s) for which tokens must be added to there respective tables. )</span>
        <br /><span class="description">( Users with checked role(s) will have a token each in specified surveys above. Token added can be used only once! )</span>
        
        </p>
        </td>
        </tr>
                             
            
        </table>
            
        <p class="submit">
        <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
        </p>
            
        </form>
            
</div>