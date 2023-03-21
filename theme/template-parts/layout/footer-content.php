<?php

/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package obsidianlab
 */

use ObsidianLab\Tailwind_Walker;
?>

<footer class="bg-white" aria-labelledby="footer-heading">
	<h2 id="footer-heading" class="sr-only">Footer</h2>
	<div class="mx-auto max-w-7xl px-6 pb-8 pt-20 sm:pt-24 lg:px-8 lg:pt-32">

		<div class="mt-16 border-t border-gray-900/10 pt-8 sm:mt-20 md:flex md:items-center md:justify-between lg:mt-24">
			<img id="site_logo" class="block h-12 w-auto" src="<?= esc_url(wp_get_attachment_image_src(get_theme_mod("custom_logo"), "full")[0] ?? "") ?>" alt="<?= esc_attr(get_bloginfo("name")) ?>">
			<div class="footer__menu">
				<?php wp_nav_menu([
					"theme_location" => "menu-footer",
					"menu_id" => "footer-menu",
					"container" => "",
					"items_wrap" => '%3$s',
					"link_class" => "inline-flex uppercase items-center border-b-2 border-transparent px-5  pt-1 text-sm font-medium text-gray-500",
					"walker" => new Tailwind_Walker(),
				]); ?>
			</div>
			<p class="mt-8 text-xs leading-5 text-gray-500 md:order-1 md:mt-0"><?= get_theme_mod('obsidianlab_copyright_text') ?></p>

		</div>
	</div>
</footer>
<!-- #colophon -->