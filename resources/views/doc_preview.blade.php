<div class="col-lg-8">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <strong>Preview Berita Acara</strong>
            <button id="btnExportPdf" class="btn btn-danger btn-sm float-end">
                Ekspor ke PDF
            </button>
        </div>

        <div class="card-body" style="overflow:auto; height:83vh;">

            <!-- HALAMAN 1 -->
            <div class="pdf-page" id="previewDoc"
                style="
                    width:21cm;
                    min-height:29.7cm;
                    padding:140px 50px 40px 50px; /* tambahkan padding atas supaya teks tidak kena logo */
                    margin:auto;
                    /* background:transparent; */
                    border:1px solid #ddd;
                    box-shadow:0px 0px 8px rgba(0,0,0,0.08);
                ">
            </div>

            <!-- HALAMAN 2 -->
            <div class="pdf-page" id="previewDocPage2"
                style="
                    display:none;
                    flex-wrap:wrap;
                    gap:10px;
                    margin-top:20px;
                    width:21cm;
                    min-height:29.7cm;
                    padding:140px 50px 40px 50px;
                    margin:40px auto 0 auto;
                    /* background:transparent; */
                    border:1px solid #ddd;
                    box-shadow:0px 0px 8px rgba(0,0,0,0.08);
                ">
            </div>

        </div>
    </div>

    <footer class="text-center fixed-bottom bg-light py-2 shadow-sm">
        <div class="credit-text">
            ©2025 - Andik Kurniawan
        </div>
    </footer>
</div>
