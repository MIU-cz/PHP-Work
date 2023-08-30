const fileForm = document.getElementById('fileForm');

function showForm(event) {
	event.preventDefault();
	fileForm.classList.toggle('hide');
}