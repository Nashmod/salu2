<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package obsidianlab
 */

use ObsidianLab\Tailwind_Walker;
?>

<!-- #site-navigation -->

<header id="nav_menu" class="fixed top-0 z-50 w-full">
	<nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
		<div class="flex flex-1">
			<div class="hidden lg:flex lg:gap-x-12">
				<?php wp_nav_menu([
					"theme_location" => "menu-header",
					"menu_id" => "header-menu",
					"container" => "",
					"items_wrap" => '%3$s',
					"link_class" => "text-sm font-semibold leading-6 text-gray-900",
					"walker" => new Tailwind_Walker(),
				]); ?>
			</div>
		</div>
		<a href="#" class="-m-1.5 p-1.5">
			<a href="<?= esc_url(home_url("/")) ?>" title="<?= esc_attr(get_bloginfo("name")) ?>">
				<img id="site_logo" class="block h-12 w-auto" src="<?= esc_url(wp_get_attachment_image_src(get_theme_mod("custom_logo"), "full")[0] ?? "") ?>" alt="<?= esc_attr(get_bloginfo("name")) ?>">
				<img id="site_logo_dark" class="hidden h-12 w-auto" src="<?= esc_url(get_theme_mod("logo_dark")) ?>" alt="<?= esc_attr(get_bloginfo("name")) ?>">
			</a>
		</a>
		<div class="flex flex-1 justify-end">
			<a href="/" class="hidden lg:inline-block px-10 py-3 text-sm font-semibold focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 ml-auto w-40 rounded-full bg-[#ffffff] text-[#000A44] shadow-sm hover:bg-[#C5E6ED]">Contact Us</a>
		</div>
		<div class="flex lg:hidden">
			<button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700" aria-controls="mobile-menu">
				<span class="sr-only">Open main menu</span>
				<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
					<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
				</svg>
			</button>
		</div>
	</nav>
	<!-- Mobile menu, show/hide based on menu open state. -->
	<div class="lg:hidden" role="dialog" aria-modal="true">
		<!-- Background backdrop, show/hide based on slide-over state. -->
		<div id="mobile-menu" class="fixed inset-y-0 left-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 -translate-y-full transition-all ease-linear duration-300">
			<div class="flex items-center justify-between">
				<div class="flex flex-1">

					<a href="#" class="text-sm font-semibold leading-6 text-gray-900">Contact us</span></a>

				</div>
				<a href="#" class="-m-1.5 p-1.5">
					<a href="<?= esc_url(home_url("/")) ?>" title="<?= esc_attr(get_bloginfo("name")) ?>">
						<img id="site_logo" class="block h-12 w-auto" src="<?= esc_url(wp_get_attachment_image_src(get_theme_mod("custom_logo"), "full")[0] ?? "") ?>" alt="<?= esc_attr(get_bloginfo("name")) ?>">
						<img id="site_logo_dark" class="hidden h-12 w-auto" src="<?= esc_url(get_theme_mod("logo_dark")) ?>" alt="<?= esc_attr(get_bloginfo("name")) ?>">
					</a>
				</a>
				<div class="flex flex-1 justify-end">
					<button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700" aria-controls="mobile-menu">
						<span class="sr-only">Close menu</span>
						<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
						</svg>
					</button>
				</div>
			</div>
			<div class="mt-6 space-y-2">
				<?php wp_nav_menu([
					"theme_location" => "menu-header",
					"menu_id" => "header-menu",
					"container" => "",
					"items_wrap" => '%3$s',
					"link_class" => "-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50",
					"walker" => new Tailwind_Walker(),
				]); ?>
			</div>
		</div>
	</div>
</header>