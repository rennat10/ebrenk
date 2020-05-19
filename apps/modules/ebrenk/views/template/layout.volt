<html>
    <head>
        {% include "template/css.volt" %}
    </head>
    <body>
        <nav class="navbar navbar-light" style="background-color: #26A81B">
            <div class="ml-5">
                <img src="{{ url('assets/images/serigala.png') }}" style="width: 200px; height: 40px;">
            </div>
            <div class="ml-auto" style="color: white; width: 50%;">
                {% block navbar %}{% endblock %}
                <a id="layoutA" href="{{ url('ebrenk/user/checkout') }}">Checkout</a>
                <form style="display: inline;" method="POST" action="{{ url('ebrenk/user/cari') }}">
                    <div style="display: inline;">
                        <input type="text" name="substring" placeholder="Cari produk">
                        <button type="submit" id="layoutA" style="position: absolute; margin-left: -2.2%; margin-top: 0.4%;; color: black; border: none; background-color: white;"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </nav>
        {% block content %}{% endblock %}

        {% include "template/js.volt" %}
    </body>
</html>