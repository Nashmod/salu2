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
<nav id="nav_menu" class="fixed w-full top-0 z-50 transition-all ease-in duration-300">
	<div class="mx-auto max-w-7xl py-2 px-4 sm:px-6 lg:px-8">
		<div class="flex h-16 justify-between">
			<div class="flex">
				<div class="-ml-2 mr-2 flex items-center md:hidden">
					<!-- Mobile menu button -->
					<button type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-controls="mobile-menu" aria-expanded="false">
						<span class="sr-only">Open main menu</span>
						<!--
              Icon when menu is closed.

              Menu open: "hidden", Menu closed: "block"
            -->
						<svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
						</svg>
						<!--
              Icon when menu is open

              Menu open: "block", Menu closed: "hidden"
            -->
						<svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
						</svg>
					</button>
				</div>
				<div class="flex flex-shrink-0 items-center">
					<a href="<?= esc_url(home_url("/")) ?>" title="<?= esc_attr(get_bloginfo("name")) ?>">
						<img id="site_logo" class="block h-12 w-auto" src="<?= esc_url(wp_get_attachment_image_src(get_theme_mod("custom_logo"), "full")[0] ?? "") ?>" alt="<?= esc_attr(get_bloginfo("name")) ?>">
						<img id="site_logo_dark" class="hidden h-12 w-auto" src="<?= esc_url(get_theme_mod("logo_dark")) ?>" alt="<?= esc_attr(get_bloginfo("name")) ?>">
					</a>
				</div>
			</div>
			<div class="flex items-center space-x-4">
				<div class="hidden md:ml-6 md:flex md:space-x-8">

					<?php wp_nav_menu([
						"theme_location" => "menu-header",
						"menu_id" => "header-menu",
						"container" => "",
						"items_wrap" => '%3$s',
						"link_class" => "inline-flex uppercase items-center border-b-2 border-transparent px-1 pt-1 text-sm font-medium text-gray-500",
						"walker" => new Tailwind_Walker(),
					]); ?>
				</div>
				<div class="flex-shrink-0">
					<button type="button" class="relative inline-flex items-center gap-x-1.5 rounded-full bg-[#C5E6ED] px-10 py-3 text-sm font-semibold text-[#000A44] shadow-sm hover:bg-[#C5E6ED] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">
						<?= _e("SHOP NOW", "obsidianlab") ?>
					</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Mobile menu, show/hide based on menu state. -->
	<div class="md:hidden" id="mobile-menu">
		<div class="space-y-1 pt-2 pb-3">
			<!-- Current: "bg-indigo-50 border-indigo-500 text-indigo-700", Default: "border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700" -->
			<a href="#" class=" border-l-4 block border-indigo-500 bg-indigo-50 py-2 pl-3 pr-4 text-base font-medium text-indigo-700 sm:pl-5 sm:pr-6">Dashboard</a>
			<a href="#" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-500 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-700 sm:pl-5 sm:pr-6">Team</a>
			<a href="#" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-500 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-700 sm:pl-5 sm:pr-6">Projects</a>
			<a href="#" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-500 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-700 sm:pl-5 sm:pr-6">Calendar</a>
		</div>
	</div>
</nav>
<!-- #site-navigation -->