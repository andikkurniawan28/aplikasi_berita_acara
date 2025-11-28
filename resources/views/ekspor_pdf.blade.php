<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
    document.getElementById("btnExportPdf").addEventListener("click", async function() {

        const {
            jsPDF
        } = window.jspdf;

        const pdf = new jsPDF({
            unit: "mm",
            format: "a4",
            orientation: "portrait"
        });

        // Elemen halaman 1 dan 2
        const page1 = document.getElementById("previewDoc");
        const page2 = document.getElementById("previewDocPage2");

        // Fungsi render ke PNG
        async function renderElement(el) {
            return await html2canvas(el, {
                scale: 2,
                useCORS: true,
                backgroundColor: null
            });
        }

        // Render halaman 1 → canvas
        const canvas1 = await renderElement(page1);
        const img1 = canvas1.toDataURL("image/png");
        const imgWidth = 210; // A4 width mm
        const imgHeight = canvas1.height * imgWidth / canvas1.width;
        pdf.addImage(img1, "PNG", 0, 0, imgWidth, imgHeight);

        // Jika halaman 2 muncul → tambahkan
        if (page2.style.display !== "none" && page2.innerHTML.trim() !== "") {
            pdf.addPage();
            const canvas2 = await renderElement(page2);
            const img2 = canvas2.toDataURL("image/png");
            const imgHeight2 = canvas2.height * imgWidth / canvas2.width;
            pdf.addImage(img2, "PNG", 0, 0, imgWidth, imgHeight2);
        }

        // pdf.save("Dokumen.pdf");
        // Ambil value yang sudah dihitung sebelumnya
        const tahun = new Date().getFullYear();
        const kode = document.getElementById("kodeNomorDokumen").value || "";
        const select = document.getElementById("dokumen_id");
        const perihal = select.options[select.selectedIndex].getAttribute('data-perihal') || "";

        // Gabungkan sesuai aturan:
        // 2025-827-Pengajuan Koreksi Bobot
        const nomorDokumenFinal = `${tahun}-${kode}-${perihal}`;

        // Jadi nama file PDF
        const filename = `${nomorDokumenFinal}.pdf`;

        // Simpan PDF
        pdf.save(filename);
    });
</script>
