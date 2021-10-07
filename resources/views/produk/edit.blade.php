Produk Edit

<br><br><br>




<form method="POST" action="/produk/{{ $produk->id }}">
    @csrf
    @method('PUT')
    perniagaanid <input type="text" name="perniagaanid"> <br>
    jenamaproduk <input type="text" name="jenamaproduk"> <br>
    unitmatrik <input type="text" name="unitmatrik"> <br>
    kapasitimaksimum <input type="text" name="kapasitimaksimum"> <br>
    kapasitisemasa <input type="text" name="kapasitisemasa"> <br>
    hargaperunit <input type="text" name="hargaperunit"> <br>
    modified_by <input type="text" name="modified_by"> <br>

    <input type="submit">
</form>
