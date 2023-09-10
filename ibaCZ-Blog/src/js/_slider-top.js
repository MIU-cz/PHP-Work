const Slides = document.querySelectorAll('.slider_item_container'),
	Slider = document.querySelector('.slider_wraper'),
	allPagBtn = document.querySelector('.pag_btns'),
	pagBtn = document.querySelectorAll('.pagBtn');

console.log(Slides);
console.log(Slider);
console.log(allPagBtn);
console.log(pagBtn);
console.log(pagBtn[2]);


let item = 0;
let margin = window.getComputedStyle(Slider).getPropertyValue('gap');
let slideWidth = Slides[item].clientWidth + parseFloat(margin);

if (window.matchMedia('(min-width: 1200px)').matches) {
	pagBtn.forEach(btn => {
		btn.classList.remove('active');
		btn.disabled = true;
	});
	pagBtn[item].classList.add('active');
}

function moveSlider(item) {
	Slider.style.transform = `translateX(${-1 * item * slideWidth}px)`;
	pagBtn.forEach(btn => {
		btn.classList.remove('active');
		btn.disabled = false;
	});

	pagBtn[item].classList.add('active');
	pagBtn[item].disabled = true;
}

allPagBtn.addEventListener('click', function (e) {
	item = e.target.dataset.slide;
	moveSlider(item);
	console.log(item);
});