const fileForm = document.getElementById('fileForm');

function showForm(event) {
	event.preventDefault();
	fileForm.classList.toggle('hide');
}

function trSelect(event) {
	event.target.classList.toggle('selected');
}