<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Bunga Majemuk Calculator</title>
    <style>
        form {
            width: 50%;
            margin: 25px 0;
            font-size: 18px;
            text-align: left;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <center>
        <form id="bungaForm" style="width: 50%; margin-top: 20px;">
            <div class="mb-3">
                <label for="modal" class="form-label">Modal Awal (Rp)</label>
                <input type="number" class="form-control" id="modal" required>
            </div>
            <div class="mb-3">
                <label for="suku" class="form-label">Suku Bunga (%)</label>
                <input type="number" class="form-control" id="suku" required>
            </div>
            <div class="mb-3">
                <label for="periode" class="form-label">Jumlah Periode</label>
                <input type="number" class="form-control" id="periode" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Jenis Periode</label>
                <select class="form-select" id="type" required>
                    <option selected disabled hidden>Pilih</option>
                    <option value="tahun">Tahun</option>
                    <option value="bulan">Bulan</option>
                    <option value="triwulan">Triwulan</option>
                    <option value="semester">Semester</option>
                </select>
            </div>
            <button type="button" onclick="hitungBungaMajemuk()" class="btn btn-primary mt-3">Hitung</button>
            <a class="btn btn-primary mt-3" href="tunggal.php">Hitung Bunga Tunggal</a>
        </form>
    </center>

    <div id="hasil" style="text-align:center; margin-top:20px;"></div>

    <script>
        function hitungBungaMajemuk() {
            const modal = parseFloat(document.getElementById('modal').value);
            const suku = parseFloat(document.getElementById('suku').value) / 100;
            let periode = parseFloat(document.getElementById('periode').value);
            const type = document.getElementById('type').value;

            // Mengkonversi periode ke dalam satuan tahun
            switch (type) {
                case "bulan":
                    periode = periode / 12; 
                    break;
                case "triwulan":
                    periode = periode / 4; 
                    break;
                case "semester":
                    periode = periode / 2; 
                    break;
                case "tahun":
                default:
                    // Periode sudah dalam tahun, tidak perlu diubah
                    break;
            }

            // Rumus bunga majemuk: A = P * (1 + r)^n
            const modalAkhir = modal * Math.pow((1 + suku), periode);
            const bungaMajemuk = modalAkhir - modal;

            // Format hasil dalam Rupiah
            const formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            });

            document.getElementById('hasil').innerHTML = `
                <p><strong>Modal Awal:</strong> ${formatter.format(modal)}</p>
                <p><strong>Bunga Majemuk:</strong> ${formatter.format(bungaMajemuk)}</p>
                <p><strong>Modal Akhir:</strong> ${formatter.format(modalAkhir)}</p>
            `;
        }
    </script>
</body>
</html>
