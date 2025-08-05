<h3>Kalkulator Harga</h3>
<select id="formula" onchange="toggleFields()">
  <option value="unit">Unit</option>
  <option value="area">Area</option>
</select><br>

<input type="number" id="quantity" placeholder="Quantity"><br>
<div id="area-fields" style="display:none;">
  <input type="number" id="panjang" placeholder="Panjang"><br>
  <input type="number" id="lebar" placeholder="Lebar"><br>
</div>
<input type="number" id="price" placeholder="Harga"><br>

<button onclick="hitung()">Hitung</button>

<p>Total: <span id="total">0</span></p>

<script>
function toggleFields() {
  const formula = document.getElementById('formula').value;
  document.getElementById('area-fields').style.display = (formula === 'area') ? 'block' : 'none';
}

function hitung() {
  const formula = document.getElementById('formula').value;
  const quantity = parseFloat(document.getElementById('quantity').value) || 0;
  const price = parseFloat(document.getElementById('price').value) || 0;
  let total = 0;

  if (formula === 'unit') {
    total = quantity * price;
  } else {
    const panjang = parseFloat(document.getElementById('panjang').value) || 0;
    const lebar = parseFloat(document.getElementById('lebar').value) || 0;
    total = quantity * panjang * lebar * price;
  }

  document.getElementById('total').innerText = total;
}
</script>
