<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Berita Acara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @include('style')
</head>

<body>
    @include('navbar')
    <div class="container-fluid">
        <div class="row">
            @include('doc_preview')
            @include('control_form')
        </div>
    </div>
</body>
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

        pdf.save("Dokumen.pdf");
    });
</script>
@include('script_doc')

</html>
