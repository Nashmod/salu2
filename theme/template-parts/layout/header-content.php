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
<nav class="py-4">
	<div class="mx-auto max-w-full lg:max-w-[95%] 2lg:ax-w-[85%] xl:max-w-[1280px] px-4 sm:px-6 lg:px-8">
		<div class="flex h-28 justify-between border-b-[1px] border-white px-4 md:px-16 pb-6">
			<div class="flex flex-1 justify-between lg:flex-auto lg:justify-start lg:gap-8 xl:gap-20">
				<div class="flex flex-shrink-0 items-center">
					<a href="<?= esc_url(home_url("/")) ?>" title="<?= esc_attr(get_bloginfo("name")) ?>">
						<img id="site_logo" class="block h-24 w-auto" src="<?= esc_url(wp_get_attachment_image_src(get_theme_mod("custom_logo"), "full")[0] ?? "") ?>" alt="<?= esc_attr(get_bloginfo("name")) ?>">
						<img id="site_logo_dark" class="hidden h-24 w-auto" src="<?= esc_url(get_theme_mod("logo_dark")) ?>" alt="<?= esc_attr(get_bloginfo("name")) ?>">
					</a>
				</div>
				<div class="-ml-2 mr-2 flex items-center lg:hidden">
					<!-- Mobile menu button -->
					<button id="nav__btn" type="button" class="inline-flex items-center justify-center rounded-md p-2 text-white hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-[#161d44]" aria-controls="mobile-menu" aria-expanded="false">
						<span class="sr-only">Open main menu</span>
						<!--
              Icon when menu is closed.

              Menu open: "hidden", Menu closed: "block"
            -->
						<svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
						</svg>
						<!--
              Icon when menu is open.

              Menu open: "block", Menu closed: "hidden"
            -->
						<svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
						</svg>
					</button>
				</div>
				<div class="hidden lg:flex md:space-x-8">
					<?php wp_nav_menu([
						"theme_location" => "menu-header",
						"menu_id" => "header-menu",
						"container" => "",
						"items_wrap" => '%3$s',
						"link_class" => "inline-flex items-center px-1 pt-1 text-lg font-medium text-white",
						"walker" => new Tailwind_Walker(),
					]); ?>
				</div>
			</div>
			<div class="hidden lg:flex items-center">
				<div class="flex flex-shrink-0 gap-4">
					<a href="/ao-registration" class="relative inline-flex items-center gap-x-1.5 rounded-md bg-[#7DCAAC] px-4 py-2 xl:px-6 xl:py-4 text-sm text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
						AO Registration
					</a>
					<a href="/medical" class="relative inline-flex items-center gap-x-1.5 rounded-md bg-[#E4700E] px-3 py-2 text-sm text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">

						Upload Medical Info
					</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Mobile menu, show/hide based on menu state. -->
	<div class="transition-all duration-300 ease-in-out overflow-hidden h-0 lg:hidden" id="mobile-menu">
		<div class="space-y-1 pb-3 pt-2">
			<?php wp_nav_menu([
				"theme_location" => "menu-header",
				"menu_id" => "header-menu",
				"container" => "",
				"items_wrap" => '%3$s',
				"link_class" => "block !border-l-0 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-500 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-700 sm:pl-5 sm:pr-6",
				"walker" => new Tailwind_Walker(),
			]); ?>
			<a href="/ao-registration" class="block !border-l-0 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-500 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-700 sm:pl-5 sm:pr-6">AO Registration</a>
			<a href="/medical" class="block !border-l-0 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-500 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-700 sm:pl-5 sm:pr-6">Upload Medical Info</a>
		</div>
	</div>
</nav>