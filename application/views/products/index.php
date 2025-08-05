<form method="get">
  <input type="text" name="search" placeholder="Cari produk..." value="<?= $this->input->get('search') ?>">
  <button type="submit">Cari</button>
</form>

<a href="<?= site_url('products/create') ?>">Tambah Produk</a> |
<a href="<?= site_url('products/kalkulator') ?>">Kalkulator Harga</a>

<table border="1">
  <thead>
    <tr>
      <th>ID</th><th>Nama</th><th>Harga</th><th>Stock</th><th>Formula</th><th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($products as $p): ?>
      <tr>
        <td><?= $p->id ?></td>
        <td><?= $p->name ?></td>
        <td><?= $p->price ?></td>
        <td><?= $p->stock ?></td>
        <td><?= $p->formula ?></td>
        <td>
          <a href="<?= site_url('products/edit/'.$p->id) ?>">Edit</a>
          <a href="<?= site_url('products/delete/'.$p->id) ?>" onclick="return confirm('Hapus?')">Hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
