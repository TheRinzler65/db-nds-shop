function sortTable(col) {
  const table = document.getElementById("gameTable");
  const rows = Array.from(table.tBodies[0].rows);
  const isAsc = table.dataset.sortCol == col && table.dataset.sortDir === "asc";

  const isDateColumn = col === 4;

  rows.sort((a, b) => {
    let valA = a.cells[col].innerText.trim();
    let valB = b.cells[col].innerText.trim();

    if (isDateColumn) {
      valA = parseFrenchDate(valA);
      valB = parseFrenchDate(valB);
      return (valA - valB) * (isAsc ? -1 : 1);
    } else {
      return valA.localeCompare(valB) * (isAsc ? -1 : 1);
    }
  });

  table.tBodies[0].append(...rows);
  table.dataset.sortCol = col;
  table.dataset.sortDir = isAsc ? "desc" : "asc";
}

function parseFrenchDate(str) {
  // Ex: "9 août 2025" → Date
  const months = {
    janvier: 0,
    février: 1,
    mars: 2,
    avril: 3,
    mai: 4,
    juin: 5,
    juillet: 6,
    août: 7,
    septembre: 8,
    octobre: 9,
    novembre: 10,
    décembre: 11,
  };
  const [day, month, year] = str.split(" ");
  return new Date(parseInt(year), months[month.toLowerCase()], parseInt(day));
}
