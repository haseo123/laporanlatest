document.addEventListener('DOMContentLoaded', function () {
    const excelData = [
        { Location: 'Location 1', Area: 'Area A', Zone: 'Zone 1', DUN: 'DUN 1', Parliament: 'Parliament 1' },
        { Location: 'Location 2', Area: 'Area B', Zone: 'Zone 2', DUN: 'DUN 2', Parliament: 'Parliament 2' },
        { Location: 'Location 3', Area: 'Area C', Zone: 'Zone 3', DUN: 'DUN 3', Parliament: 'Parliament 3' }
        // Add more data as needed
    ];

    const tableBody = document.getElementById('excelData');

    excelData.forEach(rowData => {
        const row = document.createElement('tr');
        Object.values(rowData).forEach(value => {
            const cell = document.createElement('td');
            cell.textContent = value;
            row.appendChild(cell);
        });
        tableBody.appendChild(row);
    });
});
