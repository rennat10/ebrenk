<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login EBrenk</title>
    {% include "template/css.volt" %}
</head>
<body>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <br /><br />
                <h2> EBrenk : Login</h2>
                 <br />
            </div>
        </div>
         <div class="row text-center mx-auto">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 mx-auto">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>   Enter Details To Login </strong>  
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <br />
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                <input type="text" class="form-control" name="username" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                <input type="password" class="form-control"  name="password" />
                            </div>
                                
                            <button class="btn btn-primary" name="login">Login</button>
                            <hr />
                            Not register ? <a href="{{ url('ebrenk\admin\daftar') }}" >click here </a> 
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
