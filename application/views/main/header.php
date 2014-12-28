<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pistats</title>

  <!-- Bootstrap CSS -->
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
  <link rel="stylesheet" type="text/css" href="static/css/main.css">

    </head>
    <body>
<header>
     <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Pistats</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <!-- <li class="" id="status"><a href="#">Estado<span class="sr-only">(current)</span></a></li> -->
            <li id="user-admin"><a href="#" data-toggle="modal" data-target="#myModal">Administración de alertas</a></li>
            <li id="logout"><a href="login/logout">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

<!-- <dialog> -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Administración de usuarios</h4>
      </div>
      <div class="modal-body">
        Indique que usuarios recibirán una notificación en caso de alerta por temperatura excesiva.
      
          <table class="table">
            <thead>
              <tr>
                <th></th>
                <th>Usuario</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
        <?php foreach ($temp_alert_users as $user): ?>
              <tr>
                <td>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" <?php if ($user['notify_temp_alert'] == 1): ?>checked<?php endif; ?>>
                    </label>
                  </div>
                </td>
                <td class ="data-td login" style="padding-top: 16px;"><?=$user['login']?></td>
                <td class ="data-td email" style="padding-top: 16px;"><?=$user['email']?></td>
              </tr>
        <?php endforeach; ?>  
            </tbody>
          </table>        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary save-btn">Guardar cambios</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- </dialog> -->
</header>
