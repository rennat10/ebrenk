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
                    <td>Tanggal</td>
                    <td>Status</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                {% for riwayat in riwayatBelanja %}
                    <tr>
                        <td>{{ loop.index }}.</td>
                        <td>{{ riwayat.getTanggal() }}</td>
                        <td>{{ riwayat.getStatus() }}</td>
                        <td>Rp. {{ riwayat.rupiah() }}</td>
                    </tr> 
                {% endfor %}
            </tbody>
        </table>
    </div>
{% endblock %}