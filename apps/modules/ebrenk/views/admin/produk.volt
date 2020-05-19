{% extends "template/layoutAdmin.volt" %}
{% block content %}
    <div class="mx-4 my-4" style="background-color: white; width: 77%; ">
        <h2 class="ml-3 mt-4" style="color: red;">Data Produk</h2>
        <table class="table table-bordered ml-3" style="width: 97%;">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Harga</td>
                    <td>Foto</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                {% set nomor = 1 %}
                {% for produk in produkList %}

                    <tr>
                        <td>{{ nomor }}</td>
                        <td>{{ produk.getNama() }}</td>
                        <td>{{ produk.getHarga() }}</td>
                        <td><img src="{{ url(produk.getFoto()) }}" style="width: 100px; height: 75px;"></td>
                        <td>
                            <form method="POST" action="{{ url('ebrenk/admin/hapus') }}">
                                <input type="hidden" value="{{ produk.getId() }}" name="id">
                                <button class="btn btn-danger" style="color: white;">Hapus</button>
                            </form>
                            <form method="POST" action="{{ url('ebrenk/admin/ubah') }}">
                                <input type="hidden" value="{{ produk.getId() }}" name="id">
                                <button class="btn btn-warning" style="color: white;">Ubah</button>
                            </form>
                        </td>
                    </tr>
                    {% set nomor = nomor + 1 %}
                {% endfor %}
            </tbody>
        </table>
        <a class="btn btn-primary ml-3" href="{{ url('ebrenk/admin/tambah') }}" style="color: white;">Tambah Data</a>
    </div>
{% endblock %}