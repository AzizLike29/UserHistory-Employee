// Definisikan objek "selectCity" yang menyimpan daftar kota untuk setiap provinsi
const selectCity = {
    "Jawa Barat": ["Bandung", "Bogor", "Depok", "Bekasi", "Cimahi"],
    "Jawa Tengah": ["Semarang", "Solo", "Magelang", "Salatiga", "Tegal"],
    "Jawa Timur": ["Surabaya", "Malang", "Banyuwangi", "Madiun", "Probolinggo"],
};

document.getElementById("province").addEventListener("change", (e) => {
    const province = e.target.value;
    const citySelect = document.getElementById("city");

    // Kosongkan pilihan kota default
    citySelect.innerHTML =
        "<option value='' selected disabled>-- Select City --</option>";

    // Jika ada kota dari provinsi yang dipilih, otomatis kota langsung ada
    if (selectCity[province]) {
        selectCity[province].forEach((city) => {
            const optionCity = document.createElement("option");
            optionCity.value = city;
            optionCity.textContent = city;
            citySelect.appendChild(optionCity);
        });

        // Aktifkan kembali form select kota
        citySelect.disabled = false;
    }
});
