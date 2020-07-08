import { generateTableRow } from './generateTableRow.js';
import { addComment } from './addComment.js';

const commentsBlock = document.querySelector('.comments-block');
const commentForm = document.querySelector('.comment_form');
if (commentForm) {
	commentForm.addEventListener('submit', e => {
		e.preventDefault();
		addComment(e);
	});
}

fetch('../../api/get.php')
	.then(res => res.json())
	.then(data => createTable(data));

function createTable(data) {
	const table = document.createElement('table');
	table.classList.add('comment_table');

	const headings = ['Name', 'Comment', 'Date'];
	const thead = document.createElement('thead');
	const tr = document.createElement('tr');
	for (let heading of headings) {
		const td = document.createElement('td');
		td.textContent = heading;
		tr.append(td);
	}
	thead.append(tr);
	table.append(thead);

	data.forEach(item => {
		table.append(generateTableRow(item));
	});

	commentsBlock.append(table);
}
