$(document).ready(function () {
    $("#DataTableUserHistory").DataTable({
        responsive: true,
        scrollX: true,
        autoWidth: false,
        searching: true,
        order: [[0, "desc"]],
        columnDefs: [
            { width: "15%", targets: 0 }, // Full Name
            { width: "10%", targets: 1 }, // Position
            { width: "15%", targets: 2 }, // Email
            { width: "12%", targets: 3 }, // Phone Number
            { width: "18%", targets: 4 }, // Address
            { width: "10%", targets: 5 }, // Action
        ],
    });

    // inisalisasi untuk fitur search berdasarkan posisi
    const table = $("#DataTableUserHistory").DataTable();

    const filterSelect = document.getElementById("filterPosition");
    filterSelect.addEventListener("change", (e) => {
        const selectedValue = e.target.value;

        // Mencari index kolom dengan nama "Position" di DataTables
        const posisiIndex = table
            .columns()
            .eq(0)
            .filter(function (colIdx) {
                return (
                    table.column(colIdx).header().textContent.trim() ===
                    "Position"
                );
            })[0];

        if (posisiIndex !== undefined) {
            table.column(posisiIndex).search(selectedValue).draw();
        } else {
            console.warn("Column 'Position' not found!");
        }
    });
});
