function filterTable() {
  const input = document.getElementById('searchInput');
  const filter = input.value.toUpperCase();
  const table = document.getElementById('adminTable');
  const rows = table.getElementsByTagName('tr');

  for (let i = 1; i < rows.length; i++) {
      const usernameCell = rows[i].getElementsByTagName('td')[0];
      if (usernameCell) {
          const username = usernameCell.textContent || usernameCell.innerText;
          if (filter === "" || username.toUpperCase() === filter) {
              rows[i].style.display = ""; // Show the row
          } else {
              rows[i].style.display = "none"; // Hide the row
          }
      }
  }
}