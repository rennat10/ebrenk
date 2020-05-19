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
                    <td>Harga</td>
                </tr>
            </thead>
            <tbody>
                {% set nomor = 1 %}
                {% for keranjang in keranjangList %}
                    <tr>
                        <td>{{ nomor }}</td>
                        <td>{{ keranjang['nama_produk'] }}</td>
                        <td>{{ keranjang['harga_produk'] }}</td>
                    </tr>
                {% set nomor = nomor + 1 %}
                {% endfor %}
            </tbody>
        </table>
    </div>
{% endblock %}