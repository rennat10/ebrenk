{% extends "template/layout.volt" %}
{% block navbar %}
    <a id="layoutA" href="{{ url('ebrenk/user/home') }}">Home</a>
    <a id="layoutA" href="{{ url('ebrenk/user/riwayat') }}">Riwayat</a>
    <a id="layoutA" href="{{ url('ebrenk/user/daftar') }}">Logout</a>
{% endblock %}

{% block content %}
    <div class="container-fluid">
        <div class="d-flex justify-content-center align-items-center">
            <div class="mx-auto">
                <img src="{{ url('assets/images/wkwk123.jpg') }}">
            </div>
            <div class="mx-auto">
                <h1 style="color: gray"><span style="color: green;">New</span>Product</h1>
                <h3>Berbagai Produk Terbaru</h3>
                <p>Dapatkan atau coba produk markup terbaru disini</p>
            </div>
        </div>
        <div class="text-center">
            <h2 style="color: green;">Produk Terbaru</h2>
            <div class="d-flex" style="flex-wrap: wrap; margin-left: 1%;">
                {% for produk in produkList %}
                    <div style="width: 32%; margin-top: 3%; border: 1px solid gray; margin-left: 1%;">
                        <img class="mx-auto" src="{{ url(produk.getFoto()) }}" style="width: 400px; height: 300px;">
                        <div style="text-align: left; margin-left: 3%; margin-top: 4%; margin-bottom: 4%;">
                            <h4>{{ produk.getNama() }}</h4>
                            <p>Rp. {{ produk.rupiah() }}</p>
                            <form method="POST" action="{{ url('ebrenk/user/beli') }}">
                                <input type="hidden" name="id_produk" value="{{ produk.getId() }}">
                                <button class="btn btn-primary">Beli</button>
                            </form>
                            <form method="POST" action="{{ url('ebrenk/user/detail') }}">
                                <input type="hidden" name="id_produk" value="{{ produk.getId() }}">
                                <button class="btn btn-info">Detail</button>
                            </form>
                        </div>
                    </div>
                {% endfor %}
            </div>
        </div>
    </div>
    <center>
    <div style="position: absolute;  width: 80%; height: 40%; left: 50%; transform: translate(-50%, -50%);  margin-top:12%; margin-bottom: 3%;">
        <div class="d-flex" style=" background-color: #f5f5f5; height: 90%;">
            <div style="width: 25%; margin-top: 2%; background-color: #f5f5f5;height: 100px;">
                <h5 style="text-align: left; margin-left: 15%;">E-Brenk</h5>
                <ul style="list-style-type: none; text-align: left;">
                    <li>Tentang Kami</li>
                </ul>
            </div>
            <div style="width: 25%; margin-top: 2%; background-color: #f5f5f5;height: 100px;">
                <h5 style="text-align: left; margin-left: 15%;">Beli</h5>
                <ul style="list-style-type: none; text-align: left;">
                    <li>Belanja di E-Brenk</li>
                    <li>Cara Belanja</li>
                    <li>Pembayaran</li>
                    <li>Hot List</li>
                </ul>
            </div>
            <div style="width: 25%; margin-top: 2%; background-color: #f5f5f5;height: 100px;">
                <h5 style="text-align: left; margin-left: 15%;">TENTANG E-BRENK</h5>
                <ul style="list-style-type: none; text-align: left;">
                    <li><input type="email" class="form-control-sm" placeholder="Your email address"></li>
                </ul>
                <p style="text-align: left; margin-left: 15%;">Untuk mendapatkan Update baru dari Toko Online E-Brenk Tinggalkan Email Disini</p>
            </div>
        </div>
        <div style="background-color: lightgray;">
            <a>Copyright © 2016 E-Brenk. All rights reserved.</a>
        </div>
    </div>
{% endblock %}