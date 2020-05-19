{% extends "template/layout.volt" %}
{% block navbar %}
    <a id="layoutA" href="{{ url('ebrenk/user/login') }}">Login</a>
    <a id="layoutA" href="{{ url('ebrenk/user/daftar') }}">Daftar</a>
{% endblock %}

{% block content %}
    <div class="mx-auto mt-5 w-25" style="border: 1px solid lightgray; background-color: #f5f5f5">
        <div class="text-center py-1" style="background-color: #26A81B;">
            <h3>Login</h3>
        </div>
        <div class="mt-4">
            <form method="POST">
                <div class="form-group mx-auto w-75">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group mx-auto w-75">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="text-center mb-3" style="width: 100%;">
                    <button class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
{% endblock %}