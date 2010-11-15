<?php

// plugin.php
define("NMPLUGIN_LAN001", "News Mailer");
define("NMPLUGIN_LAN002", "Allows mailing of news items from a defined amount of time to a defined group of users.");
define("NMPLUGIN_LAN003", "News Mailer has been successfully installed!");
define("NMPLUGIN_LAN004", "News Mailer has been successfully upgraded! Enjoy the changes, fixes and new features! (provided they all exist!)");

// admin_config.php
define("NMCONFIG_LAN001", "Settings saved successfully!");
define("NMCONFIG_LAN002", "Select the method for news item collection:");
define("NMCONFIG_LAN003", "Monthly");
define("NMCONFIG_LAN004", "Date Specific");
define("NMCONFIG_LAN005", "News Item Sorting:");
define("NMCONFIG_LAN006", "Newest to Oldest");
define("NMCONFIG_LAN007", "Oldest to Newest");
define("NMCONFIG_LAN008", "Date Format:");
define("NMCONFIG_LAN009", "If the \"Date Specific\" option is selected, which date format do you prefer.");
define("NMCONFIG_LAN010", "Date Types:");
define("NMCONFIG_LAN011", "Refer to the PHP <a href='http://www.php.net/manual/en/function.date.php'>date()</a> function. Separate types with a semicolon (;).");
define("NMCONFIG_LAN012", "Default Email Subject:");
define("NMCONFIG_LAN013", "Used if no subject is set before sending the email. The %date% tag will be converted to whatever date is used in the sending.");
define("NMCONFIG_LAN014", "Save Settings");
define("NMCONFIG_LAN015", "Configure News Mailer");

// admin_mailer.php
define("NMMAIL_LAN001", "Selected news items were sent to ");
define("NMMAIL_LAN002", "recipient");
define("NMMAIL_LAN003", "recipients");
define("NMMAIL_LAN004", " successfully!");
define("NMMAIL_LAN005", "Userclass to send the news items to:");
define("NMMAIL_LAN006", "Date you want the news items pulled from:");
define("NMMAIL_LAN007", "Month and year you want the news items pulled from:");
define("NMMAIL_LAN008", "Email Subject:");
define("NMMAIL_LAN009", "Message you want to appear before the email (header):");
define("NMMAIL_LAN010", "Message you want to appear after the email (footer):");
define("NMMAIL_LAN011", "Send News Items!");
define("NMMAIL_LAN012", "Send News Items");

// admin_menu.php
define("NMMENU_LAN001", "News Mailer Navigation");
define("NMMENU_LAN002", "Settings");
define("NMMENU_LAN003", "Send News Items");
define("NMMENU_LAN004", "Configure Templates");

// admin_template.php
define("NMTEMPLATE_LAN001", "News Items Template updated successfully!");
define("NMTEMPLATE_LAN002", "Total Email Template updated successfully!");
define("NMTEMPLATE_LAN003", "The below box allows you to configure how the news items are presented. Keep in mind that this is <b>not</b> a template for the whole email.");
define("NMTEMPLATE_LAN004", "The following tags will be converted to their respective values:");
define("NMTEMPLATE_LAN005", "Title of the news item.");
define("NMTEMPLATE_LAN006", "Author of the news item.");
define("NMTEMPLATE_LAN007", "Text inside the summary field.");
define("NMTEMPLATE_LAN008", "The body of the news item.");
define("NMTEMPLATE_LAN009", "The absolute URL to the news item.");
define("NMTEMPLATE_LAN010", "Update News Item Template");
define("NMTEMPLATE_LAN011", "The below box allows you to configure how the total email is presented.");
define("NMTEMPLATE_LAN012", "This will display your website's name.");
define("NMTEMPLATE_LAN013", "This is the absolute URL to your website.");
define("NMTEMPLATE_LAN014", "The content you enter in the header field before sending the email.");
define("NMTEMPLATE_LAN015", "The above template will be inserted here.");
define("NMTEMPLATE_LAN016", "The content you enter in the footer field before sending the email.");
define("NMTEMPLATE_LAN017", "Update Total Email Template");
define("NMTEMPLATE_LAN018", "Configure Templates");

?>