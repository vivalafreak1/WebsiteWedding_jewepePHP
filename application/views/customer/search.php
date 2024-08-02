<div class="row mt-5">
    <div class="col-md-6 offset-md-3">
        <h2 class="text-center mb-4">Search Orders</h2>
        <form action="<?= base_url('customer/search') ?>" method="post">
            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>

<?php if (isset($orders)): ?>
<div class="row mt-4">
    <div class="col-md-12">
        <?php if (count($orders) > 0): ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Package Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $index => $order): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><img src="<?= base_url('assets/files/katalog/') . $order->image; ?>" class="img-fluid" style="width:60px; height:60px;" alt="Package Image"></td>
                        <td><?= htmlspecialchars($order->package_name) ?></td>
                        <td><?= ucfirst(htmlspecialchars($order->status)) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="alert alert-warning" role="alert">
            No orders found for this email.
        </div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>
