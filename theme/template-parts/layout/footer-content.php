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

<footer class="bg-white px-2 sm:px-0" aria-labelledby="footer-heading">
	<h2 id="footer-heading" class="sr-only">Footer</h2>

	<div class="mx-auto max-w-7xl md:px-6 pb-8 lg:px-8 ml-auto">
		<div class="footer__grid md:grid md:grid-cols-9 md:gap-8 md:pt-20">
			<div></div>
			<div class="col-span-2 mt-10 md:mt-0 ml-auto">
				<?php if (is_active_sidebar('footer-one')) : ?>
					<aside class="w-fit" role="complementary" aria-label="<?php esc_attr_e('Footer one', 'westpuntcarrental'); ?>">
						<?php dynamic_sidebar('footer-one'); ?>
					</aside>
				<?php endif; ?>
			</div>
			<div class="col-span-2 mt-10 md:mt-0 ml-auto">
				<?php if (is_active_sidebar('footer-two')) : ?>
					<aside class="w-fit" role="complementary" aria-label="<?php esc_attr_e('Footer two', 'westpuntcarrental'); ?>">
						<?php dynamic_sidebar('footer-two'); ?>
					</aside>
				<?php endif; ?>
			</div>
			<div class="col-span-2 ml-auto mt-10 md:mt-0">
				<?php if (is_active_sidebar('footer-three')) : ?>
					<aside class="w-fit" role="complementary" aria-label="<?php esc_attr_e('Footer three', 'westpuntcarrental'); ?>">
						<?php dynamic_sidebar('footer-three'); ?>
					</aside>
				<?php endif; ?>
			</div>
			<div class="col-span-2 mt-10 md:mt-0 ml-auto">
				<?php if (is_active_sidebar('footer-four')) : ?>
					<aside class="w-fit" role="complementary" aria-label="<?php esc_attr_e('Footer four', 'westpuntcarrental'); ?>">
						<?php dynamic_sidebar('footer-four'); ?>
					</aside>
				<?php endif; ?>
			</div>
		</div>
		<div class="mt-16 border-t border-gray-900/10 xl:grid xl:grid-cols-6 xl:gap-8 pt-8 text-right">
			<a href="<?= esc_url(home_url("/")) ?>" title="<?= esc_attr(get_bloginfo("name")) ?>">
				<img id="site_logo" class="block h-12 w-auto opacity-40" src="<?= esc_url(wp_get_attachment_image_src(get_theme_mod("custom_logo"), "full")[0] ?? "") ?>" alt="<?= esc_attr(get_bloginfo("name")) ?>">
				<img id="site_logo_dark" class="hidden h-12 w-auto" src="<?= esc_url(get_theme_mod("logo_dark")) ?>" alt="<?= esc_attr(get_bloginfo("name")) ?>">
			</a>
			<div></div>
			<div class="mt-16 grid grid-cols-1 gap-8 xl:col-span-4 xl:mt-0">
				<div class="footer__grid md:auto-rows-auto grid md:gap-8 text-right md:justify-items-end">
					<?php wp_nav_menu([
						"theme_location" => "menu-footer",
						"menu_id" => "footer-menu",
						"container" => "",
						"items_wrap" => '%3$s',
						"link_class" => "w-fit col-span-4 md:col-span-1 row-span-1 sm:text-right text-[0.75rem] font-semibold leading-6 text-gray-900",
						"walker" => new Tailwind_Walker(),
					]); ?>
				</div>
			</div>
		</div>

		<div class="mt-8 border-t border-gray-900/10 pt-8 md:flex md:items-center md:justify-between">
			<div class="flex space-x-6 md:order-2">
				<a class="text-[0.75rem] leading-6 text-gray-900">Privacy Policy</a>
				<a class="text-[0.75rem] leading-6 text-gray-900">Cookie Notice</a>
			</div>
			<p class="mt-8 text-xs leading-5 text-gray-500 md:order-1 md:mt-0"><?= get_theme_mod('obsidianlab_copyright_text') ?></p>
		</div>
	</div>
</footer>