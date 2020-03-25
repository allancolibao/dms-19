@extends('layouts.main')

@section('content') 
<div class="content">

{{-- Fusion chart controller --}}
<?php require_once(app_path().'/Includes/fusioncharts.php'); ?>

<div class="row">
    <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                        <h4 class="title">40 PROVINCES OF 2018</h4>
                        <p class="category">Based on data transmission</p>
                    </div>
                <div class="content">
                    <div id="chart-container"></div>
                        <div class="footer">
                            <hr>
                            <div class="stats">
                                 <i class="fa fa-history"></i> Updated : <span id="datetime"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Chart --}}
<?php
$barChart = new FusionCharts("bar2d", "myFirstChart" , "100%", 1000, "chart-container", "json",
    ' {
        "chart": {
            "caption": "",
            "numberSuffix": "%",
            "paletteColors": "#87CB16",
            "useplotgradientcolor": "0",
            "plotBorderAlpha": "0",
            "bgColor": "#ffffff",
            "canvasBgColor": "#ffffff",
            "showValues":"1",
            "showCanvasBorder": "0",
            "showBorder": "0",
            "divLineColor": "#DCDCDC",
            "alternateHGridColor": "#DCDCDC",
            "labelDisplay": "auto",
            "baseFont": "Arial",
            "baseFontColor": "#00ace0",
            "outCnvBaseFont": "Arial",
            "outCnvBaseFontColor": "#8A8A8A",
            "baseFontSize": "15",
            "outCnvBaseFontSize": "15",
            "yAxisMinValue":"90",
            "labelFontColor": "#8A8A8A",
            "captionFontColor": "#00708f",
            "captionFontBold": "0",
            "captionFontSize": "25",
            "subCaptionFontColor": "#153957",
            "subCaptionfontSize": "20",
            "subCaptionFontBold": "0",
            "captionPadding": "20",
            "valueFontBold": "0",
            "showAxisLines": "1",
            "yAxisLineColor": "#DCDCDC",
            "xAxisLineColor": "#DCDCDC",
            "xAxisLineAlpha": "15",
            "yAxisLineAlpha": "15",
            "toolTipPadding": "7",
            "toolTipBorderColor": "#DCDCDC",
            "toolTipBorderThickness": "0",
            "toolTipBorderRadius": "2",
            "showShadow": "0",
            "toolTipBgColor": "#153957",
            "theme": "fint"
          },
        "data": [{
            "label": "Manila",
            "value": "'.$mnl.'"
          }, {
            "label": "Quezon City",
            "value": "'.$qcc.'"
          }, {
            "label": "San Juan",
            "value": "'.$sj.'"
          }, {
            "label": "Laguna",
            "value": "'.$lag.'"
        }, {
            "label": "Cagayan",
            "value": "'.$cag.'"
        }, {
            "label": "Bulacan",
            "value": "'.$bul.'"
        }, {
            "label": "Eastern Samar",
            "value": "'.$east.'"
        }, {
            "label": "Taguig City",
            "value": "'.$tag.'"
        }, {
            "label": "Abra",
            "value": "'.$abr.'"
        }, {
            "label": "Olongapo City",
            "value": "'.$olong.'"
        }, {
            "label": "Iloilo City",
            "value": "'.$ilocity.'"
        }, {
            "label": "Zamboanga del Norte",
            "value": "'.$zdn.'"
        }, {
            "label": "Cagayan de Oro City",
            "value": "'.$cdoc.'"
        }, {
            "label": "Nueva Vizcaya",
            "value": "'.$nv.'"
        }, {
            "label": "Tacloban City",
            "value": "'.$tc.'"
        }, {
            "label": "Northern Samar",
            "value": "'.$ns.'"
        }, {
            "label": "Maguindanao",
            "value": "'.$mag.'"
        }, {
            "label": "Iloilo Province",
            "value": "'.$ilo.'"
        }, {
            "label": "Mandaue City",
            "value": "'.$man.'"
        }, {
            "label": "Las Pinas City",
            "value": "'.$las.'"
        }, {
            "label": "Mountain Province",
            "value": "'.$mtp.'"
        }, {
            "label": "Oriental Mindoro",
            "value": "'.$or.'"
        }, {
            "label": "Camarines Norte",
            "value": "'.$cn.'"
        }, {
            "label": "Sultan Kudarat",
            "value": "'.$sk.'"
        }, {
            "label": "Mandaluyong City",
            "value": "'.$manda.'"
        }, {
            "label": "Isabela",
            "value": "'.$isa.'"
        }, {
            "label": "Sorsogon",
            "value": "'.$sor.'"
        }, {
            "label": "Aklan",
            "value": "'.$ak.'"
        }, {
            "label": "City of Isabela",
            "value": "'.$coisbl.'"
        }, {
            "label": "Baguio City",
            "value": "'.$bc.'"
        }, {
            "label": "Zambales",
            "value": "'.$zam.'"
        }, {
            "label": "Siquijor",
            "value": "'.$siq.'"
        }, {
            "label": "Western Samar",
            "value": "'.$ws.'"
        }, {
            "label": "Caloocan City",
            "value": "'.$cc.'"
        }, {
            "label": "Butuan City",
            "value": "'.$but.'"
        }, {
            "label": "Capiz",
            "value": "'.$cap.'"
        }, {
            "label": "Camiguin",
            "value": "'.$camig.'"
        }, {
            "label": "Davao City",
            "value": "'.$davc.'"
        }, {
            "label": "Davao Occidental",
            "value": "'.$dvoc.'"
        }, {
            "label": "Makati City",
            "value": "'.$makati.'"
          }]
    }');
$barChart->render();
?>

@endsection
