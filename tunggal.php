<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Hitung Bunga Tunggal</title>
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
        <form id="bungaForm">
            <div class="mb-3 row">
                <label for="modal" class="col-sm-2 col-form-label">Modal Awal (Rp)</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="modal" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="suku" class="col-sm-2 col-form-label">Suku Bunga (%)</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="suku" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="periode" class="col-sm-2 col-form-label">Jumlah Periode</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="periode" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="type" class="col-sm-2 col-form-label">Periode</label>
                <div class="col-sm-10">
                    <select class="form-select" id="type" required>
                        <option selected disabled hidden>Pilih</option>
                        <option value="tahun">Tahun</option>
                        <option value="bulan">Bulan</option>
                        <option value="triwulan">Triwulan</option>
                        <option value="semester">Semester</option>
                    </select>
                </div>
            </div>
            <button type="button" onclick="hitungBunga()" class="btn btn-primary mt-3">Hitung</button>
        </form>
    </center>

    <p id="hasil"></p>

    <script>
        function hitungBunga() {
            const modal = parseFloat(document.getElementById('modal').value);
            const suku = parseFloat(document.getElementById('suku').value) / 100;
            const periode = parseInt(document.getElementById('periode').value);
            const type = document.getElementById('type').value;

            let totalPeriode;

            // Konversi periode berdasarkan jenisnya
            switch (type) {
                case 'tahun':
                    totalPeriode = periode;
                    break;
                case 'bulan':
                    totalPeriode = periode / 12;
                    break;
                case 'triwulan':
                    totalPeriode = periode / 4;
                    break;
                case 'semester':
                    totalPeriode = periode / 2;
                    break;
                default:
                    totalPeriode = 0;
            }

            // Hitung bunga tunggal
            const bunga = modal * suku * totalPeriode;
            const modalAkhir = modal + bunga;

            // Tampilkan hasil
            const hasilElement = document.getElementById('hasil');
            hasilElement.innerHTML = `
                <center>
                    Modal Awal: Rp ${modal.toLocaleString('id-ID')}<br>
                    Bunga Tunggal: Rp ${bunga.toLocaleString('id-ID')}<br>
                    Modal Akhir: Rp ${modalAkhir.toLocaleString('id-ID')}
                </center>
            `;
        }
    </script>
</body>
</html>
