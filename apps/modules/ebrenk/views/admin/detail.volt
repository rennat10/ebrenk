{% extends "template/layoutAdmin.volt" %}
{% block content %}
    <div class="mx-4 my-4" style="background-color: white; width: 77%; ">
        <h2 class="ml-3 mt-4" style="color: red;">Detail Pembelian</h2>
        <h6 class="ml-3">{{ data['nama_pelanggan']}}</h6>
        <p class="ml-3">{{ data['email_pelanggan']}}</p>
        <p class="ml-3">Tanggal: {{ data['tanggal_pembelian']}}</p>
        <p class="ml-3">Total: {{ data['total_pembelian']}}</p>
        <table class="table table-bordered ml-3 mr-3" style="width: 97%;">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama Produk</td>
                    <td>Harga</td>
                    <td>Jumlah</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <tbody>
                {% set nomor = 1 %}
                {% for pembelian_produk in pembelian_produkList %}
                    <tr>
                        <td>{{ nomor }}</td>
                        <td>{{ pembelian_produk['nama_produk'] }}</td>
                        <td>{{ pembelian_produk['harga_produk'] }}</td>
                        <td>{{ pembelian_produk['jumlah'] }}</td>
                        <td>{{ pembelian_produk['harga_produk'] * pembelian_produk['jumlah'] }}</td>
                    </tr>
                    {% set nomor = nomor + 1 %}
                {% endfor %}
            </tbody>
        </table>
    </div>
{% endblock %}