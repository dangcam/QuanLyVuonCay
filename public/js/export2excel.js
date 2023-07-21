
let myHeader = [];
let myFooter = [];

async function export_excel(line_year,worker,myData){
	const title = {
		border: false,
		height: 35,
		font: { name: 'Times New Roman',size: 12, bold: true},
		alignment: { horizontal: 'left', vertical: 'middle' , wrapText: true},
	};
	const header = {
		border: true,
		height: 20,
		font: {  name: 'Times New Roman', size: 12, bold: true },
		alignment: { horizontal: 'center', vertical: 'middle', wrapText: true },
	};
	const data = {
		border: true,
		height: 20,
		font: { name: 'Times New Roman',size: 12, bold: false },
		alignment: { horizontal: 'center', vertical: 'middle', wrapText: true },
		fill: null,
	};
	let wb = new ExcelJS.Workbook();
	let ws = wb.addWorksheet('Export');
	widths = [{ width: 25 },{ width: 15 },{ width: 15 },{ width: 15 },{ width: 15 },{ width: 15 }];
	ws.columns = widths;
	// Tiêu đề
	let row = ws.addRow();
	mergeCells(ws, row, 1, 6);
	row.getCell(1).value = "Năm cạo: "+line_year;
	set_section_row(row,title);
	row = ws.addRow();
	mergeCells(ws, row, 1, 6);
	row.getCell(1).value = "Công nhân: "+worker;
	set_section_row(row,title);


	// header
	row_header(ws,'A3:A3','A3','Vườn cây',header);
	row_header(ws,'B3:B3','B3','Hàng cây',header);
	row_header(ws,'C3:C3','C3','Cây cạo',header);
	row_header(ws,'D3:D3','D3','Cây không cạo',header);
	row_header(ws,'E3:E3','E3','Hố trống',header);
	row_header(ws,'F3:F3','F3','Tổng',header);


	//
	const rowValues = [];
	for(let i =1; i<myData.length; i++)
	{
		addRow(ws,myData[i],data);
	}
	addRow(ws,myData[0],header);
	/*
	myData.forEach((rowData) => {
		rowValues[1] = rowData[1];
		rowValues[2] = rowData[2];
		rowValues[3] = rowData[3];
		rowValues[4] = rowData[4];
		rowValues[5] = rowData[5];
		rowValues[6] = rowData[6];
		i++;
		if(rowData['0'] == 'Tổng cộng'){
			addRow(ws,rowValues,header);
			i = 0;
		}else {
			addRow(ws,rowValues,data);
		}

	});*/
	//
	const buf = await wb.xlsx.writeBuffer();
	saveAs(new Blob([buf]), `${line_year}_${worker}.xlsx`);
}
function row_header(ws,merCell,mcell,value,section){
	ws.mergeCells(merCell);
	ws.getCell(mcell).value = value;
	let cell = ws.getCell(mcell);
	cell.width = 100;
	set_section_row(cell,section);
}
async function exportToExcel(fileName, sheetName, report,myData) {
	if (!myData || myData === 0) {
		console.error('Chưa có data');
		return;
	}
	console.log('exportToExcel', myData);

	if (report !== '') {
		myHeader = ['Tên', 'Họ', 'Email', 'Phone', 'Income'];
		exportToExcelPro('Users', 'Users', report, myHeader, myFooter, [
			{ width: 15 },
			{ width: 15 },
			{ width: 30 },
			{ width: 20 },
			{ width: 20 },
		],myData);
		return;
	}

	const wb = new ExcelJS.Workbook();
	const ws = wb.addWorksheet(sheetName);
	const header = Object.keys(myData[0]);
	console.log('header', header);
	ws.addRow(header);
	myData.forEach((rowData) => {
		console.log('rowData', rowData);
		row = ws.addRow(Object.values(rowData));
	});

	const buf = await wb.xlsx.writeBuffer();
	saveAs(new Blob([buf]), `${fileName}.xlsx`);
}

async function exportToExcelPro(
	fileName,
	sheetName,
	report,
	myHeader,
	myFooter,
	widths,
	myData
) {
	if (!myData || myData.length === 0) {
		console.error('Chưa có data');
		return;
	}
	console.log('exportToExcel', myData);

	const wb = new ExcelJS.Workbook();
	const ws = wb.addWorksheet(sheetName);
	const columns = myHeader?.length;
	const title = {
		border: true,
		money: false,
		height: 100,
		font: { size: 30, bold: false, color: { argb: 'FFFFFF' } },
		alignment: { horizontal: 'center', vertical: 'middle' },
		fill: {
			type: 'pattern',
			pattern: 'solid', //darkVertical
			fgColor: {
				argb: '0000FF',
			},
		},
	};
	const header = {
		border: true,
		money: false,
		height: 70,
		font: { size: 15, bold: false, color: { argb: 'FFFFFF' } },
		alignment: { horizontal: 'center', vertical: 'middle' },
		fill: {
			type: 'pattern',
			pattern: 'solid', //darkVertical
			fgColor: {
				argb: 'FF0000',
			},
		},
	};
	const data = {
		border: true,
		money: true,
		height: 0,
		font: { size: 12, bold: false, color: { argb: '000000' } },
		alignment: null,
		fill: null,
	};
	const footer = {
		border: true,
		money: true,
		height: 70,
		font: { size: 15, bold: true, color: { argb: 'FFFFFF' } },
		alignment: null,
		fill: {
			type: 'pattern',
			pattern: 'solid', //darkVertical
			fgColor: {
				argb: '0000FF',
			},
		},
	};
	if (widths && widths.length > 0) {
		ws.columns = widths;
	}

	let row = addRow(ws, [report], title);
	mergeCells(ws, row, 1, columns);

	addRow(ws, myHeader, header);
	// console.log('wb', wb);
	myData.forEach((row) => {
		addRow(ws, Object.values(row), data);
	});
	// console.log('myFooter', myFooter);

	row = addRow(ws, myFooter, footer);
	mergeCells(ws, row, 1, columns - 1);

	const buf = await wb.xlsx.writeBuffer();
	saveAs(new Blob([buf]), `${fileName}.xlsx`);
}

function addRow(ws, data, section) {
	const borderStyles = {
		top: { style: 'thin' },
		left: { style: 'thin' },
		bottom: { style: 'thin' },
		right: { style: 'thin' },
	};
	const row = ws.addRow(data);
	console.log('addRow', section, data);
	row.eachCell({ includeEmpty: true }, (cell, colNumber) => {
		if (section?.border) {
			cell.border = borderStyles;
		}
		if (typeof cell.value === 'number') {
			cell.alignment = { horizontal: 'right', vertical: 'middle' };
		}
		if (section?.alignment) {
			cell.alignment = section.alignment;
		} else {
			cell.alignment = { vertical: 'middle' };
		}
		if (section?.font) {
			cell.font = section.font;
		}
		if (section?.fill) {
			cell.fill = section.fill;
		}
	});
	if (section?.height > 0) {
		row.height = section.height;
	}
	return row;
}
function set_section_row(row, section) {
	const borderStyles = {
		top: { style: 'thin' },
		left: { style: 'thin' },
		bottom: { style: 'thin' },
		right: { style: 'thin' },
	};
	if (section?.border) {
		row.border = borderStyles;
	}
	if (section?.alignment) {
		row.alignment = section.alignment;
	} else {
		row.alignment = { vertical: 'middle' };
	}
	if (section?.font) {
		row.font = section.font;
	}
	if (section?.fill) {
		row.fill = section.fill;
	}
	if (section?.height > 0) {
		row.height = section.height;
	}
	return row;
}

function mergeCells(ws, row, from, to) {
	ws.mergeCells(`${row.getCell(from)._address}:${row.getCell(to)._address}`);
}

function columnToLetter(column) {
	var temp,
		letter = '';
	while (column > 0) {
		temp = (column - 1) % 26;
		letter = String.fromCharCode(temp + 65) + letter;
		column = (column - temp - 1) / 26;
	}
	return letter;
}
