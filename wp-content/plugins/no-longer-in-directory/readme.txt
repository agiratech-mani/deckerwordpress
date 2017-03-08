=== No Longer in Directory ===
Contributors: WhiteFirDesign
Tags: security, plugins
Requires at least: 3.3
Tested up to: 4.7
Stable tag: trunk
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Checks for installed plugins that are no longer in the WordPress.org Plugin Directory.

== Description ==

When a plugin is removed from the WordPress.org Plugin Directory no warning is provided in the WordPress admin area if that plugin is installed in a website. Plugins can be removed for the following reasons:

- they are found to break the GPL
- they are found to break the directory rules
- other plugins by the author are found to be a problem and all are removed pending investigation
- the author asks for it to be closed
- the author asks for it to be closed because they are re-releasing under a different name
- it is being investigated after non-specific complaints
- **there is a security vulnerability**

If the plugin contains a security vulnerability the website could be vulnerable to being exploited until the plugin is deleted from the installation or a security update is released and applied.

If you want WordPress to begin alerting when installed plugins have been removed from the directory please make sure to [vote for implementing that in WordPress](https://wordpress.org/extend/ideas/topic/alert-when-installed-plugins-have-been-removed-from-the-plugin-directory). In the mean time, this plugin adds a page to WordPress to check if any plugins installed in WordPress are on a list of plugins that are no longer in the WordPress.org Plugin Directory so that WordPress administrators are alerted to the issue.

The plugin will also separately list any plugins that have not been updated in the WordPress.org Plugin Directory in over two years.

For removed plugins that have a security vulnerability, a link to a security advisory maybe included in the results of the check. You can get comprehensive monitoring of security vulnerabilities in all of the plugins you use and the ability to help choose plugins that [will receive a security review from us](https://www.pluginvulnerabilities.com/wordpress-plugin-security-reviews/) with our with our [Plugin Vulnerabilities service](https://www.pluginvulnerabilities.com/).

To insure that plugins that have returned to the WordPress.org Plugin Directory since the list was last updated are not incorrectly warned about, the plugin rechecks the WordPress.org Plugin Directory to confirm any installed plugins that are on the list have not returned to the directory.

The check is done using the plugin's directory (folder) name which could lead to plugins that have never been in the plugin directory to be flagged if they use the same name as a plugin that was in the WordPress.org Plugin Directory. If you become aware of a plugin this happening to please contact us so that we can put a check in place to prevent that from happening anymore.

**Supported Localizations:** Deutsch, Español, Français

Please let us know if you are interested in us adding additional localizations.

== Installation ==

1. Copy plugin files to the plugins folder.

2. Activate the plugin.

3. Click the No Longer in Directory item in the Plugins Menu to see results.

== Screenshots ==

1. Plugin Page

== Changelog ==

= 1.0.59 =
* Refreshed removed and no longer updated plugin lists with data from March 2, 2017 
* Added additional security advisories

= 1.0.58 =
* Refreshed removed and no longer updated plugin lists with data from February 21, 2017 
* Added additional security advisories

= 1.0.57 =
* Refreshed removed and no longer updated plugin lists with data from December 12, 2016 
* Added additional security advisories

= 1.0.56 =
* Refreshed removed and no longer updated plugin lists with data from November 2, 2016 
* Added additional security advisories

= 1.0.55 =
* Refreshed removed and no longer updated plugin lists with data from October 12, 2016 
* Added additional security advisories

= 1.0.54 =
* Refreshed user interface
* Refreshed removed and no longer updated plugin lists with data from September 1, 2016 
* Added additional security advisories

= 1.0.53 =

* Refreshed removed and no longer updated plugin lists with data from August 9, 2016
* Added additional security advisories

= 1.0.52 =

* Refreshed removed and no longer updated plugin lists with data from June 13, 2016
* Added additional security advisories

= 1.0.51 =

* Refreshed removed and no longer updated plugin lists with data from May 4, 2016
* Added additional security advisories

= 1.0.50 =

* Refreshed removed and no longer updated plugin lists with data from April 1, 2016
* Added additional security advisories

= 1.0.49 =

* Refreshed removed and no longer updated plugin lists with data from March 2, 2016
* Added additional security advisories

= 1.0.48 =

* Refreshed removed and no longer updated plugin lists with data from February 8, 2016

= 1.0.47 =

* Refreshed removed and no longer updated plugin lists with data from January 5, 2016

= 1.0.46 =

* Refreshed removed and no longer updated plugin lists with data from December 17, 2015

= 1.0.45 =

* Refreshed removed and no longer updated plugin lists with data from October 5, 2015

= 1.0.44 =

* Refreshed removed and no longer updated plugin lists with data from September 21, 2015

= 1.0.43 =

* Refreshed removed and no longer updated plugin lists with data from August 17, 2015

= 1.0.42 =

* Refreshed removed and no longer updated plugin lists with data from July 9, 2015
* Added additional security advisories

= 1.0.41 =

* Refreshed removed and no longer updated plugin lists with data from June 2, 2015
* Added additional security advisories

= 1.0.40 =

* Refreshed removed and no longer updated plugin lists with data from May 4, 2015
* Added additional security advisories

= 1.0.39 =

* Refreshed removed and no longer updated plugin lists with data from April 2, 2015
* Added additional security advisories

= 1.0.38 =

* Refreshed removed and no longer updated plugin lists with data from March 3, 2015
* Added additional security advisories

= 1.0.37 =

* Refreshed removed and no longer updated plugin lists with data from February 4, 2015
* Added additional security advisories

= 1.0.36 =

* Refreshed removed and no longer updated plugin lists with data from January 13, 2015
* Added additional security advisories

= 1.0.35 =

* Refreshed removed and no longer updated plugin lists with data from December 15, 2014
* Added additional security advisories
* Corrected German localization
* Minor code cleanup

= 1.0.34 =

* Refreshed removed and no longer updated plugin lists with data from December 1, 2014
* Added additional security advisories
* Corrected German localization
* Minor code cleanup

= 1.0.33 =

* Refreshed removed and no longer updated plugin lists with data from November 20, 2014

= 1.0.32 =

* Updated plugin check code to handle double checks over HTTPS
* Refreshed removed and no longer updated plugin lists with data from October 1, 2014

= 1.0.31 =

* Refreshed removed and no longer updated plugin lists with data from September 4, 2014

= 1.0.30 =

* Refreshed removed and no longer updated plugin lists with data from August 14, 2014

= 1.0.29 =

* Refreshed removed plugin list with data from July 7, 2014

= 1.0.28 =

* Refreshed removed plugin list with data from June 5, 2014
* Updated German and Spanish localizations

= 1.0.27 =

* Refreshed removed plugin list with data from May 8, 2014

= 1.0.26 =

* Now also lists plugins that have not been updated in the WordPress.org Plugin Directory in over two years.
* Refreshed removed plugin list with data from April 9, 2014

= 1.0.25 =

* Refreshed removed plugin list with data from April 1, 2014

= 1.0.24 =

* Refreshed removed plugin list with data from March 3, 2014

= 1.0.23 =

* Refreshed removed plugin list with data from February 7, 2014

= 1.0.22 =

* Refreshed removed plugin list with data from December 12, 2013

= 1.0.21 =

* Refreshed removed plugin list with data from October 24, 2013

= 1.0.20 =

* Refreshed removed plugin list with data from September 18, 2013

= 1.0.19 =

* Refreshed removed plugin list with data from August 13, 2013

= 1.0.18 =

* Refreshed removed plugin list with data from June 27, 2013

= 1.0.17 =

* Refreshed removed plugin list with data from May 24, 2013

= 1.0.16 =

* Refreshed removed plugin list with data from April 22, 2013

= 1.0.15 =

* Refreshed removed plugin list with data from March 15, 2013

= 1.0.14 =

* Refreshed removed plugin list with data from February 8, 2013
* Updated Secunia Advisories list with recent advisory

= 1.0.13 =

* Refreshed removed plugin list with data from January 3, 2013
* Minor code changes

= 1.0.12 =

* Refreshed removed plugin list with data from December 3, 2012

= 1.0.11 =

* Refreshed removed plugin list with data from November 1, 2012

= 1.0.10 =

* Refreshed removed plugin list with data from September 5, 2012
* Updated Secunia Advisories list with recent advisories

= 1.0.9 =

* Refreshed removed plugin list with data from August 1, 2012

= 1.0.8 =

* Refreshed removed plugin list with data from July 16, 2012
* Updated Secunia Advisories list with recent advisories

= 1.0.7 =

* Refreshed removed plugin list with data from July 2, 2012
* Updated Secunia Advisories list with recent advisories

= 1.0.6 =

* Refreshed removed plugin list with data from June 18, 2012
* Updated Secunia Advisories list with recent advisories

= 1.0.5 =

* Refreshed removed plugin list with data from June 5, 2012
* Added German localization

= 1.0.4 =

* Refreshed removed plugin list with data from May 3, 2012
* Added French and Spanish localizations

= 1.0.3 =

* Refreshed removed plugin list with data from April 2, 2012

= 1.0.2 =

* Added links to Secunia Advisories
* Added plugins that were removed from Plugin Directory, based on our informing WordPress of unresolved publicly known vulnerabilities in them, to plugin list
* Fixed issue that could cause removed plugins not to be detected when using older versions of PHP

= 1.0.1 =

* Refreshed removed plugin list with data from March 1, 2012

= 1.0 =
* Initial release