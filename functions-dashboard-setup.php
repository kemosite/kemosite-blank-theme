<?php
/* [Add Next Steps to Admin Dashboard] */
function register_my_dashboard_widget() {

	global $wp_meta_boxes;

	wp_add_dashboard_widget(
		'kemosite_blank_nextsteps',
		'Blank Theme, Next Steps',
		'kemosite_blank_nextsteps_widget_display'
	);

	$dashboard = $wp_meta_boxes['dashboard']['normal']['core'];

	$my_widget = array( 'kemosite_blank_nextsteps' => $dashboard['kemosite_blank_nextsteps'] );
 	unset( $dashboard['kemosite_blank_nextsteps'] );

 	$sorted_dashboard = array_merge( $my_widget, $dashboard );
 	$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;

}

/* [Next Steps Widget] */
function kemosite_blank_nextsteps_widget_display() {
    ?>
    <h1>Security</h1>
    <h3><strong>wp-config.php</strong></h3>
    <p>To deny access to <em>wp-config.php</em>, you should add the code below at the top of the <em>.htaccess</em> file:</p>
    <pre>
    &lt;files wp-config.php&gt;
    	order allow,deny
    	deny from all
    &lt;/files&gt;
	</pre>
	<p>This file shouldn't be modifiable or writable by others. To prevent other users from reading it, the file permission should be 440 or 400.</p>
	<p>If you ever need to regenerate the secret keys, you can visit the official generator provided by WordPress.org at <a href="https://api.wordpress.org/secret-key/1.1/salt/">https://api.wordpress.org/secret-key/1.1/salt/</a>.</p>
	<h3><strong>File Server</strong></h3>
	<p>Ensuring that no one can view the contents of directories can be done by adding a single line in <em>.htaccess</em></p>
	<pre>
	Options –Indexes
	</pre>
	<h1>Plug-Ins</h1>
	<h3><strong>Required Plugins</strong></h3>
	<p>kemosite typography plug-in for Wordpress<br>
	<?php
	/* [DETECT KEMOSITE TYPOGRAPHY PLUGIN] */
	if ( is_plugin_active( 'kemosite-typography-plugin/index.php' ) ): ?><em>Active</em><?php else: ?><em>Inactive</em><?php endif; ?>
	</p>
    <p>Install these plugins, if functionality needed.</p>
    <ol>
    <li>Jetpack</li>
	<li>Akismet</li>
	<li>iThemes Security</li>
	<li>Exploit Scanner</li>
	<li>Quttera Web Malware Scanner</li>
	<li>Duplicator</li>
	<li>Yoast SEO</li>
	<li>All in One SEO Pack</li>
	<li>WP Performance Score Booster</li>
	<li>WP Smush.it</li>
	<li>WP Super Cache</li>
	<li>WP Super Minify</li>
	<li>WP-DBManager</li>
	<li>Simple Facebook Page Plugin</li>
	<li>Facebook Comments Plugin</li>
	<li>Disqus Comment System</li>
	<li>VaultPress</li>
	<li>Regenerate Thumbnails</li>
	<li>Contact Form DB</li>
	<li>OptionTree</li>
	<li>Scribe</li>
	<li>MailPoet Newsletters</li>
	<li>Google Consumer Surveys</li>
	<li>Project Status</li>
	<li>Events Manager</li>
	<li>Advanced Ads</li>
	<li>WooCommerce</li>
    </ol>
    <?php
}
add_action( 'wp_dashboard_setup', 'register_my_dashboard_widget' );

function my_admin_footer_function() {
	echo '<style>div#wpfooter { position: relative; }</style>';
}
add_action('admin_footer', 'my_admin_footer_function');

?>