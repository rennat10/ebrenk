{% extends "template/layout.volt" %}
{% block navbar %}
    <a id="layoutA" href="{{ url('ebrenk/user/home') }}">Home</a>
    <a id="layoutA" href="{{ url('ebrenk/user/riwayat') }}">Riwayat</a>
    <a id="layoutA" href="{{ url('ebrenk/user/logout') }}">Logout</a>
{% endblock %}

{% block content %}
    <div class="container mt-5">
        <h2>Riwayat Belanja {{ pelanggan.getNama() }}</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Produk</td>
                    <td>Review</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <form method="POST">
            <input type="text" name="review">
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
{% endblock %}