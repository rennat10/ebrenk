{% extends "template/layout.volt" %}
{% block navbar %}
    <a id="layoutA" href="{{ url('ebrenk/user/home') }}">Home</a>
    <a id="layoutA" href="{{ url('ebrenk/user/riwayat') }}">Riwayat</a>
    <a id="layoutA" href="{{ url('ebrenk/user/daftar') }}">Logout</a>
{% endblock %}

{% block content %}
    <div class="container mt-5">
        <table class="table table-bordered mx-auto">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Harga</td>
                    <td>Jumlah</td>
                    <td>Total harga</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                {% for keranjang in keranjangList %}
                    <tr>
                        <td>{{ loop.index }}.</td>
                        <td>{{ keranjang.getNama() }}</td>
                        <td>Rp. {{ keranjang.getHarga() }}</td>
                        <td>{{ keranjang.getJumlah() }}</td>
                        <td>Rp. {{ keranjang.getTotal() }}</td>
                        <td>
                            <a class="btn btn-danger" href="{{ url('ebrenk/user/deleteCheckout/' ~ keranjang.getIdProduk()) }}">Hapus</a>
                        </td>
                    </tr>
                {% endfor %}
                <tr>
                    <td colspan="4">Total</td>
                    <td>Rp. {{ totalBeli }}</td>
                </tr>
            </tbody>
        </table>
        <form method="POST" action="{{ url('ebrenk/user/masukRiwayat') }}">
            <input type="hidden" value="{{ totalBeli }}" name="total">
            <button class="btn btn-primary">Checkout</button>
        </form>
    </div>
{% endblock %}