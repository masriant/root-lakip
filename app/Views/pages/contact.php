<?= $this->extend('layout/template'); ?> <!-- Template Content -->

<?= $this->section('content'); ?> <!-- Content Start -->
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Contact Us</h1>
            <h2 class="text text-center">TABEL ALAMAT</h2>
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
                <?php foreach ($alamat as $a) : ?>
                    <tr>
                        <td><?= $a['tipe']; ?></td>
                        <td><?= $a['alamat']; ?></td>
                        <td><?= $a['telepon']; ?></td>
                        <td><?= $a['email']; ?></td>

                    </tr>
                <?php endforeach; ?>

                <!-- Tambahkan baris lain untuk alamat lainnya -->
            </table>



            <br>

            <div class="container">
                <div class="row">

                    <?php foreach ($alamat as $a) : ?>
                        <tr>
                            <td>
                                <ul>
                                    <li>Type : <?= $a['tipe']; ?></li>
                                    <li>Alamat : <?= $a['alamat']; ?></li>
                                    <li>Telepon : <?= $a['telepon']; ?></li>
                                    <li>Email : <?= $a['email']; ?></li>
                                </ul>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?> <!-- Content End  -->