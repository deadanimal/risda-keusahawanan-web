Produk List

<br><br><br>

<table>
    <tr>
        <td>perniagaanid</td>
        <td>jenamaproduk</td>
        <td>unitmatrik</td>
        <td>kapasitimaksimum</td>
        <td>kapasitisemasa</td>
        <td>hargaperunit</td>
        <td>modified_by</td>

    </tr>

    @foreach ($produk as $produk)

        <tr>
            <td>{{ $produk->perniagaanid }}</td>
            <td>{{ $produk->jenamaproduk }}</td>
            <td>{{ $produk->unitmatrik }}</td>
            <td>{{ $produk->kapasitimaksimum }}</td>
            <td>{{ $produk->kapasitisemasa }}</td>
            <td>{{ $produk->hargaperunit }}</td>
            <td>{{ $produk->modified_by }}</td>

        </tr>

    @endforeach
</table>

<br><br><br>


<form method="POST" action="/produk">
    @csrf

    perniagaanid <input type="text" name="perniagaanid"> <br>
    jenamaproduk <input type="text" name="jenamaproduk"> <br>
    unitmatrik <input type="text" name="unitmatrik"> <br>
    kapasitimaksimum <input type="text" name="kapasitimaksimum"> <br>
    kapasitisemasa <input type="text" name="kapasitisemasa"> <br>
    hargaperunit <input type="text" name="hargaperunit"> <br>
    modified_by <input type="text" name="modified_by"> <br>

    <input type="submit">
</form>
