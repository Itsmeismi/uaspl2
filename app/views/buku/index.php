<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon">
                            <i data-feather="book-open"></i>
                        </div>
                        Data Buku
                    </h1>
                    <div class="page-header-subtitle">Perpustakaan online</div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-xl px-4 mt-n10">
    <div class="card card-header-actions mb-4">
        <div class="card-header">
            List Daftar Buku
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#simpanBukuModal">Tambah Daftar Buku</button>
        </div>
        <div class="card-body">
            <table id="dataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Buku</th>
                        <th>Penulis</th>
                        <th>Stok</th>
                        <th>Tanggal Masuk</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nama Buku</th>
                        <th>Penulis</th>
                        <th>Stok</th>
                        <th>Tanggal Masuk</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody id="dataBuku">
                    <?php $no = 0; ?>
                    <?php foreach ($data['dataBuku'] as $dataBuku) : ?>
                        <?php $no++ ?>
                        <tr>
                            <td style="width: 1px;"><?= $no ?></td>
                            <td><?= $dataBuku['title'] ?></td>
                            <td><?= $dataBuku['author'] ?></td>
                            <td><?= $dataBuku['quantity'] ?></td>
                            <td><?= date("d F Y", strtotime($dataBuku['date_in'])) ?></td>
                            <td style="width: 10px;">
                                <button class="btn btn-datatable btn-icon btn-transparent-dark me-2 btn-edit"> <i data-feather="more-vertical"></i></button>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark btn-delete"><i data-feather="trash-2"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="simpanBukuModal" tabindex="-1" role="dialog" aria-labelledby="simpanBukuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="simpanBukuModalLabel">Tambah Daftar Buku</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="txtKodeBuku">Kode Buku</label>
                        <input class="form-control" id="txtKodeBuku" name="txtKodeBuku" type="text" placeholder="Input Kode Buku">
                    </div>
                    <div class="mb-3">
                        <label for="txtJudulBuku">Judul</label>
                        <input class="form-control" id="txtJudulBuku" name="txtJudulBuku" type="text" placeholder="Input Judul Buku">
                    </div>
                    <div class="mb-3">
                        <label for="txtPenulisBuku">Penulis</label>
                        <input class="form-control" id="txtPenulisBuku" name="txtPenulisBuku" type="text" placeholder="Input Penulis Buku">
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label>Nomor ISBN</label>
                            <input type="text" id="txtNomorISBN" name="txtNomorISBN" class="form-control" placeholder="Input Nomor ISBN">
                        </div>
                        <div class="col">
                            <label>Jumlah Stok</label>
                            <input type="number" id="txtStokBuku" name="txtStokBuku" class="form-control" placeholder="Input Jumlah Stok">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary" type="button" id="btnSimpanBuku">simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal -->