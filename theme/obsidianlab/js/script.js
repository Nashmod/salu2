// eslint-disable-next-line no-undef
jQuery(document).ready(function ($) {
	$(document).ready(function ($) {
		$("input[data-input-type]").on("input change", function () {
			var val = $(this).val();
			$(this).prev(".cs-range-value").html(val);
			$(this).val(val);
		});
	});
	if ($("body").hasClass("home")) {
		$("body").addClass("dark__header__mode");
		$(document).scroll(function () {
			var $nav = $("#nav_menu");
			$nav.toggleClass("nav__scrolled", $(this).scrollTop() > $nav.height());
		});
	}

	$('[aria-controls="mobile-menu"]').on("click", function () {
		$("#mobile-menu").toggleClass("h-0 nav__expanded");
	});
});

document.addEventListener("DOMContentLoaded", function () {
	const slider = document.querySelectorAll(".h-item-slider");

	slider.forEach((slider) => {
		let isDown = false;
		let startX;
		let scrollLeft;

		slider.addEventListener("mousedown", (e) => {
			isDown = true;
			slider.classList.add("active");
			startX = e.pageX - slider.offsetLeft;
			scrollLeft = slider.scrollLeft;
		});
		slider.addEventListener("mouseleave", () => {
			isDown = false;
			slider.classList.remove("active");
		});
		slider.addEventListener("mouseup", () => {
			isDown = false;
			slider.classList.remove("active");
		});
		slider.addEventListener("mousemove", (e) => {
			if (!isDown) return;
			e.preventDefault();
			const x = e.pageX - slider.offsetLeft;
			const walk = (x - startX) * 3; //scroll-fast
			slider.scrollLeft = scrollLeft - walk;
		});
	});
});
