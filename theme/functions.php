<?php

/**
 * obsidianlab functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package obsidianlab
 */

if (!defined('OBSIDIANLAB_VERSION')) {
	// Replace the version number of the theme on each release.
	define('OBSIDIANLAB_VERSION', '0.1.0');
}

if (!function_exists('obsidianlab_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function obsidianlab_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on obsidianlab, use a find and replace
		 * to change 'obsidianlab' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('obsidianlab', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		// Add custom-logo support
		add_theme_support("custom-logo");

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for editor styles.
		add_theme_support('editor-styles');

		// Enqueue editor styles.
		add_editor_style('style-editor.css');

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Remove support for block templates.
		remove_theme_support('block-templates');
	}
endif;
add_action('after_setup_theme', 'obsidianlab_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function obsidianlab_widgets_init()
{
	register_sidebar(
		array(
			'name'          => __('Footer', 'obsidianlab'),
			'id'            => 'sidebar-1',
			'description'   => __('Add widgets here to appear in your footer.', 'obsidianlab'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'obsidianlab_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function obsidianlab_scripts()
{
	wp_enqueue_style('obsidianlab-style', get_stylesheet_uri(), array(), OBSIDIANLAB_VERSION);
	wp_enqueue_script('obsidianlab-script', get_template_directory_uri() . '/js/script.min.js', array(), OBSIDIANLAB_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'obsidianlab_scripts');

/**
 * Add the block editor class to TinyMCE.
 *
 * This allows TinyMCE to use Tailwind Typography styles.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function obsidianlab_tinymce_add_class($settings)
{
	$settings['body_class'] = 'block-editor-block-list__layout';
	return $settings;
}
add_filter('tiny_mce_before_init', 'obsidianlab_tinymce_add_class');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * ========== Start of Obsidianlab Custom Code ==========
 */

/**
 * Include custom theme functions by Obsidianlab.
 */
require get_template_directory() . "/obsidianlab/obsidianlab.php";

add_image_size('ease-banner', 250, 250, false);



function dynamic_favicon()
{
?>
	<link href="/wp-content/uploads/2023/05/logo.png" rel="shortcut icon" media="(prefers-color-scheme: light)" />
	<link href="/wp-content/uploads/2023/05/logo-white.png" rel="shortcut icon" media="(prefers-color-scheme: dark)" />
<?php
}
add_action('wp_head', 'dynamic_favicon');
add_action('admin_head', 'dynamic_favicon');


function residential_slider_shortcode($atts)
{
	/**
	 * Setup query to show the ‘services’ post type with ‘8’ posts.
	 * Output the title with an excerpt.
	 */
	ob_start();
	$args = [
		"post_type" => "residential",
		"post_status" => "publish",
		"posts_per_page" => -1,
		"orderby" => "date",
		"order" => "ASC",
	];
	$loop = new WP_Query($args);
?>
	<style>
		.card {
			max-width: 340px;
		}

		.card .image-box img {
			width: 100%;
			height: 100%;
			border-radius: 24px;
		}
	</style>

	<!-- Slider main container -->
	<div class="residentialSwiper swiper">
		<!-- Additional required wrapper -->
		<div class="swiper-wrapper">

			<? while ($loop->have_posts()) :
				$loop->the_post();
				$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), "single-post-thumbnail")[0] ?? "";
			?>

				<!-- Slides -->
				<div class="card swiper-slide ">
					<div class="image-box relative group">
						<img src="<?= $image ?>">
						<h2 class="absolute text-3xl text-white bottom-3 left-9"><?= get_the_title() ?></h2>
						<a href="#" class="opacity-0 group-hover:opacity-100 absolute bg-[#C5E6ED] text-[#000A44] -bottom-5 -right-5 border rounded-3xl px-12 py-2 transition-all ease-in duration-100"> <?= __("SHOP NOW", 'obsidianlab') ?></a>
					</div>
				</div>
			<?
			endwhile;
			?>

		</div>
		<!-- If we need pagination -->
		<div class="swiper-pagination"></div>

		<!-- If we need navigation buttons -->
		<div class="swiper-button-next"></div>

	</div>

	<script>
		const swiper = new Swiper('.residentialSwiper', {
			direction: 'horizontal',
			spaceBetween: 15,
			slidesPerView: 1.5,
			grabCursor: true,
			rewind: true,

			// If we need pagination
			pagination: {
				clickable: true,
				el: '.swiper-pagination',
				dynamicBullets: true,
			},

			// Navigation arrows
			navigation: {
				nextEl: '.swiper-button-next'
			},
			// Responsive breakpoints
			breakpoints: {
				// when window width is >= 320px
				667: {
					slidesPerView: 2.5,
					spaceBetween: 30,
				},
			}
		});
	</script>

<?
	wp_reset_postdata();
	return ob_get_clean();
}
add_shortcode("residential_slider", "residential_slider_shortcode");

function brands_slider_shortcode($atts)
{
	/**
	 * Setup query to show the ‘services’ post type with ‘8’ posts.
	 * Output the title with an excerpt.
	 */
	ob_start();
	$args = [
		"post_type" => "brand",
		"post_status" => "publish",
		"posts_per_page" => -1,
		"orderby" => "title",
		"order" => "ASC",
	];
	$loop = new WP_Query($args);
?>
	<style>
		.brand__card {
			background-color: #F9F9F9;
			max-width: 398px;
			border-radius: 24px;
		}

		.brand__card .image-box {
			background-color: #EDE9E9;
			border-radius: 24px 24px 0 0;

		}

		.brand__card .image-box img {
			width: 100%;
			height: 100%;
			margin: 0 0 0 0;
			padding: 75px 40px;
		}

		.brandSwiper {
			padding-bottom: 30px !important;
		}
	</style>

	<!-- Slider main container -->
	<div class="brandSwiper swiper" dir="rtl">
		<!-- Additional required wrapper -->
		<div class="swiper-wrapper" dir="rtl">

			<? while ($loop->have_posts()) :
				$loop->the_post();
				$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), "single-post-thumbnail")[0] ?? "";
			?>

				<!-- Slides -->
				<div class="brand__card swiper-slide ">
					<div class="image-box relative group">
						<img style="max-width: 400px;" src="<?= $image ?>">
					</div>
					<a href="#" class="text-[#000A44] flex border-b-[1px] justify-between items-center flex-row-reverse text-left px-5 py-2 cursor-pointer"><?= __("See Brochure", "obsidianlab") ?><i class="fa-solid fa-chevron-right"></i></a>
					<a href="#" class="text-[#000A44] flex justify-between items-center flex-row-reverse text-left px-5 py-2 cursor-pointer"><?= __("See Products", "obsidianlab") ?><i class="fa-solid fa-chevron-right"></i></a>
				</div>
			<?
			endwhile;
			?>

		</div>
		<!-- If we need pagination -->
		<div class="swiper-pagination"></div>

		<!-- If we need navigation buttons -->
		<div class="swiper-button-next"></div>

	</div>

	<script>
		const brandSwiper = new Swiper('.brandSwiper', {
			direction: 'horizontal',
			spaceBetween: 30,
			slidesPerView: 1.5,
			grabCursor: true,
			rewind: true,
			reverseDirection: true,

			// If we need pagination
			pagination: {
				clickable: true,
				el: '.swiper-pagination',
				dynamicBullets: true,
			},

			// Navigation arrows
			navigation: {
				nextEl: '.swiper-button-next'
			},
			// Responsive breakpoints
			breakpoints: {
				// when window width is >= 320px
				999: {
					spaceBetween: 30,
					slidesPerView: 3,
				},
			}
		});
	</script>

<?
	wp_reset_postdata();
	return ob_get_clean();
}
add_shortcode("brand_slider", "brands_slider_shortcode");


function load_map_shortcode($atts)
{
	ob_start();
?>
	<style>
		/* Set the size of the div element that contains the map */
		#map,
		.gm-style {
			height: 400px;
			/* The height is 400 pixels */
			width: 100%;
			/* The width is the width of the web page */
			border-radius: 24px;
		}
	</style>
	<div id="map"></div>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBb2ISRyMv7OrWzF6KQ5UDexeR25g-7tUk&callback=initMap&v=weekly" defer></script>
	<script>
		// Initialize and add the map
		function initMap() {
			// The location of Uluru
			const uluru = {
				lat: 12.109582,
				lng: -68.9033314
			};
			// The map, centered at Uluru
			const map = new google.maps.Map(document.getElementById("map"), {
				zoom: 16,
				center: uluru,
				disableDefaultUI: true,
				gestureHandling: 'none',
			});
			// The marker, positioned at Uluru
			const marker = new google.maps.Marker({
				position: uluru,
				map: map,
				icon: 'wp-content/uploads/2023/03/marker26x37.png',
			});
			var styles = [{
				featureType: "poi",
				stylers: [{
					visibility: "off"
				}]
			}];
			map.setOptions({
				styles: styles
			});

		}


		window.initMap = initMap;
	</script>

<?
	return ob_get_clean();
}
add_shortcode("load_map", "load_map_shortcode");

function industrial_blocks_shortcode($atts)
{
	/**
	 * Setup query to show the ‘services’ post type with ‘8’ posts.
	 * Output the title with an excerpt.
	 */
	ob_start();
	$args = [
		"post_type" => "industrial",
		"post_status" => "publish",
		"posts_per_page" => -1,
		"orderby" => "title",
		"order" => "ASC",
	];
	$loop = new WP_Query($args);
?>

	<style>
		.industrial__card {
			height: 34rem;
			perspective: 150rem;
			position: relative;
			/* max-width: 400px; */
			box-shadow: none;
			background: none;
		}

		.industrial__card img {
			width: 100%;
			height: 100%;
			margin: 0 0 0 0;
		}

		.card-side {
			height: 33rem;
			border-radius: 15px;
			transition: all 0.8s ease;
			backface-visibility: hidden;
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			padding: 2rem;
			color: white;
		}

		.card-side.back {
			transform: rotateY(-180deg);
			background-color: #77D1FF;
		}

		.card-side.front {
			background-color: #0093E9;
		}

		.industrial__card:hover .card-side.front {
			transform: rotateY(180deg);
		}

		.industrial__card:hover .card-side.back {
			transform: rotateY(0deg);
		}

		.industrial__header {
			writing-mode: vertical-rl;
			text-orientation: mixed;
		}
	</style>

	<div class="grid grid-cols-1 lg:grid-cols-2 auto-rows-auto gap-8">

		<?
		while ($loop->have_posts()) :
			$loop->the_post();
			$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), "single-post-thumbnail")[0] ?? "";
		?>

			<div class="industrial__card group">
				<div style="background-image: url(<?= $image ?>); background-size: cover;" class="card-side front">
					<h2 class="absolute text-3xl text-white bottom-3 left-9"><?= get_the_title() ?></h2>
				</div>
				<div class="card-side back">
					<h2 class="industrial__header absolute right-5 top-5 text-white text-5xl m-0 w-max origin-top-right"><?= get_the_title() ?></h2>
					<a href="#" class="absolute opacity-0 group-hover:opacity-100 bg-[#C5E6ED] text-[#000A44] -bottom-5 -right-5 border rounded-3xl px-12 py-2 transition-all ease-in duration-100 delay-200 z-50"> <?= __("SHOP NOW", 'obsidianlab') ?></a>
				</div>
			</div>
		<?
		endwhile;
		?>
	</div>
<?
	wp_reset_postdata();
	return ob_get_clean();
}
add_shortcode("industrial_blocks", "industrial_blocks_shortcode");

function btn_shortcode($atts)
{
	$default = array(
		'class' => '',
		'link' => '',
		'text' => '',
	);

	$a = shortcode_atts($default, $atts);
	ob_start();
?>
	<a href="<?= $a['link'] ?>" class="btn <?= $a['class'] ?>"><?= $a['text'] ?></a>
<?
	return ob_get_clean();
}
add_shortcode('cstm_button', 'btn_shortcode');
