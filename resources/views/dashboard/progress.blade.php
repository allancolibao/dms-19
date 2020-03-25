@extends('layouts.main')

@section('content') 
<div class="content">

    {{-- Fusion chart controller --}}
    <?php require_once(app_path().'/Includes/fusioncharts.php'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                    <h4 class="title">TOTAL OF 40 PROVINCES 2018</h4>
                        <p class="category">Based on data transmission</p>
                    </div>
                    <div class="content">
                    <div id="chart-1"></div>
                   
                    <div class="footer">
                        <div class="legend">
                            <i class="fa fa-circle text-success"></i> Encoded
                            <i class="fa fa-circle text-warning"></i> Not Encoded
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="fa fa-history"></i> Updated : <span id="datetime"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
              <div class="col-md-4">
                <div class="card">
                    <div class="header">
                    <h4 class="title">LIST OF 40 PROVINCES 2018</h4>
                        <p class="category">Mark check if done</p>
                    </div>
                    <div class="content">
                      <div class="row">
                        <div class="col-md-6">
                          <p class="category">Cagayan</p>
                          <p class="category">Bulacan</p>
                          <p class="category">Eastern Samar</p>
                          <p class="category">Taguig City</p>
                          <p class="category">Abra</p>
                          <p class="category">Olongapo City</p>
                          <p class="category">Iloilo City</p>
                          <p class="category">Zamboanga del Norte</p>
                          <p class="category">Cagayan de Oro City</p>
                          <p class="category">Quezon City</p>
                          <p class="category">Nueva Vizcaya</p>
                          <p class="category">Laguna</p>
                          <p class="category">Tacloban City</p>
                          <p class="category">Northern Samar</p>
                          <p class="category">Maguindanao</p>
                          <p class="category">Iloilo</p>
                          <p class="category">Mandaue City</p>
                          <p class="category">Las Pinas City</p>
                          <p class="category">Mountain Province</p>
                          <p class="category">Oriental Mindoro</p>
                          <p class="category">Camarines Norte</p>
                          <p class="category">Sultan Kudarat</p>
                          <p class="category">Manila City</p>
                          <p class="category">Mandaluyong City</p>
                          <p class="category">San Juan City</p>
                          <p class="category">Isabela</p>
                          <p class="category">Sorsogon</p>
                          <p class="category">Aklan</p>
                          <p class="category">City of Isabela</p>
                          <p class="category">Baguio City</p>
                        </div>
                        <div class="col-md-6">
                          <p class="category">Zambales</p>
                          <p class="category">Siquijor</p>
                          <p class="category">Samar (Western Samar)</p>
                          <p class="category">Caloocan City</p>
                          <p class="category">Butuan City</p>
                          <p class="category">Capiz</p>
                          <p class="category">Camiguin</p>
                          <p class="category">Davao City</p>
                          <p class="category">Davao Occidental </p>
                          <p class="category">Makati City</p>
                          </div>
                        </div><br>
                        <div class="footer">
                          <div class="legend">
                            <i class="fa fa-check text-success"></i><span class="category" style="text-decoration: line-through;">Done</span>
                            <i class="fa fa-arrow-circle-right text-warning"></i><span class="category" style="text-decoration: none;">On going</span>
                        </div>
                        <hr>
                        <div class="stats">
                                <i class="fa fa-history"></i>
                        </div>
                    </div>
                </div>
            </div>
          </div>
      </div>
    </div>
  </div>
<?php

$columnChart = new FusionCharts("doughnut2d", "ex1", "100%", 650, "chart-1", "json", '{
  "chart": {
    "caption": "",
    "subcaption": "",
    "showpercentvalues": "1",
    "defaultcenterlabel": "4491 EAs",
    "aligncaptionwithcanvas": "3",
    "captionpadding": "0",
    "decimals": "2",
    "plottooltext": "<b>$percentValue</b> <b>$label</b>",
    "centerlabel": "$label $value",
    "theme": "fint"
  },
  "data": [
    {
      "label": "Encoded",
      "value": "'.$encoded.'"
    },
    {
      "label": "Not encoded",
      "value": "'.$notencoded.'"
    }
  ]
}');

$columnChart->render();
?>


@endsection
