<?= $this->extend('layout/template'); ?> <!-- Template Content -->

<?= $this->section('content'); ?> <!-- Content Start -->

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="my-3">Category</h1>
            <h2 class="text text-center my-3">Tabel Category</h2>
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
                    <th>Type</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Email</th>

                </tr>
                <?php foreach ($category as $a) : ?>
                    <tr>
                        <td><?= $a['tipe']; ?></td>
                        <td><?= $a['alamat']; ?></td>
                        <td><?= $a['telepon']; ?></td>
                        <td><?= $a['email']; ?></td>

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
            <h1 class="my-3">Category</h1>
            <?php foreach ($category as $c) : ?>
                <tr>
                    <td>
                        <ul>
                            <li>Type : <?= $c['tipe']; ?></li>
                            <li>Alamat : <?= $c['alamat']; ?></li>
                            <li>Telepon : <?= $c['telepon']; ?></li>
                            <li>Email : <?= $c['email']; ?></li>
                        </ul>
                    </td>
                </tr>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- End -->
<?= $this->endSection(); ?> <!-- Content End  -->