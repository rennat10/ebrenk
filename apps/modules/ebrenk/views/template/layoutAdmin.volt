<html>
    <head>
        {% include "template/css.volt" %}
    <head>
    <body>
        <nav class="navbar navbar-light" style="background-color: #4D4D4D; padding: 0;">
            <a class="navbar-brand" style="background-color: #C90000; width: 260px; margin: 0;text-align: center; height: 60px; font-size: 30px;font-weight: 700; color: white;">EBrenk</a>
            <div class="pr-5">
                <a class="btn btn-danger" style="color: white; border: 0; border-radius: 0;" href="{{ url('ebrenk/admin/keluar') }}">Logout</a>
            </div>
        </nav>
        <div class="container-fluid" style="background-color: #F3F3F3;">
            <div class="row h-100">
                <div class="sidebar-sticky" style="background-color: #202020; width: 260px;">
                    <ul class="nav flex-column">
                        <li class="nav-item d-flex justify-content-center align-items-center" style="border-bottom: 1px solid #4D4D4D; height: 154px;">
                            <img src="{{ url('assets/images/find_user.png') }}">
                        </li>
                        <li class="nav-item d-flex align-items-center" style="border-bottom: 1px solid #4D4D4D; height: 72px;">
                            <i class="fa fa-dashboard fa-3x" style="color: white;"></i>
                            <a class="nav-link active" href="{{ url('ebrenk/admin/home') }}" style="color: white;">
                                Home
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center" style="border-bottom: 1px solid #4D4D4D; height: 72px;">
                            <i class="fa fa-dashboard fa-3x" style="color: white;"></i>
                            <a class="nav-link" href="{{ url('ebrenk/admin/produk') }}" style="color: white;">
                                Produk
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center" style="border-bottom: 1px solid #4D4D4D; height: 72px;">
                            <i class="fa fa-dashboard fa-3x" style="color: white;"></i>
                            <a class="nav-link" href="{{ url('ebrenk/admin/pembelian') }}" style="color: white;">
                                Pembelian
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center" style="border-bottom: 1px solid #4D4D4D; height: 72px;">
                            <i class="fa fa-dashboard fa-3x" style="color: white;"></i>
                            <a class="nav-link" href="{{ url('ebrenk/admin/pelanggan') }}" style="color: white;">
                                Pelanggan
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center" style="border-bottom: 1px solid #4D4D4D; height: 72px;">
                            <i class="fa fa-dashboard fa-3x" style="color: white;"></i>
                            <a class="nav-link" href="{{ url('ebrenk/admin/keluar') }}" style="color: white;">
                                Keluar
                            </a>
                        </li>

                    </ul>
                </div>
                {% block content %}{% endblock %}
            </div>
        </div>

        {% include "template/js.volt" %}
    </body>
</html>