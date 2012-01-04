=== SurveyPress ===
Contributors: down_under
Donate link:
Tags: LimeSurvey, survey, question, answer, test, opinion, questionaire
, bridge, event
Requires at least: 2.0.2
Tested up to: 3.3.1
Stable tag: 1.0.9

LimeSurvey + WordPress = A perfect combination of blog fully capable of managing surveys.

== Description ==

Using this plugin, administrator can integrate WordPress with LimeSurvey,an open source powerful feature packed survey tool, which gives the capability of importing users from WordPress to LimeSurvey and registered users of WordPress site can see the public active surveys in there dashboard and take them as well! This plugin will be very useful for those who need a nice website/blog with the power of survey management.

__Features__

* Import users from WordPress to LimeSurvey.
* Map the roles of users in WordPress with user capabilities/responsibilities in LimeSurvey.
* Allow other users to create survey, manage labels/templates, create user and so on in LimeSurvey via this plugin.
* Make your surveys public (in LimeSurvey!) so that users can see and take them directly through there dashboard in WordPress.
* Customize the behaviour of this plugin!

== Installation ==

Installing and configuring SurveyPress is very easy! Follow these steps :

1. Download the .zip file, unzip it and Upload the 'surveypress' to the `/wp-content/plugins/` directory.
1. Activate the plugin 'SurveyPress' through the 'Plugins' menu in WordPress. Make sure you have read "How to use" section in "Other Notes" tab above.
1. After the plugin has been activated successfully, you'll see a new tab in your dashboard "SurveyPress".
1. Read "How to use" section in "Other Notes" tab above for further use.

== How to use ==

1. Setup WordPress and LimeSurvey (1.9x version!).
1. Apply this plugin.
1. Make sure 'debug_mode' is set to false in your wp-config.php (If not, set it to false temporarily!)
1. Click on 'SurveyPress' menu tab in your dashboard to configure it. Fill-in the "configuration" screen details.
1. After filling in all details, if you don't get any database connection error message, you can switch the 'debug_mode',in wp-config.php, to true.
1. If you see any database connection error message, make sure you have entered correct details.
1. Map the roles of user with user permissions in LimeSurvey in "Mapping" menu page.
1. Customize the plugin as per your needs in "Options" menu page.
1. Done!

NOTE: Do not set 'debug_mode' to true until database connection error message is gone!

== How this works? ==

Whenever a registered user(having an account on WordPress setup) login, this plugin check whether the user exists in LimeSurvey install or not. If yes, it can either update the password at LimeSurvey end or do nothing. If user doesn't exist in LimeSurvey database, it adds the user as per his/her role in WordPress. 

If the user is anyone except 'admin', he/she may or may not see a 'SurveyPress' menu tab in dashboard which lists the __Public and Active__ surveys which user can take if they wish to do so!

== Frequently Asked Questions ==

= Which version of LimeSurvey is supported? =

Currently, this plugin supports LimeSurvey version 1.9x and below.

= I can't get this plugin installed! =

Please read 'Installation' and 'How to use' section above very carefully.

= Users are not getting imported. What could be the problem? =

Well, make sure you have set "Import users from Wordpress to LimeSurvey?" to "Yes" in 'Options' menu page.

= User permissions are not getting applied properly. Possible cause? =

Make sure you know what you are doing here! Either use the 'Mapping' menu page to map the roles and permissions or for default permissions for every user except 'admin', Set 'Apply default user permissions to all users?' to 'Yes' in 'Options' page. If this option is set to 'Yes', Mapping menu page settings will be ineffective. If you want custom permissions for various roles, set this option to "No" and use 'Mapping' menu page.

== Screenshots ==

1. After you activate the plugin, you should see a new menu tab "SurveyPress"
2. Configure the plugin from here! Make sure the details are correct
3. If the plugincan't establish a connection with given details, it will report the same
4. Map the roles and user global permissions here in this screen. e..g let's say you want that users with role 'Editor' should be able to Create surveys,Manage labels and Create users, than check the appropriate checkboxes against "Editor" role as shown!
5. Various customization options available
6. Users in WordPress will be mapped to LimeSurvey
7. Users in WordPress will be mapped to LimeSurvey
8. Available public active sureys shown to a test user

== Changelog ==

= 1.0.9 =
* First beta release.