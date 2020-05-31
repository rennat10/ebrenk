{% extends "template/layout.volt" %}
{% block navbar %}
    <a id="layoutA" href="{{ url('ebrenk/user/home') }}">Home</a>
    <a id="layoutA" href="{{ url('ebrenk/user/riwayat') }}">Riwayat</a>
    <a id="layoutA" href="{{ url('ebrenk/user/daftar') }}">Logout</a>
{% endblock %}

{% block content %}
    <div class="container d-flex justify-content-center mt-5">
        <div>
            <img src="{{ url(produk.getFoto()) }}">
        </div>
        <div class="w-50">
            <form method="POST" action="{{ url('ebrenk/user/detail/' ~ produk.getId() ) }}">
                <h2> {{ produk.getNama() }} </h2>
                <h4>Rp. {{ produk.rupiah() }} </h4>
                <p>Tersedia: {{ produk.getStok() }} unit</p>
                <input type="number" class="form-control w-75" min="1" max="{{ produk.getStok() }}" style="display: inline;" value="1">
                <button class="btn btn-primary">Beli</button>
            </form>
        </div>
    </div>
{% endblock %}