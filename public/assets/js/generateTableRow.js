export function generateTableRow(item) {
	const tr = document.createElement('tr');
	const td1 = document.createElement('td');
	const td2 = document.createElement('td');
	const td3 = document.createElement('td');
	td1.textContent = item.name;
	td2.textContent = item.text;
	td3.textContent = item.date;

	tr.append(td1, td2, td3);
	return tr;
}
