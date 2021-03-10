<?php
/**
 * YITH-Proteo theme dashboard panel
 *
 * @package yith-proteo
 */

$demos = array(
	array(
		'demo_name'              => 'Classic Shop',
		'demo_preview_image_url' => 'https://update.yithemes.com/proteo-demo-content/classic-shop/screenshot.png',
		'demo_preview_url'       => 'https://proteo.yithemes.com/classic-shop/',
		'demo_state'             => 'live',
	),
	array(
		'demo_name'              => 'Food',
		'demo_preview_image_url' => 'https://update.yithemes.com/proteo-demo-content/food/food.jpg',
		'demo_preview_url'       => 'https://proteo.yithemes.com/food/',
		'demo_state'             => 'live',
	),
	array(
		'demo_name'              => 'Desire',
		'demo_preview_image_url' => 'https://update.yithemes.com/proteo-demo-content/desire/desire.jpg',
		'demo_preview_url'       => 'https://proteo.yithemes.com/desire/',
		'demo_state'             => 'live',
	),
);

$requested_plugins = array(
	array(
		'name'     => 'Proteo Toolkit',
		'slug'     => 'yith-proteo-toolkit',
		'required' => true,
		'init'     => 'yith-proteo-toolkit/yith-proteo-toolkit.php',
	),
	array(
		'name'     => 'YITH Slider for page builders',
		'slug'     => 'yith-slider-for-page-builders',
		'required' => false,
		'init'     => 'yith-slider-for-page-builders/yith-slider-for-page-builders.php',
	),
);

$is_proteo_toolkit_installed = file_exists( WP_PLUGIN_DIR . '/yith-proteo-toolkit/yith-proteo-toolkit.php' );
$is_proteo_toolkit_active    = defined( 'YITH_PROTEO_TOOLKIT' );

?>
<style>
#yith-proteo-dashboard-panel {
	padding: 30px 10px;
	box-sizing: border-box;
	color: #000;
}
#yith-proteo-dashboard-panel * {
	box-sizing: border-box;
}
#yith-proteo-dashboard-panel h2, 
#yith-proteo-dashboard-panel h3 {
	color: #1a9b9f;
}
.wrapper {
	max-width: 1200px;
}
#header {
	text-align: center;
	margin-bottom: 30px;
}
#header h1 {
	font-size: 42px;
	color: #000;
}
#header h1 span {
	display: inline-block;
	background: #1a9b9f;
	color: #ffffff;
	font-size: 10px;
	border-radius: 5px;
	padding: 1px 5px;
	margin-left: 5px;
	position: absolute;
}
.two-cols-set {
	display: -ms-flexbox;
	display: flex;
	-ms-flex-wrap: wrap;
	flex-wrap: wrap;
	margin-right: -15px;
	margin-left: -15px;
}
.three-cols-set {
	display: -ms-flexbox;
	display: flex;
	-ms-flex-wrap: wrap;
	flex-wrap: wrap;
	margin-right: -15px;
	margin-left: -15px;
}
#main-content {
	position: relative;
	padding-right: 15px;
	padding-left: 15px;
	-ms-flex: 0 0 60%;
	flex: 0 0 60%;
	max-width: 60%;
}
#aside {
	position: relative;
	padding-right: 15px;
	padding-left: 15px;
	-ms-flex: 0 0 40%;
	flex: 0 0 40%;
	max-width: 40%;
}
.three-cols-set {
	margin-top: 50px;
}
.three-cols-set .col {
	position: relative;
	padding-right: 15px;
	padding-left: 15px;
	-ms-flex: 0 0 33.333%;
	flex: 0 0 33.333%;
	max-width: 33.333%;
}
.content {
	background-color: #FFF;
	border-radius: 10px;
	box-shadow: 0 0px 30px -15px rgba(0,0,0,.3);
	padding: 30px;
}
#aside .content {
	margin-bottom: 30px;
}
.demo-preview {
	margin: 0 0 15px;
	text-align: center;
	position: relative;
}
.demo-preview img {
	max-width: 100%;
	display: block;
}
.demo-title {
	text-align: center;
	font-size: 13px;
	font-weight: 600;
	color: #000;
	text-transform: uppercase;
	padding: 10px 15px;
}
.demo-title a {
	text-decoration: none;
}
.demo-title a:not(:hover) {
	color: inherit;
}
.demo-preview:after {
	background: linear-gradient(180deg, rgba(76,139,141,1) 20%, rgba(0,0,0,0.7) 100%);
	bottom: 0;
	color: #ffffff;
	content: '';
	display: block;
	left: 0;
	pointer-events: none;
	position: absolute;
	right: 0;
	top: 0;
	opacity: 0;
	transition: all ease 0.3s;
	margin: 5px;
	border-radius: 5px;
}
.demo-preview:not(.coming-soon):hover::after, .demo-preview.elaborating:after {
	opacity: 1;
	margin: 0;
}
.demo-preview.elaborating {
	pointer-events: none;
}
.demo-preview.elaborating:before {
	content: '';
	display: block;
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	margin: auto;
	border: 4px solid #9E9E9E;
	border-radius: 50%;
	border-top: 4px solid #ffffff;
	width: 30px;
	height: 30px;
	-webkit-animation: spin 2s linear infinite;
	animation: spin 2s linear infinite;
	z-index: 1;
}
.demo-preview.coming-soon:after {
	content: '';
	display: block;
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	background: rgba(255,255,255,0.7);
	color: #23acaf;
	pointer-events: none;
	opacity: 1;
}
.demo-preview.coming-soon {
	pointer-events: none;
}
.demo-preview .demo-actions {
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	z-index: 1;
	opacity: 0;
	transition: all ease 0.3s;
}
.demo-preview.coming-soon .demo-actions {
	opacity: 1;
}
.demo-preview.coming-soon + .demo-title {
	opacity: 0.5;
	pointer-events: none;
}
.demo-preview:not(.coming-soon):hover .demo-actions {
	opacity: 1;
}
.demo-preview .demo-actions a {
	display: inline-block;
	background-color: transparent;
	padding: 7px 15px;
	margin: 7px auto;
	color: #fff;
	text-decoration: none;
	text-transform: uppercase;
	font-weight: 600;
	border-radius: 5px;
	font-size: 13px;
	transition: all ease 0.3s;
}
.demo-preview .demo-actions a:hover {
	background-color: #23acaf;
}
.demo-preview .coming-soon-badge {
	display: block;
	background-color: #ffffff;
	border-radius: 100px;
	box-shadow: 0 0 5px rgb(0, 169, 167);
	position: absolute;
	width: 90px;
	height: 90px;
	top: 30%;
	left: 0;
	right: 0;
	margin-left: auto;
	margin-right: auto;
	word-break: break-word;
	color: rgb(0, 169, 167);
	padding: 28px 0 0;
	text-transform: uppercase;
	font-weight: 600;
	font-size: 13px;
}
#useful-plugins-list li {
	margin-bottom: 15px;
}
#useful-plugins-list li .plugin-name {
	font-weight: 600;
	background: #ffffff;
	position: relative;
	z-index: 1;
	padding: 0 10px 5px 0;
}
#useful-plugins-list li .plugin-status-actions {
	float: right;
	background: #ffffff;
	position: relative;
	z-index: 1;
	padding: 0 0 5px 10px;
}
#useful-plugins-list li:after {
	content: '';
	display: block;
	position: relative;
	border-bottom: 1px dashed #e0e0e0;
	z-index: 0;
	top: -4px;
}
#useful-link-list li {
	margin-bottom: 10px;
}
#useful-link-list li img {
	display: inline-block;
	margin-right: 5px;
	vertical-align: text-bottom;
}
.plugin-status-actions:not(.yith-proteo-installed-recommended-plugin) {
	cursor: pointer;
}
.plugin-status-actions:not(.yith-proteo-installed-recommended-plugin):hover {
	text-decoration: underline;
}
/* Safari */
@-webkit-keyframes spin {
	0% { -webkit-transform: rotate(0deg); }
	100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
	0% { transform: rotate(0deg); }
	100% { transform: rotate(360deg); }
}

@media (max-width: 960px) {
	#main-content, #aside {
		flex: 0 0 100%;
		max-width: 100%;
		margin-bottom: 30px;
	}
}
@media (max-width: 600px) {
	.three-cols-set .col {
		-ms-flex: 0 0 50%;
		flex: 0 0 50%;
		max-width: 50%;
	}
}
</style>
<div id="yith-proteo-dashboard-panel">
	<div class="wrapper">
		<div id="header">
			<div class="content">
				<h1><img src="<?php echo esc_url( get_template_directory_uri() ) . '/img/proteo-logo.png'; ?>"><span class="theme-version-badge"><?php echo esc_html( YITH_PROTEO_VERSION ); ?></span></h1>
			</div>
		</div><!-- #header close -->
		<div class="two-cols-set">
			<div id="main-content">
				<div class="content">
					<div id="showcase">
						<h2><?php echo esc_html_x( 'Import a demo site', 'Proteo dashboard', 'yith-proteo' ); ?></h2>
						<p>
							<?php echo esc_html_x( 'Import any of the demo site below.', 'Proteo dashboard', 'yith-proteo' ); ?>
						</p>
						<p>
							<?php echo esc_html_x( 'Once done, your site will have the exact same look and content as the demo preview.', 'Proteo dashboard', 'yith-proteo' ); ?>
						</p>
						<p>
							<b><?php echo esc_html_x( 'We are working very hard to add new demo sites, stay updated!', 'Proteo dashboard', 'yith-proteo' ); ?></b>
						</p>
						<div class="three-cols-set">
							<?php
							foreach ( $demos as $demo ) :
								?>
							<div class="col">
								<figure class="demo-preview <?php echo esc_attr( $demo['demo_state'] ); ?>">
									<img src="<?php echo esc_url( $demo['demo_preview_image_url'] ); ?>" alt="<?php echo esc_attr_x( 'Preview', 'Proteo dashboard', 'yith-proteo' ); ?>">
									<div class="demo-actions">
										<?php if ( '' !== $demo['demo_preview_url'] ) : ?>
											<?php if ( $is_proteo_toolkit_active ) : ?>
												<a href="<?php echo esc_url( admin_url( 'themes.php?page=setup-wizard' ) ); ?>"><?php echo esc_html_x( 'Import', 'Proteo dashboard', 'yith-proteo' ); ?></a>
												<?php elseif ( $is_proteo_toolkit_installed ) : ?>
												<a href="" class="yith-proteo-activate-recommended-plugin yith-proteo-activate-toolkit" data-slug="yith-proteo-toolkit" data-init="yith-proteo-toolkit/yith-proteo-toolkit.php"><?php echo esc_html_x( 'Import', 'Proteo dashboard', 'yith-proteo' ); ?></a>
											<?php else : ?>
												<a href="" class="yith-proteo-install-recommended-plugin yith-proteo-install-toolkit" data-slug="yith-proteo-toolkit" data-init="yith-proteo-toolkit/yith-proteo-toolkit.php"><?php echo esc_html_x( 'Import', 'Proteo dashboard', 'yith-proteo' ); ?></a>
											<?php endif; ?>
											<a href="<?php echo esc_url( $demo['demo_preview_url'] ); ?>" target="_blank" rel="nofollow noopener"><?php echo esc_html_x( 'Preview', 'Proteo dashboard', 'yith-proteo' ); ?></a>
										<?php else : ?>
											<div class="coming-soon-badge"><?php echo esc_html_x( 'Coming soon', 'Proteo dashboard', 'yith-proteo' ); ?></div>
										<?php endif; ?>
									</div>
								</figure>
								<div class="demo-title">
									<?php echo esc_html( $demo['demo_name'] ); ?>
								</div>
							</div>
								<?php
							endforeach;
							?>
						</div>
					</div><!-- #showcase close -->
				</div>
			</div><!-- #main-content close -->
			<div id="aside">
				<div class="content">
					<h3><?php echo esc_html_x( 'Free suggested plugins', 'Proteo dashboard label', 'yith-proteo' ); ?></h3>
					<ul id="useful-plugins-list">
						<?php
						foreach ( $requested_plugins as $request_plugin ) :
							$is_installed     = file_exists( WP_PLUGIN_DIR . '/' . $request_plugin['init'] );
							$is_plugin_active = is_plugin_active( $request_plugin['init'] );
							if ( $is_plugin_active ) {
								$request_plugin_class = 'yith-proteo-installed-recommended-plugin';
								$message              = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="#1a9b9f" d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.25 8.891l-1.421-1.409-6.105 6.218-3.078-2.937-1.396 1.436 4.5 4.319 7.5-7.627z"/></svg>';
							} elseif ( $is_installed ) {
								$request_plugin_class = 'yith-proteo-activate-recommended-plugin';
								$message              = esc_html_x( 'Activate', 'Proteo dashboard', 'yith-proteo' );
							} else {
								$request_plugin_class = 'yith-proteo-install-recommended-plugin';
								$message              = esc_html_x( 'Install & Activate', 'Proteo dashboard', 'yith-proteo' );
							}
							?>
						<li>
							<span class="plugin-name"><?php echo esc_html( $request_plugin['name'] ); ?></span>
							<a href="#" class="plugin-status-actions <?php echo esc_attr( $request_plugin_class ); ?>" data-slug="<?php echo esc_attr( $request_plugin['slug'] ); ?>" data-init="<?php echo esc_attr( $request_plugin['init'] ); ?>"><?php echo $message; ?></a> <?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="content">
					<h3><?php echo esc_html_x( 'How to start', 'Proteo dashboard label', 'yith-proteo' ); ?></h3>
					<ul id="useful-link-list">
						<li><img src="<?php echo esc_url( get_template_directory_uri() . '/img/theme-documentation-icon.svg' ); ?>" alt="<?php echo esc_attr_x( 'Read theme documentation', 'Proteo dashboard', 'yith-proteo' ); ?>"><?php echo sprintf( '%1s <a href="https://docs.yithemes.com/yith-proteo/" target="_blank" rel="noopener nofollow">%2s ></a>', esc_html_x( 'Read the', 'Proteo dashboard. Full string: Read the theme documentation.', 'yith-proteo' ), esc_html_x( 'theme documentation', 'Proteo dashboard', 'yith-proteo' ) ); ?></li>
						<li><img src="<?php echo esc_url( get_template_directory_uri() . '/img/ask-help-icon.svg' ); ?>" alt="<?php echo esc_attr_x( 'Visit theme forum', 'Proteo dashboard', 'yith-proteo' ); ?>"><?php echo sprintf( '%1s <a href="https://wordpress.org/support/theme/yith-proteo/" target="_blank" rel="noopener nofollow">%2s ></a>', esc_html_x( 'Ask help in the', 'Proteo dashboard. Full string: Ask help in the translation form.', 'yith-proteo' ), esc_html_x( 'support forum', 'Proteo dashboard', 'yith-proteo' ) ); ?></li>
						<li><img src="<?php echo esc_url( get_template_directory_uri() . '/img/start-customize-icon.svg' ); ?>" alt="<?php echo esc_attr_x( 'Use theme customizer', 'Proteo dashboard', 'yith-proteo' ); ?>"><?php echo sprintf( '%1s <a href="' . esc_url( admin_url( 'customize.php' ) ) . '" target="_blank" rel="noopener nofollow">%2s ></a>', esc_html_x( 'Start to customize with the', 'Proteo dashboard. Full string: Start to customize with the live customizer.', 'yith-proteo' ), esc_html_x( 'live customizer', 'Proteo dashboard', 'yith-proteo' ) ); ?></li>
					</ul>
				</div>
			</div><!-- #aside close -->
		</div><!-- .two-cols-set close -->
	</div><!-- .wrapper close -->
</div><!-- #yith-proteo-dashboard-pane close -->
<?php
