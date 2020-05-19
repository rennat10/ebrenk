{% extends "template/layout.volt" %}
{% block navbar %}
    <a id="layoutA" href="{{ url('ebrenk/user/home') }}">Home</a>
    <a id="layoutA" href="{{ url('ebrenk/user/riwayat') }}">Riwayat</a>
    <a id="layoutA" href="{{ url('ebrenk/user/daftar') }}">Logout</a>
{% endblock %}

{% block content %}
    <div class="container mt-5">
        <table class="table table-bordered mx-auto" style="width: 95%;">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Foto</td>
                    <td>Harga</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                {% set nomor = 1 %}
                {% for produk in produkList %}
                    <tr>
                        <td>{{ nomor }}</td>
                        <td>{{ produk.getNama() }}</td>
                        <td><img src="{{ url(produk.getFoto()) }}" style="width: 200px;"></td>
                        <td>{{ produk.rupiah() }}</td>
                        <td>
                            <form method="POST" action="{{ url('ebrenk/user/beli') }}">
                                <input type="hidden" name="id_produk" value="{{ produk.getId() }}">
                                <button class="btn btn-primary">Beli</button>
                            </form>
                            <form method="POST" action="{{ url('ebrenk/user/detail') }}">
                                <input type="hidden" name="id_produk" value="{{ produk.getId() }}">
                                <button class="btn btn-info">Detail</button>
                            </form>
                        </td>
                    </tr>
                {% set nomor = nomor + 1 %}
                {% endfor %}
            </tbody>
        </table>
    </div>
{% endblock %}