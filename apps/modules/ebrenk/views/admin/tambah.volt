{% extends "template/layoutAdmin.volt" %}
{% block content %}
    <div class="mx-4 my-4" style="background-color: white; width: 77%; ">
        <h2 class="ml-3 mt-4" style="color: red;">Tambah Produk</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_produk" class="ml-3" style="font-weight: bold">Nama</label>
                <input type="text" name="nama_produk" class="form-control ml-3 mr-3" style="width: 97%;">
            </div>

            <div class="form-group">
                <label for="harga_produk" class="ml-3" style="font-weight: bold">Harga (Rp)</label>
                <input type="text" name="harga_produk" class="form-control ml-3 mr-3" style="width: 97%;">
            </div>

            <div class="form-group">
                <label for="deskripsi_produk" class="ml-3" style="font-weight: bold">Deskripsi</label>
                <textarea type="textarea" name="deskripsi_produk" class="form-control ml-3 mr-3" rows="8" style="width: 97%;"></textarea>
            </div>

            <div class="form-group">
                <label for="foto_produk" class="ml-3" style="font-weight: bold">Foto</label>
                <input type="file" name="foto_produk" class="form-control ml-3 mr-3" style="width: 97%;">
            </div>

            <button class="btn btn-primary">Simpan</button>
        </form>
    </div>
{% endblock %}