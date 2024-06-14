      <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Manajemen Katalog</h3>
                  <h6 class="font-weight-normal mb-0">JeWePe Wedding Organizer</h6>
                </div>         
              </div>
            </div>
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-6">
                      <h4 class="card-title">Data Katalog Paket Pernikahan</h4>
                    </div>
                    <div class="col-lg-6 text-right">
                      <a href="<?= base_url('admin/Katalog/add') ?>" class="btn btn-primary">Tambah Data</a>
                    </div>
                    <div class="col-lg-4">
                      <?= $this->session->flashdata('message'); ?>
                    </div>
                  </div>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center">No</th>
                          <th class="text-center">Gambar</th>
                          <th class="text-center">Nama Paket</th>
                          <th class="text-center">Harga</th>
                          <th class="text-center">Status</th>
                          <th class="text-center">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $no = 1;
                          foreach ($getAllKatalog as $row) :
                        ?>
                        <tr>
                          <td class="text-center"><?= $no++ ?></td>
                          <td class="text-center">
                            <a href="<?= base_url('assets/files/katalog/') . $row->image;?>" target="_blank"> 
                              <img src="<?= base_url('assets/files/katalog/') . $row->image;?>" class="img-fluid" style="border-radius: 10%; width:60px; height: 60px;" alt="">
                            </a>
                          </td>
                          <td><?= $row->package_name; ?></td>
                          <td class="text-center">Rp. <?= number_format($row->price, 2, ',', '.');?></td>
                          <td class="text-center"><?= $row->status_publish; ?></td>
                          <td class="text-center">
                            <a href="<?= base_url('admin/Katalog/edit?id=') . $row->catalogue_id; ?>" class="btn btn-sm btn-warning" title="Edit">Edit</a>
                            <a href="<?= base_url('admin/Katalog/delete?id=') . $row->catalogue_id; ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="if(!confirm('Anda yakin ingin menghapus katalog ini?')) {return false;}">Delete</a>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>