<div class="container-fluid main-section">

  <div class="row"> 
    <div class="col-md-12 main">
      <div class="panel panel-primary">
        <div class="panel-heading">Información</div>
        <div class="panel-body">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 main">
      <div class="panel panel-primary">
        <div class="panel-heading">Almacenamiento</div>
        <div class="panel-body">
          <p><?=$disk_info['name']?> (<?=$disk_info['max_capacity']?>) - <?=$disk_info['usage']?> Disponibles</p>  
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?=$disk_info['usage_percent']?>%;">
              <?=$disk_info['usage_percent']?> %
            </div>
          </div>    
        </div>
      </div>
    </div>
  </div>
  
  <div class="row" >  
    <div class="col-md-12 main">
      <div class="panel panel-primary" id="map-container">
        <div class="panel-heading">Registro de temperatura<button type="button" id="chart-refresh_btn" class="btn btn-info btn-xs pull-right"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button></div>
        <div class="panel-body" id="chart-div">

        </div>
      </div>
    </div>
  </div>
</div>

