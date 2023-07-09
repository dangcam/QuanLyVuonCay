
let myHeader = [];
let myFooter = [];

async function export_excel(title_group,title_month_year,title_report,myData){
	const title = {
		border: false,
		height: 35,
		font: { name: 'Times New Roman',size: 12, bold: true},
		alignment: { horizontal: 'center', vertical: 'middle' , wrapText: true},
	};
	const header = {
		border: true,
		font: {  name: 'Times New Roman', size: 12, bold: true },
		alignment: { horizontal: 'center', vertical: 'middle', wrapText: true },
	};
	const data = {
		border: true,
		font: { name: 'Times New Roman',size: 12, bold: false },
		alignment: { horizontal: 'center', vertical: 'middle', wrapText: true },
		fill: null,
	};
	let wb = new ExcelJS.Workbook();
	let ws = wb.addWorksheet('Export');
	widths = [{ width: 5 },{ width: 25 },{ width: 10 },{ width: 7 },{ width: 7 },{ width: 10 },{ width: 10 },{ width: 10 },
				{ width: 7 },{ width: 10 },{ width: 10 },{ width: 10 },{ width: 7 },{ width: 10 },];
	ws.columns = widths;
	// Tiêu đề
	let row = ws.addRow();
	mergeCells(ws, row, 1, 7);
	row.getCell(1).value = title_report+"\n"+title_group;
	mergeCells(ws, row, 8, 14);
	row.getCell(8).value = "CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM\nĐộc lập - Tự do - Hạnh phúc";
	set_section_row(row,title);
	row = ws.addRow();
	mergeCells(ws, row, 1, 14);
	row.getCell(1).value = "BIỂU TỔNG HỢP CÔNG TÁC TIẾP NHẬN VÀ GIẢI QUYẾT HỒ SƠ ĐẤT ĐAI";
	set_section_row(row,title);
	row.font = {name: 'Times New Roman', size: 14, bold: true};
	row.alignment = {horizontal: 'center',vertical:'bottom'}
	row = ws.addRow();
	mergeCells(ws, row, 1, 14);
	row.getCell(1).value = title_month_year;
	row.font = {name: 'Times New Roman', size: 12, italic: true, bold: true};
	row.alignment = { horizontal: 'center', vertical: 'middle' , wrapText: true};
	// header
	row_header(ws,'A4:A6','A4','STT',header);
	row_header(ws,'B4:B6','B4','Tên',header);

	row_header(ws,'C4:F4','C4','Số hồ sơ tiếp nhận',header);
	row_header(ws,'C5:C6','C5','Kỳ trước chuyển sang',header);
	row_header(ws,'D5:E5','D5','Tiếp nhận\ntrong kỳ',header);
	row_header(ws,'D6:D6','D6','Trực tiếp',header);
	row_header(ws,'E6:E6','E6','Trực tuyến',header);
	row_header(ws,'F5:F6','F5','Cộng',header);

	row_header(ws,'G4:J4','G4','Đã giải quyết',header);
	row_header(ws,'G5:G6','G5','Tổng số',header);
	row_header(ws,'H5:H6','H5','Trước và trong hạn',header);
	row_header(ws,'I5:I6','I5','Trễ hạn',header);
	row_header(ws,'J5:J6','J5','Tỷ lệ trễ hạn (%)',header);

	row_header(ws,'K4:N4','K4','Đang giải quyết',header);
	row_header(ws,'K5:K6','K5','Tổng số',header);
	row_header(ws,'L5:L6','L5','Trong hạn',header);
	row_header(ws,'M5:M6','M5','Trễ hạn',header);
	row_header(ws,'N5:N6','N5','Tỷ lệ quá hạn (%)',header);
	//
	const rowValues = [];
	let i = 0;
	myData.forEach((rowData) => {
		rowValues[2] = rowData['row_name'];
		rowValues[3] = rowData['value1_1'];
		rowValues[4] = rowData['value1_2'];
		rowValues[5] = rowData['value1_3'];
		rowValues[6] = rowData['value1_total'];
		rowValues[7] = rowData['value2_total'];
		rowValues[8] = rowData['value2_1'];
		rowValues[9] = rowData['value2_2'];
		rowValues[10] = rowData['value2_per'];
		rowValues[11] = rowData['value3_total'];
		rowValues[12] = rowData['value3_1'];
		rowValues[13] = rowData['value3_2'];
		rowValues[14] = rowData['value3_per'];
		i++;
		if(rowData['row_parent'] == 1){
			rowValues[1] = rowData['row_id'];
			addRow(ws,rowValues,header);
			i = 0;
		}else {
			rowValues[1] = i;
			addRow(ws,rowValues,data);
		}


	});
	//
	const buf = await wb.xlsx.writeBuffer();
	saveAs(new Blob([buf]), `${title_group}_${title_month_year}.xlsx`);
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
