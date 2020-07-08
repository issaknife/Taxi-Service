import { generateTableRow } from './generateTableRow.js';

export function addComment(e) {
	const formData = new FormData(e.target);

	fetch(`../../api/add.php`, {
		method: 'POST',
		body: formData,
	})
		.then(res => res.json())
		.then(data => {
			if (!data.fields) {
				const table = document.querySelector('.comment_table');
				table.append(generateTableRow(data));
				e.target[0].value = '';
				e.target.prepend(createMessage('', 'success'));
			} else {
				e.target.prepend(createMessage(data.fields.text.error, 'error', false));
			}
		});
}

function createMessage(errMessage, messageClass, success = true) {
	let message = document.querySelector('.message');
	if (document.querySelector('.message')) message.remove();

	message = document.createElement('span');
	message.classList.add('message');
	message.classList.add(messageClass);
	if (success) {
		message.textContent = 'Successfully added a comment';
	} else {
		message.textContent = errMessage;
	}
	return message;
}
