const fileForm = document.getElementById('fileForm');

function showForm(event) {
	event.preventDefault();
	fileForm.classList.toggle('hide');
}

function trSelect(event) {
	event.currentTarget.classList.toggle('selected');

	console.log(event.target);
	console.log(event.currentTarget);
}