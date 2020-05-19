{% extends "template/layoutAdmin.volt" %}
{% block content %}
    <div class="mx-4 my-4" style="background-color: white; width: 77%; ">
        <h2 class="ml-3 mt-4" style="color: red;">Data Pelanggan</h2>
        <table class="table table-bordered ml-3 mr-3" style="width: 97%;">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                {% set nomor = 1 %}
                {% for pelanggan in pelangganList %}
                    <tr>
                        <td>{{ nomor }}</td>
                        <td>{{ pelanggan.getNama() }}</td>
                        <td>{{ pelanggan.getEmail() }}</td>
                        <td>
                            <form method="POST">
                                <input type="hidden" value="{{ pelanggan.getid() }}" name="id_pelanggan">
                                <button class="btn btn-danger" style="color: white">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    {% set nomor = nomor + 1 %}
                {% endfor %}
            </tbody>
        </table>
    </div>
{% endblock %}