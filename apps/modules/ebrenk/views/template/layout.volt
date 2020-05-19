<html>
    <head>
        {% include "template/css.volt" %}
    </head>
    <body>
        <nav class="navbar navbar-light" style="background-color: #26A81B">
            <div class="ml-5">
                <img src="{{ url('assets/images/serigala.png') }}" style="width: 200px; height: 40px;">
            </div>
            <div class="ml-auto" style="color: white; width: 25%;">
                <a id="layoutA" href="{{ url() }}">Login</a>
                <a id="layoutA" href="{{ url() }}">Daftar</a>
                <a id="layoutA" href="{{ url() }}">Checkout</a>
                <a id="layoutA" href="{{ url() }}">Cart</a>
            </div>
        </nav>

        {% include "template/js.volt" %}
    </body>
</html>