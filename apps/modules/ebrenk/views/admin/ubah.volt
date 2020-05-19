{% extends "template/layoutAdmin.volt" %}
{% block content %}
    <div class="mx-4 my-4" style="background-color: white; width: 77%; ">
        <h2 class="ml-3 mt-4" style="color: red;">Ubah Produk</h2>
        <form method="POST" action="{{ url('ebrenk\admin\ubahPost') }}" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_produk" class="ml-3" style="font-weight: bold">Nama Produk</label>
                <input type="text" name="nama_produk" value="{{ produk.getNama() }}" class="form-control ml-3 mr-3" style="width: 97%;">
            </div>

            <div class="form-group">
                <label for="harga_produk" class="ml-3" style="font-weight: bold">Harga Rp</label>
                <input type="text" name="harga_produk" value="{{ produk.getHarga() }}" class="form-control ml-3 mr-3" style="width: 97%;">
            </div>

            <img src="{{ url(produk.getFoto()) }}" style="width: 400px; height: 300px;">
            <div class="form-group">    
                <label for="foto_produk" class="ml-3" style="font-weight: bold">Ganti Foto</label>
                <input type="file" name="foto_produk" value="{{ url(produk.getFoto()) }}" class="form-control ml-3 mr-3" style="width: 97%;">
            </div>

            <div class="form-group">
                <label for="deskripsi_produk" class="ml-3" style="font-weight: bold">Deskripsi</label>
                <input type="text" name="deskripsi_produk" value="{{ produk.getDeskripsi() }}" class="form-control ml-3 mr-3" rows="8" style="width: 97%; height: 200px;"></input>
            </div>

            <button class="btn btn-primary">Simpan</button>
        </form>
    </div>
{% endblock %}