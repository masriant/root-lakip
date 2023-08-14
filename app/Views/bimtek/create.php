<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Data Peserta</h2>
            <form action="/bimtek/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row mb-4">
                    <label for="post_type" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('post_type')) ? 'is-invalid' : ''; ?>" id="post_type" name="post_type" value="<?= old('post_type'); ?>" autofocus>
                        <div class="invalid-feedback">
                            <?= $validation->getError('post_type'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="post_title" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('post_title')) ? 'is-invalid' : ''; ?>" id="post_title" name="post_title" value="<?= old('post_title'); ?>" autofocus>
                        <div class="invalid-feedback">
                            <?= $validation->getError('post_title'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="post_content" class="col-sm-2 col-form-label">Post Artikel</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="post_content" name="post_content" value="<?= old('post_content'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('post_content'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="post_author" class="col-sm-2 col-form-label">Post Author</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="post_author" name="post_author" value="<?= old('post_author'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('post_author'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="post_date" class="col-sm-2 col-form-label">Post Date</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="post_date" name="post_date" value="<?= old('post_date'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('post_date'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-2">
                        <img src="/images/default.jpg" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('sampul'); ?>
                            </div>
                            <label class="custom-file-label" for="Sampul">Pilih Gambar</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary d-inline">Tambah Data</button>
                <a href="/bimtek" class="btn btn-warning d-inline">Back</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>