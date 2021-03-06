<?php

/**
 * @file
 * Configuration file for Drupal's multi-site directory aliasing feature.
 *
 * Drupal searches for an appropriate configuration directory based on the
 * website's hostname and pathname. A detailed description of the rules for
 * discovering the configuration directory can be found in the comment
 * documentation in 'sites/default/default.settings.php'.
 *
 * This file allows you to define a set of aliases that map hostnames and
 * pathnames to configuration directories. These aliases are loaded prior to
 * scanning for directories, and they are exempt from the normal discovery
 * rules. The aliases are defined in an associative array named $sites, which
 * should look similar to the following:
 *
 * $sites = array(
 *   'devexample.com' => 'example.com',
 *   'localhost.example' => 'example.com',
 * );
 *
 * The above array will cause Drupal to look for a directory named
 * "example.com" in the sites directory whenever a request comes from
 * "example.com", "devexample.com", or "localhost/example". That is useful
 * on development servers, where the domain name may not be the same as the
 * domain of the live server. Since Drupal stores file paths into the database
 * (files, system table, etc.) this will ensure the paths are correct while
 * accessed on development servers.
 *
 * To use this file, copy and rename it such that its path plus filename is
 * 'sites/sites.php'. If you don't need to use multi-site directory aliasing,
 * then you can safely ignore this file, and Drupal will ignore it too.
 */

/**
 * Multi-site directory aliasing:
 *
 * Edit the lines below to define directory aliases. Remove the leading hash
 * signs to enable.
 */
# $sites['devexample.com'] = 'example.com';
# $sites['localhost.example'] = 'example.com';


# $sites['piraten.parlawatch.com'] = 'piratenpartei';
# $sites['piratenwatch.silversurfer'] = 'piratenpartei';

$sites['abgeordnetenwatch.de'] = 'abgeordnetenwatch.de';
$sites['de.parliamentwatch.org'] = 'abgeordnetenwatch.de';
$sites['parlawatch.com'] = 'abgeordnetenwatch.de';          // for all test*.parlawatch.com servers
$sites['de.pw.silversurfer'] = 'abgeordnetenwatch.de';    // ruth's local maschine

$sites['dailwatch.ie'] = 'dailwatch.ie';
$sites['ie.parliamentwatch.org'] = 'dailwatch.ie';

$sites['parl.marsad.tn'] = 'marsad.tn';
$sites['tn.parliamentwatch.org'] = 'marsad.tn';

$sites['watch.piratenpartei-bayern.de'] = 'piratenpartei-bayern.de';
$sites['pp.parliamentwatch.org'] = 'piratenpartei-bayern.de';
$sites['abgeordnetenwatch.de'] = 'abgeordnetenwatch.de';
			
$sites['dailwatch.ie'] = 'dailwatch.ie';
$sites['ie.pw.silversurfer'] = 'dailwatch.ie';    // ruth's local maschine

			
$sites['marsad.tn'] = 'marsad.tn';
$sites['tn.pw.silversurfer'] = 'marsad.tn';
			
$sites['piratenpartei-bayern.de'] = 'piratenpartei-bayern.de';
			
$sites['dailwatch.ie'] = 'dailwatch.ie';
			
$sites['20121008.de.web1.parliamentwatch.org'] = 'abgeordnetenwatch.de';
			
$sites['20121008.ie.web1.parliamentwatch.org'] = 'dailwatch.ie';
			
$sites['20121008.tn.web1.parliamentwatch.org'] = 'marsad.tn';
			
$sites['20121008.pp.web1.parliamentwatch.org'] = 'piratenpartei-bayern.de';
			
