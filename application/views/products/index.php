<form method="get">
  <input type="text" name="search" placeholder="Cari produk..." value="<?= $this->input->get('search') ?>">
  <button type="submit">Cari</button>
</form>

<a href="<?= site_url('products/create') ?>">Tambah Produk</a> |
<a href="<?= site_url('products/kalkulator') ?>">Kalkulator Harga</a>

<?php
  $sort = $this->input->get('sort') ?? 'id';
  $order = $this->input->get('order') ?? 'asc';
  $search = $this->input->get('search');
  function sort_link($column, $label, $sort, $order, $search) {
    $next_order = ($sort == $column && $order == 'asc') ? 'desc' : 'asc';
    $icon = ($sort == $column) ? ($order == 'asc' ? ' ↑' : ' ↓') : '';
    $url = site_url('products?sort=' . $column . '&order=' . $next_order);
    if ($search) {
      $url .= '&search=' . urlencode($search);
    }
    return '<a href="' . $url . '">' . $label . $icon . '</a>';
  }
?>

<table border="1">
  <thead>
    <tr>
      <th><?= sort_link('id', 'ID', $sort, $order, $search) ?></th>
      <th><?= sort_link('name', 'Nama', $sort, $order, $search) ?></th>
      <th><?= sort_link('price', 'Harga', $sort, $order, $search) ?></th>
      <th><?= sort_link('stock', 'Stock', $sort, $order, $search) ?></th>
      <th><?= sort_link('formula', 'Formula', $sort, $order, $search) ?></th>
      <th>Aksi</th>
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