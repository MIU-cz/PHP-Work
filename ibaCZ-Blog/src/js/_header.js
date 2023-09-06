function showDropItems(event, key) {
	event.preventDefault();

	const dropItems = document.querySelector('[name=' + key + ']');
	dropItems.classList.toggle('hide');

	dropItems.addEventListener('mouseleave', (e) => {
		e.target.classList.add('hide');
	});
}