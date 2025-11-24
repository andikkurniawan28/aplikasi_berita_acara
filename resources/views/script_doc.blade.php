<script>

        function generatePage2Images() {
            const fileInput = document.getElementById("fileInput");
            const container = document.getElementById("previewDocPage2");

            if (!fileInput || !container) return;

            container.innerHTML = ""; // reset halaman 2

            if (fileInput.files.length === 0) {
                container.style.display = "none";
                return;
            }

            container.style.display = "block";

            let html = `
                <div style="text-align:center; margin-bottom:20px; margin-top:10px;">
                    <h4 style="text-align:center; margin-bottom:20px;">Lampiran</h4>
                </div>
                <table style="width:100%; border-collapse:collapse;">
            `;

            let col = 0;

            [...fileInput.files].forEach((file, index) => {
                const url = URL.createObjectURL(file);

                // Jika kolom ke-0 → buka baris baru
                if (col === 0) {
                    html += `<tr>`;
                }

                html += `
                    <td style="
                        width:50%;
                        padding:8px;
                        vertical-align:top;
                        page-break-inside:avoid;
                    ">
                        <img src="${url}"
                            style="
                                width:100%;
                                height:auto;
                                max-height:350px;
                                object-fit:contain;
                                border:1px solid #ccc;
                            ">
                    </td>
                `;

                col++;

                // Jika sudah 2 kolom → tutup baris
                if (col === 2) {
                    html += `</tr>`;
                    col = 0;
                }
            });

            // Jika jumlah gambar ganjil, tutup baris terakhir
            if (col === 1) {
                html += `<td style="width:50%;"></td></tr>`;
            }

            html += `</table>`;
            container.innerHTML = html;
        }

    function generatePreview() {

        // ==========================
        // 1. Ambil Data Dokumen & Kasus
        // ==========================
        const dok = document.getElementById('dokumen_id').selectedOptions[0];
        const kas = document.getElementById('kasus_id').selectedOptions[0];
        if (!dok || !kas) return;

        const judul = dok.dataset.judul;
        const nomorBase = dok.dataset.nomor_dokumen;
        const kepada = dok.dataset.kepada;
        const dari = dok.dataset.dari;
        const perihal = dok.dataset.perihal;
        const redaksiAwal = dok.dataset.redaksi_awal;
        const redaksiAkhir = dok.dataset.redaksi_akhir;
        const penutup = dok.dataset.penutup;
        const menyetujui = dok.dataset.menyetujui || dari;

        // Gunakan kronologi editable
        const kronologiInput = document.getElementById("inputKronologi")?.value || "";
        const finalRedaksi = `${redaksiAwal} ${kronologiInput} ${redaksiAkhir}`.replace(/\n/g, "<br>");

        // ==========================
        // 2. Buat Nomor Dokumen Final
        // ==========================
        const kodeNomor = document.getElementById('kodeNomorDokumen')?.value || "";
        const nomorFinal = nomorBase + kodeNomor;

        // ==========================
        // 3. Data Kendaraan & Material
        // ==========================
        const jenis_kendaraan = document.getElementById('jenis_kendaraan_id').selectedOptions[0]?.text || "-";
        const material = document.getElementById('material_id').selectedOptions[0]?.text || "-";

        // ==========================
        // 4. Input manual kendaraan
        // ==========================
        const nopol = document.getElementById('inputNopol')?.value || "-";
        const spta = document.getElementById('inputSPTA')?.value || "-";
        const timbang = document.getElementById('inputTimbangan')?.value || "-";
        const dox = document.getElementById('inputDO')?.value || "-";
        const angkut = document.getElementById('inputPengangkut')?.value || "-";

        // ==========================
        // 5. Data Penimbangan Awal
        // ==========================
        function formatDMY(dateStr) {
            if (!dateStr) return "-";
            const d = new Date(dateStr);
            const day = d.getDate();
            const month = d.getMonth() + 1; // bulan 0–11
            const year = d.getFullYear();
            return `${day}-${month}-${year}`;
        }

        const tglAwal = formatDMY(document.getElementById('tglMasukAwal')?.value);
        const brutoAwal = Number(document.getElementById('brutoAwal')?.value) || 0;
        const taraAwal = Number(document.getElementById('taraAwal')?.value) || 0;
        const rafAwal = Number(document.getElementById('rafaksiAwal')?.value) || 0;
        const nettoAwal = brutoAwal - taraAwal;
        const nettoAkhirAwal = nettoAwal - rafAwal;

        // ==========================
        // 6. Data Penimbangan Koreksi
        // ==========================
        const tglKoreksi = formatDMY(document.getElementById('tglMasukKoreksi')?.value);
        const brutoKoreksi = Number(document.getElementById('brutoKoreksi')?.value) || 0;
        const taraKoreksi = Number(document.getElementById('taraKoreksi')?.value) || 0;
        const rafKoreksi = Number(document.getElementById('rafaksiKoreksi')?.value) || 0;
        const nettoKoreksi = brutoKoreksi - taraKoreksi;
        const nettoAkhirKoreksi = nettoKoreksi - rafKoreksi;

        // ==========================
        // 7. Format Tanggal Dokumen
        // ==========================
        const tanggalDok = document.getElementById('tanggalDokumen')?.value;
        let tanggalFormatted = "-";

        if (tanggalDok) {
            const tgl = new Date(tanggalDok);
            tanggalFormatted = tgl.toLocaleDateString("id-ID", {
                day: "numeric",
                month: "long",
                year: "numeric"
            });
        }

        // ==========================
        // 8. RENDER PAGE 1
        // ==========================
        const page1 = `
        <div style="text-align:center; margin-bottom:10px; margin-top:5px;">
            <strong style="font-size:18px; text-transform:uppercase;">${judul}</strong><br>
            <div class="d-flex justify-content-center align-items-center mt-0">
                <span>${nomorFinal}</span>
            </div>
        </div>

        <table style="width:100%; margin-bottom:5px; margin-left:40px; margin-right:40px;">
            <tr><td style="width:140px;"><strong>Kepada Yth.</strong></td><td>: ${kepada}</td></tr>
            <tr><td><strong>Dari</strong></td><td>: ${dari}</td></tr>
            <tr><td><strong>Perihal</strong></td><td>: ${perihal}</td></tr>
        </table>

        <p style="margin-bottom:5px; margin-left:40px; margin-right:40px;">Dengan hormat,</p>

        <p style="text-align:justify; margin-left:40px; margin-right:40px;">${finalRedaksi}</p>

        <table style="width:100%; margin-top:5px; margin-left:40px; margin-right:40px;">
            <tr><td style="width:160px;"><strong>Nopol Kendaraan</strong></td><td>: ${nopol}</td></tr>
            <tr><td><strong>Jenis Kendaraan</strong></td><td>: ${jenis_kendaraan}</td></tr>
            <tr><td><strong>Material</strong></td><td>: ${material}</td></tr>
            <tr><td><strong>No SPTA</strong></td><td>: ${spta}</td></tr>
            <tr><td><strong>No Timbangan</strong></td><td>: ${timbang}</td></tr>
            <tr><td><strong>No DO</strong></td><td>: ${dox}</td></tr>
            <tr><td><strong>Pengangkut</strong></td><td>: ${angkut}</td></tr>
        </table>

        <h6 class="fw-bold mt-3 mb-0" style=" margin-left:40px; margin-right:40px;">Data Penimbangan</h6>
        <table style="width:90%; margin-left:40px; margin-right:40px;" border="1" cellpadding="1">
            <tr style="background:#f2f2f2; text-align:center;">
                <th style="width:220px;">Parameter</th>
                <th>Awal</th>
                <th>Koreksi</th>
            </tr>
            <tr><td><strong>Tanggal Masuk</strong></td><td>${tglAwal}</td><td>${tglKoreksi}</td></tr>
            <tr><td><strong>Bruto</strong></td><td>${brutoAwal} Kg</td><td>${brutoKoreksi} Kg</td></tr>
            <tr><td><strong>Tara</strong></td><td>${taraAwal} Kg</td><td>${taraKoreksi} Kg</td></tr>
            <tr><td><strong>Rafaksi</strong></td><td>${rafAwal} Kg</td><td>${rafKoreksi} Kg</td></tr>
            <tr><td><strong>Netto</strong></td><td>${nettoAkhirAwal} Kg</td><td>${nettoAkhirKoreksi} Kg</td></tr>
        </table>

        <p style="text-align:justify; margin-top:5px; margin-left:40px; margin-right:40px;">
            ${penutup.replace(/\n/g, "<br>")}
        </p>

        <div style="width:100%; display:flex; justify-content:flex-end; margin-top:5px;">
            <div style="text-align:left;">
                Malang, ${tanggalFormatted}<br>
                <strong>Menyetujui,</strong><br><br><br><br><br>
                <u>${menyetujui}</u><br>
                Kepala Bagian Pabrikasi
            </div>
        </div>
    `;

        document.getElementById("previewDoc").innerHTML = page1;

        // ==========================
        // 9. UPDATE PAGE 2 (gambar upload)
        // ==========================
        generatePage2Images();
    }



    // EVENT LISTENERS
    document.getElementById('dokumen_id').addEventListener('change', generatePreview);
    document.getElementById("kasus_id").addEventListener("change", function () {
        const kas = this.selectedOptions[0];
        const kronologiDefault = kas.dataset.kronologi || "";
        document.getElementById("inputKronologi").value = kronologiDefault;
        generatePreview();
    });
    document.getElementById('jenis_kendaraan_id').addEventListener('change', generatePreview);
    document.getElementById('material_id').addEventListener('change', generatePreview);
    document.getElementById("fileInput").addEventListener("change", function() {
        updateFileList();
        generatePage2Images();
    });
    dropArea.addEventListener("drop", () => {
        updateFileList();
        generatePage2Images();
    });

</script>
