=== SurveyPress ===
Contributors: down_under, c_schmitz
Donate link:
Tags: LimeSurvey, survey, question, answer, test, surveypress, surveys, opinion, questionnaire
, bridge, event
Requires at least: 4.0.0
Tested up to: 4.5.2
Stable tag: 1.0.11

WordPress + LimeSurvey = A perfect combination of blog fully capable of managing surveys.

== Description ==

Using this plugin, administrator can integrate WordPress with LimeSurvey,an open source powerful feature packed survey tool, which gives the capability of importing users from WordPress to LimeSurvey and registered users of WordPress site can see the public(or private!) active surveys in there dashboard and take them as well! Furthermore, grant some users the ability to create survey or manage templates(if you wish!) on the basis of Roles or on per user basis! This plugin will be very useful for those who need a nice website/blog with the power of survey management.

__Features__

* Import users from WordPress to LimeSurvey.
* Map the roles of users in WordPress with user capabilities/responsibilities in LimeSurvey.
* Allow other users to create survey, manage labels/templates, create user and so on in LimeSurvey via this plugin.
* Based on customization options, users can see public(or private!) surveys and take them directly through there dashboard in WordPress.
* If you want to let only users of your website take some specific survey, use tokens. This way survey url will be private and only registered users can take the survey.
* Customize the behaviour of this plugin!

__Have a feature in mind?__ Create a new topic in forums!


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

If the user is anyone except 'admin', he/she may or may not see a 'SurveyPress' menu tab in dashboard which lists the __Active__ surveys which user can take if they wish to do so!

== Frequently Asked Questions ==

= Which version of LimeSurvey is supported? =

Currently, this plugin supports LimeSurvey version 1.9x and below(i.e. every stable version!).

= I can't get this plugin installed! =

Please read 'Installation' tab and 'How to use' section in 'Other Notes' tab above very carefully.

= Users are not getting imported. What could be the problem? =

Well, make sure you have set "Import users from Wordpress to LimeSurvey?" to "Yes" in 'Options' menu page.

= User permissions are not getting applied properly. Possible cause? =

Make sure you know what you are doing here! Either use the 'Mapping' menu page to map the roles and permissions or for default permissions for every user except 'admin', Set 'Apply default user permissions to all users?' to 'Yes' in 'Options' page. If this option is set to 'Yes', Mapping menu page settings will be ineffective. If you want custom permissions for various roles, set this option to "No" and use 'Mapping' menu page.

= Unable to use tokens properly! =

Using tokens is the most trickiest part of this plugin. To use it properly, follow these steps very carefully :
* Make a survey in LS and enable tokens for this survey.
* After the token table for a specific survey has been created, fill-in the details asked in Customization screen.
* After you provide with details, tokens will be made for those users in given surveys. You'll recieve the confirmation message.
* In case you don't see the confirmation message, try again.
* In case you see the confirmation message, __don't__ repeat the same process else multiple tokens will be made for same users!

__NOTE__ : Don't make new entries for same role and same surveyid. For example, suppose you want all users with Role 'editor' to take a specific survey, than you check 'editor' checkbox and provide the surveyid and click 'Save Changes'. After you click the button, tokens will be inserted if everything is configured correctly. Now, if you repeat the same process again(i.e. check 'editor' and provide same survey id), a new token will be made for same user and that user can take the survey again if he/she know the newly generated token!(i.e. more than once!)

== Changelog ==
= 1.0.11 =
* Beta release after a long time of inactivity. Please report any issues you encounter.

= 1.0.9 =
* First beta release.

= 1.0.9 =
* RC1.