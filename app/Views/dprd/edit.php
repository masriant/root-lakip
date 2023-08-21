<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data Peserta</h2>
            <form action="/dprd/update/<?= $dprd['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $dprd['slug']; ?>">
                <input type="hidden" name="sampulLama" value="<?= $dprd['sampul']; ?>">
                <!-- <div class="form-group row mb-4">
                    <label for="users" class="col-sm-2 col-form-label">Slug</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-danger <?= ($validation->hasError('slug')) ? 'is-invalid' : ''; ?>" id="slug" name="slug" value="<?= (old('slug')) ? old('slug') : $dprd['slug'] ?>" readonly>
                        <div class="invalid-feedback">
                            <?= $validation->getError('slug'); ?>
                        </div>
                    </div>
                </div> -->
                <div class="form-group row mb-4">
                    <label for="users" class="col-sm-2 col-form-label">UserID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('users')) ? 'is-invalid' : ''; ?>" id="users" name="users" autofocus value="<?= (old('users')) ? old('users') : $dprd['users'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('users'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="kelamin" class="col-sm-2 col-form-label">Jenis</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="kelamin" name="kelamin">
                            <option selected><?= (old('kelamin')) ? old('kelamin') : $dprd['kelamin'] ?></option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                            <option value="Other">Other</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('kelamin'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= (old('nama')) ? old('nama') : $dprd['nama'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= (old('jabatan')) ? old('jabatan') : $dprd['jabatan'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('jabatan'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="instansi" class="col-sm-2 col-form-label">Instansi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="instansi" name="instansi" value="<?= (old('instansi')) ? old('instansi') : $dprd['instansi'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('instansi'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="kab_kota" class="col-sm-2 col-form-label">Kab./Kota</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kab_kota" name="kab_kota" value="<?= (old('kab_kota')) ? old('kab_kota') : $dprd['kab_kota'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('kab_kota'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="propinsi" class="col-sm-2 col-form-label">Propinsi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="propinsi" name="propinsi" value="<?= (old('propinsi')) ? old('propinsi') : $dprd['propinsi'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('propinsi'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="partai" class="col-sm-2 col-form-label">Partai</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="partai" name="partai" value="<?= (old('partai')) ? old('partai') : $dprd['partai'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('partai'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="whatsapp" class="col-sm-2 col-form-label">Whatsapp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="<?= (old('whatsapp')) ? old('whatsapp') : $dprd['whatsapp'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('whatsapp'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="<?= (old('email')) ? old('email') : $dprd['email'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="refferal" class="col-sm-2 col-form-label">Referensi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="refferal" name="refferal" value="<?= (old('refferal')) ? old('refferal') : $dprd['refferal'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('refferal'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-2">
                        <img src="/images/<?= $dprd['sampul']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('sampul'); ?>
                            </div>
                            <label class="custom-file-label" for="Sampul"><?= $dprd['sampul']; ?></label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary d-inline">Ubah Data</button>
                <a href="/dprd/<?= $dprd['slug']; ?>" class="btn btn-secondary d-inline">Back to details</a>
                <a href="/dprd" class="btn btn-success d-inline">Back to List Orang</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>