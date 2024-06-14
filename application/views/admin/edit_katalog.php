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
          <div class="row">
<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Data Katalog</h4>

                    <form action="<?= base_url('admin/Katalog/updateData')?>" method="post" enctype="multipart/form-data">
                      <input type="hidden" value="<?= $katalog->catalogue_id; ?>" name="id">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                <label for="exampleInputName1">Nama Paket</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="package_name" placeholder="Nama Paket" value="<?= $katalog->package_name;?>" required>
                                </div>
                                <div class="form-group">
                                    <div class="editor-container">
                                        <label for="exampleAddress">Deskripsi Paket</label>
                                        <textarea name="description" id="editor" class="form-control" rows="4"><?= $katalog->description;?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Gambar Header</label>
                                    <input type="file" name="image" class="form-control" <?= empty($katalog->image) ? 'required' : ''?>>
                                </div>
                                <div class="form-group">
                                    <img src="<?= base_url('assets/files/katalog/') . $katalog->image; ?>" alt="" class="img-thumbnail" style="max-width:120px;">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Harga (Rp)</label>
                                    <input type="text" class="form-control" id="exampleInputName1" name="price" placeholder="Harga" value="<?= $katalog->price ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectStatusPublish">Status Publish</label>
                                    <select name="status_publish" id="exampleSelectStatusPublish" class="form-control">
                                        <option value="Y" <?= $katalog->status_publish == 'Y' ? 'selected' : ''?>>Publish</option>
                                        <option value="N" <?= $katalog->status_publish == 'N' ? 'selected' : ''?>>Draft</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 text-right">
                                <a href="<?= base_url('admin/Katalog'); ?>" class="btn btn-secondary mr-2">Kembali</a>
                                <button class="btn btn-primary mr-2" type="submit">Edit</button>
                            </div>
                        </div>
                    </form>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>