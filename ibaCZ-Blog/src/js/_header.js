const headerBtns = document.getElementById('headerBtns');

headerBtns.addEventListener('click', (e) => {
	e.stopPropagation();
	const Btn = e.target;
	const Container = document.getElementById(Btn.name);
	Container.classList.toggle('hide');
	Btn.classList.toggle('active');

	if (Container.id !== 'searchContainer') {
		Container.addEventListener('mouseleave', () => {
			Container.classList.add('hide');
			Btn.classList.remove('active');
		});
	}
})



// # main navBar Menu
// ===================
function showDropItems(event, key) {
	event.preventDefault();

	const dropItems = document.querySelector('[name=' + key + ']');
	dropItems.classList.toggle('hide');

	dropItems.addEventListener('mouseleave', () => {
		dropItems.classList.add('hide');
	});
}