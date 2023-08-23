<?= $this->extend('layout/template'); ?> <!-- Template Content -->

<?= $this->section('content'); ?> <!-- Content Start -->

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="my-3">Category</h1>
            <h2 class="text text-center my-3">Tabel Data Peserta</h2>
            <table>
                <style>
                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }

                    th,
                    td {
                        padding: 10px;
                        text-align: left;
                        border-bottom: 1px solid #ccc;
                    }

                    th {
                        background-color: #f2f2f2;
                    }

                    tr:hover {
                        background-color: #f5f5f5;
                    }
                </style>
                <tr>
                    <th scope="col">#</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Asal</th>
                    <th>Prop</th>
                    
                </tr>
                <?php $i=1; ?>
                <?php foreach ($dprd as $a) : ?>
                    <tr>
                    <th scope="row"><?= $i++; ?></th>
                        <td><?= $a['nama']; ?></td>
                        <td><?= $a['jabatan']; ?></td>
                        <td><?= $a['kab_kota']; ?></td>
                        <td><?= $a['propinsi']; ?></td>
                      
                    </tr>
                <?php endforeach; ?>
                <!-- Tambahkan baris lain untuk alamat lainnya -->
            </table>
        </div>
    </div>
</div>

<!-- Start -->
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="my-3">Category List</h1>
            <?php foreach ($dprd as $c) : ?>
                <tr>
                    <td>
                        <ul>
                            <li>Type : <?= $c['nama']; ?></li>
                            <li>Alamat : <?= $c['jabatan']; ?></li>
                            <li>Telepon : <?= $c['kab_kota']; ?></li>
                            
                        </ul>
                    </td>
                </tr>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- End -->
<?= $this->endSection(); ?> <!-- Content End  -->