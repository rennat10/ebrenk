{% extends "template/layoutAdmin.volt" %}
{% block content %}
    <div class="mx-4 my-4" style="background-color: white; width: 77%; ">
        <h2 class="ml-3 mt-4" style="color: red;">Data Pembelian</h2>
        <table class="table table-bordered ml-3 mr-3" style="width: 97%;">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama Pelanggan</td>
                    <td>Tanggal</td>
                    <td>Status Pembelian</td>
                    <td>Total</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                {% set nomor = 1 %}
                {% for pembelian in pembelianList %}
                    <tr>
                        <td>{{ nomor }}</td>
                        <td>{{ pembelian["nama_pelanggan"] }}</td>
                        <td>{{ pembelian["tanggal_pembelian"] }}</td>
                        <td>{{ pembelian["status_pembelian"] }}</td>
                        <td>{{ pembelian["total_pembelian"] }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ url('ebrenk/admin/detail/' ~ pembelian['id_pembelian']) }}">Detail</a>
                        </td>
                    </tr>
                    {% set nomor = nomor + 1 %}
                {% endfor %}
            </tbody>
        </table>
    </div>
{% endblock %}