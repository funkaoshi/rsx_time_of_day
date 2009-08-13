<?php

	// plugin name must be url-friendly, with no spaces
	// please prepend the plugin name with a 3-letter developer identifier

$plugin['name'] = 'rsx_time_of_day';

$plugin['author'] = 'Ramanan Sivaranjan';

$plugin['author_uri'] = 'http://funkasohi.com';

$plugin['version'] = '1.2';

	// short description of the plugin

$plugin['description'] = 'Display when the time an article was written in a friendly human readable format';

	// short helpfile (xhtml) - please be explicit in describing how the plugin
	// is called, and any parameters that may be edited by the site publisher

$plugin['help'] = '

	<h2><code>&lt;txp:rsx_time_of_day /&gt;</code></h2>

	<p>This plugin implements the idea discussed by Dunstan on his personal blog about <a href="http://1976design.com/blog/archive/2004/07/23/redesign-time-presentation/">displaying the time a post was published in a friendly manner</a>.  Simply place the <code>&lt;txp:rsx_time_of_day /&gt;</code> tag in an article template form and it will print out the time in a friendlier manner.  For example, 12:00 will get turned into &#8220;lunch time&#8221;.</p>

';

// The plugin code, as a string. NO PHP open/close tags please
// Be sure to escape any single quotes

$plugin['code'] = '

	// this is more or less a total copy of code provided by Dunstan
	// on his blog.  See:http://1976design.com/blog/archive/2004/07/23/redesign-time-presentation/
	function rsx_time_of_day($atts) {
		global $thisarticle,$timeoffset;
		$hour = date(\'H\',$thisarticle[\'posted\'] + $timeoffset); 
		switch($hour) {
			case \'00\':
			case \'01\':
			case \'02\':
				$tod = \'the wee hours\';
				break;
			case \'03\':
			case \'04\':
			case \'05\':
			case \'06\':
				$tod = \'terribly early in the morning\';
				break;
			case \'07\':
			case \'08\':
			case \'09\':
				$tod = \'early morning\';
				break;
			case \'10\':
				$tod = \'mid-morning\';
				break;
			case \'11\':
				$tod = \'late morning\';
				break;
			case \'12\':
			case \'13\':
				$tod = \'lunch time\';
				break;
			case \'14\':
				$tod = \'early afternoon\';
				break;
			case \'15\':
			case \'16\':
				$tod = \'mid-afternoon\';
				break;
			case \'17\':
				$tod = \'late afternoon\';
				break;
			case \'18\':
			case \'19\':
				$tod = \'early evening\';
				break;
			case \'20\':
			case \'21\':
				$tod = \'evening time\';
				break;
			case \'22\':
				$tod = \'late evening\';
				break;
			case \'23\':
				$tod = \'late at night\';
				break;
			default:
				$tod = \'\';
				break;
			}
		return $tod;
	}

';

$plugin['md5'] = md5( $plugin['code'] );

// to produce a copy of the plugin for distribution, load this file in a browser. 

echo chr(60)."?php\n\n".'$'."plugin='" . base64_encode(serialize($plugin)) . "'\n?".chr(62);

?>
