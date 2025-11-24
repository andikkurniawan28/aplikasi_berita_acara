<div class="col-lg-4 sidebar px-3 pt-2 pb-3" style="max-height: 100vh; overflow-y: auto;">
    {{-- <form action="{{ route('home.process') }}" method="POST">
        @csrf --}}

        <h6 class="fw-bold mb-2">Control Panel</h6>

        <div class="mb-1">
            <label class="form-label form-label-sm">Kode Nomor Dokumen</label>
            <input type="number" id="kodeNomorDokumen" class="form-control form-control-sm"
                placeholder="000" min="1" max="999" oninput="generatePreview()" name="kodeNomorDokumen">
        </div>

        <label class="form-label form-label-sm mt-2">Master Dokumen</label>
        <select id="dokumen_id" name="dokumen_id" class="form-select form-select-sm mb-1" required>
            @foreach ($dokumens as $d)
                <option value="{{ $d->id }}" data-judul="{{ $d->judul }}"
                    data-nomor_dokumen="{{ $d->nomor_dokumen }}" data-kepada="{{ $d->kepada }}"
                    data-dari="{{ $d->dari }}" data-perihal="{{ $d->perihal }}"
                    data-redaksi_awal="{{ e($d->redaksi_awal) }}"
                    data-redaksi_akhir="{{ e($d->redaksi_akhir) }}"
                    data-penutup="{{ e($d->penutup) }}"
                    data-menyetujui="{{ e($d->menyetujui) }}">
                    {{ $d->judul }} - {{ $d->perihal }}
                </option>
            @endforeach
        </select>

        <label class="form-label form-label-sm">Kasus</label>
        <select id="kasus_id" name="kasus_id" class="form-select form-select-sm mb-1" required>
            @foreach ($kasuss as $k)
                <option value="{{ $k->id }}" data-kronologi="{{ $k->kronologi }}">
                    {{ $k->nama }}
                </option>
            @endforeach
        </select>

        <div class="mb-2">
            <label class="form-label form-label-sm">Kronologi</label>
            <textarea id="inputKronologi" class="form-control form-control-sm" rows="3"
                oninput="generatePreview()">{{ $kronologi_default }}</textarea>
        </div>

        <label class="form-label form-label-sm">Jenis Kendaraan</label>
        <select id="jenis_kendaraan_id" name="jenis_kendaraan_id"
            class="form-select form-select-sm mb-1" required>
            @foreach ($kendaraans as $j)
                <option value="{{ $j->id }}">{{ $j->name }}</option>
            @endforeach
        </select>

        <label class="form-label form-label-sm">Material</label>
        <select id="material_id" name="material_id" class="form-select form-select-sm mb-2" required>
            @foreach ($materials as $m)
                <option value="{{ $m->id }}">{{ $m->name }}</option>
            @endforeach
        </select>

        <div class="row">
            <div class="col-6 mb-1">
                <label class="form-label form-label-sm">Nopol</label>
                <input type="text" id="inputNopol" name="nopol"
                    class="form-control form-control-sm" oninput="generatePreview()">
            </div>

            <div class="col-6 mb-1">
                <label class="form-label form-label-sm">No SPTA</label>
                <input type="text" id="inputSPTA" name="no_spta"
                    class="form-control form-control-sm" oninput="generatePreview()">
            </div>

            <div class="col-6 mb-1">
                <label class="form-label form-label-sm">No Timbangan</label>
                <input type="text" id="inputTimbangan" name="no_timbangan"
                    class="form-control form-control-sm" oninput="generatePreview()">
            </div>

            <div class="col-6 mb-2">
                <label class="form-label form-label-sm">No DO</label>
                <input type="text" id="inputDO" name="no_do"
                    class="form-control form-control-sm" oninput="generatePreview()">
            </div>
        </div>

        <div class="mb-2">
            <label class="form-label form-label-sm">Pengangkut</label>
            <input type="text" id="inputPengangkut" name="pengangkut"
                class="form-control form-control-sm" oninput="generatePreview()">
        </div>

        <hr class="my-2">

        <h6 class="fw-bold mb-1">Penimbangan Awal</h6>
        <div class="row mb-1">
            <div class="col-6">
                <input type="date" id="tglMasukAwal" name="tanggal_masuk_awal"
                    class="form-control form-control-sm" oninput="generatePreview()" required>
            </div>
            <div class="col-6">
                <input type="number" id="brutoAwal" name="bruto_awal"
                    class="form-control form-control-sm" placeholder="Bruto" oninput="generatePreview()" required>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-6">
                <input type="number" id="taraAwal" name="tarra_awal"
                    class="form-control form-control-sm" placeholder="Tarra" oninput="generatePreview()" required>
            </div>
            <div class="col-6">
                <input type="number" id="rafaksiAwal" name="rafaksi_awal"
                    class="form-control form-control-sm" placeholder="Rafaksi" oninput="generatePreview()" required>
            </div>
        </div>

        <hr class="my-2">

        <h6 class="fw-bold mb-1">Penimbangan Koreksi</h6>
        <div class="row mb-1">
            <div class="col-6">
                <input type="date" id="tglMasukKoreksi" name="tanggal_masuk_koreksi"
                    class="form-control form-control-sm" oninput="generatePreview()" required>
            </div>
            <div class="col-6">
                <input type="number" id="brutoKoreksi" name="bruto_koreksi"
                    class="form-control form-control-sm" placeholder="Bruto" oninput="generatePreview()" required>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-6">
                <input type="number" id="taraKoreksi" name="tarra_koreksi"
                    class="form-control form-control-sm" placeholder="Tarra" oninput="generatePreview()" required>
            </div>
            <div class="col-6">
                <input type="number" id="rafaksiKoreksi" name="rafaksi_koreksi"
                    class="form-control form-control-sm" placeholder="Rafaksi" oninput="generatePreview()" required>
            </div>
        </div>

        <div class="mb-2">
            <label class="form-label form-label-sm">Tanggal Dokumen</label>
            <input type="date" id="tanggalDokumen" name="tanggal_dokumen"
                class="form-control form-control-sm" oninput="generatePreview()"
                value="{{ date('Y-m-d') }}">
        </div>

        <div class="mb-2">
            <label class="form-label form-label-sm">Upload Foto Pendukung</label>

            <div id="dropArea"
                style="border:2px dashed #6c757d; border-radius:6px; padding:12px; text-align:center; cursor:pointer; background:#fafafa;">
                <small class="text-muted">Drag & Drop file di sini atau klik untuk memilih</small>
            </div>

            <input type="file" id="fileInput" name="images[]" multiple accept="image/*"
                class="d-none">

            <ul id="fileList" class="mt-2 mb-0" style="font-size:13px;"></ul>
        </div>

        <script>
            const dropArea = document.getElementById("dropArea");
            const fileInput = document.getElementById("fileInput");
            const fileList = document.getElementById("fileList");

            // Klik area → buka file picker
            dropArea.addEventListener("click", () => fileInput.click());

            // Drag over effect
            dropArea.addEventListener("dragover", (e) => {
                e.preventDefault();
                dropArea.style.background = "#eef6ff";
                dropArea.style.borderColor = "#0d6efd";
            });

            dropArea.addEventListener("dragleave", () => {
                dropArea.style.background = "#fafafa";
                dropArea.style.borderColor = "#6c757d";
            });

            // Drop file
            dropArea.addEventListener("drop", (e) => {
                e.preventDefault();
                dropArea.style.background = "#fafafa";
                dropArea.style.borderColor = "#6c757d";

                fileInput.files = e.dataTransfer.files;
                updateFileList();
            });

            // Input manual
            fileInput.addEventListener("change", updateFileList);

            function updateFileList() {
                fileList.innerHTML = "";

                if (fileInput.files.length === 0) return;

                [...fileInput.files].forEach((file, i) => {
                    const li = document.createElement("li");
                    li.textContent = `${i + 1}. ${file.name}`;
                    fileList.appendChild(li);
                });
            }
        </script>


        {{-- <button id="btnGenerateFinal" class="btn btn-success w-100 mt-2 mb-2" type="submit">
            Simpan Berita Acara
        </button>

        <script>
            document.getElementById("btnGenerateFinal").addEventListener("click", function(event) {
                const yakin = confirm("Apakah Anda yakin ingin menyimpan Berita Acara ini?");
                if (!yakin) {
                    event.preventDefault();
                }
            });
        </script> --}}

    {{-- </form> --}}
</div>
