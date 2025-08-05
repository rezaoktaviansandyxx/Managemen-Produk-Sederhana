<form method="post" action="<?= isset($product) ? site_url('products/update/'.$product->id) : site_url('products/store') ?>">
  <input type="text" name="name" placeholder="Nama" value="<?= $product->name ?? '' ?>" required>
  <input type="number" step="any" name="price" placeholder="Harga" value="<?= $product->price ?? '' ?>" required>
  <input type="number" name="stock" placeholder="Stok" value="<?= $product->stock ?? '' ?>" required>
  <select name="formula" required>
    <option value="">Pilih Formula</option>
    <option value="unit" <?= isset($product) && $product->formula == 'unit' ? 'selected' : '' ?>>Unit</option>
    <option value="area" <?= isset($product) && $product->formula == 'area' ? 'selected' : '' ?>>Area</option>
  </select>
  <button type="submit">Simpan</button>
</form>
