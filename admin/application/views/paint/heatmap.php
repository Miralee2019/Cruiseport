<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CashRub</title>

       <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="<?php echo base_url() ?>/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets/css/colors.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets/css/ques.css" rel="stylesheet" type="text/css">


        <!-- scripts -->

        <link href="<?php echo base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/custom1.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/dashboard1.css" rel="stylesheet" type="text/css">
        <link rel="icon" href="<?php echo base_url(); ?>assets/images/fevicon.png"/>        

        <!-- end -->


        <style>

            <?php if (!$dash[0]->store_logo) { ?>
                
               /* .navbar-nav {
                   margin-top: 15px;
                   margin-left: 0px!important;
                } 

                .caret{
                   margin-top: -14px;
                }

                .icon-paragraph-justify3{
                   margin-top: -14px;
                }*/

            <?php } ?> 
       
            .panel-body {
                padding: 10px;
            }
            .alert, .thumbnail {
                margin-bottom: 5px;
            }

            canvas{
                background-image: url('<?= base_url('uploads/') . $space_detail->space_image ?>');
                background-repeat: no-repeat;
                /*background-size: 100% 100%;*/
                /*z-index: -1;*/
            }

            .heading-btn:hover{
                color: white !important;
            }

        </style>
    </head>
  

  <body>


    <!-- Main navbar -->
    <?php include 'include/header.php'; ?>
    <!-- /main navbar -->
  
    <!-- Page container -->
    <div class="page-container">
        <!-- Page content -->
        <div class="page-content">
          
          <?php include 'include/sidebar.php'; ?>
          <!-- content wrapper -->
          <div class="content-wrapper">
            <!-- page header -->
            <div class="page-header">
              <!-- page header content -->
              <div class="page-header-content">
                <div class="page-title">
                  <h4><a href="<?php echo base_url(); ?>index.php/control/home"><i class="icon-arrow-left15 position-left"></i></a> <span class="text-semibold"></span>Heat Map</h4>

                  <ul class="breadcrumb position-right">
                    <li><a href="<?php echo base_url(); ?>index.php/control/home">Home</a></li>
                    <li><a href="#">Heat Map</a></li>
                    <!-- <li class="active">Manage Beacons</li> -->
                  </ul>
                </div>
              </div>
              <!-- end page header content-->
            </div>
            <!-- end page header -->

            <!-- start content -->
            <div class="content">
              <div class="panel panel-flat">
                
                <!-- start panel body -->

                <div class="panel-body">

                  <?php
                    if ($space_detail) {
                      $width = $space_detail->width;
                      $height = $space_detail->height;
                  ?>

                  <!-- start heatmapContainerWrapper -->

                  <div id="heatmapContainerWrapper" style="width:100%; height:100%;">
                    <div id="heatmapContainer" style="width:100%; height:100%;">

                        <div class="row">
                          <div class="col-md-9" >
                            <canvas style="border: 1px solid black; cursor: pointer;" width="<?= $width; ?>" height="<?= $height; ?>" ></canvas> 
                          </div>
                        </div>

                    </div>
                  </div>

                  <!-- end heatmapContainerWrapper -->

                  <?php } ?>

                </div>

                <!-- end panel body -->

              </div>
              <!-- end panel-flat -->
            </div>
            <!-- end content -->
          </div>
          <!-- content wrapper end -->
        </div>
        <!-- page content end   -->
    </div>
    <!-- page container end   -->

    <!-- scripts -->

    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins/loaders/blockui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins/media/fancybox.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins/uploaders/fileinput.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/pages/uploader_bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/pages/components_thumbnails.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jcanvas/16.7.3/jcanvas.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>




    <script type="text/javascript">
            
            var canvas = $('canvas');

    </script>

    <script>
                <?php foreach ($space_point as $point) { ?>
                        canvas.addLayer({
                            type: 'rectangle',
                            fillStyle: '#585',
                            x: <?= $point->point_x ?>, y: <?= $point->point_y ?>,
                            draggable: false,
                            groups: ["point"],
                            width: 15, height: 15,
                            mouseout: function (layer) {
                                lineRedraw();
                            }
                        }).drawText({
                            fillStyle: '#ff0000',
                            strokeStyle: '#000',
                            strokeWidth: 0,
                            x: <?= $point->point_x ?>, y: <?= $point->point_y - 15 ?>,
                            fontSize: '12pt',
                            fontFamily: 'Arial',
                            //                        text: 'Point'+all.length+'('+canvasX+","+canvasY+")",
                            text: '<?= $point->point_name ?>' + '(' +<?= $point->point_x ?> + "," +<?= $point->point_y ?> + ")",
                            text_name: '<?= $point->point_name ?>',
                            layer: true,
                            groups: ["pointvalue"],
                            // Measure (x, y) from the text's top-left corner
                            fromCenter: true

                        }).drawLayers();

                <?php } ?>

                lineRedraw();
    </script>

    <script>
            
                <?php foreach ($beacons as $beacon) { ?>
                        canvas.addLayer({
                            type: "image",
                            // source: '<?= base_url('assets_c/images/beaconImage.png') ?>',
                            x: <?= $beacon->point_x ?>, y: <?= $beacon->point_y ?>,
                            width: 80/2,
                            height: 110/2,
                            layer: true,
                            // margin:3,
                            name: '<?= $beacon->beacon_name ?>',
                            groups: ["beacon"],
                            draggable: false,
                            fromCenter: true,
                            mouseout: function (layer) {
                                reasignbeaconpoint();
                            }

                        });
                        
                        $('[name=<?=$beacon->beacon_name?>]').css('background','rgba(0,0,0,.1)');

        
                <?php } ?>

                    reasignbeaconpoint();

                    // function deletebeacon(beacon) {
                    //     var name = $(beacon).parent().attr('name');
                    //     canvas.removeLayer(name);
                    //         //alert(name);
                    //     $(beacon).parent().css('background','transparent');
                    //     //  $(beacon).parent().css('background','#00FF00');
                    //     reasignbeaconpoint();
                    // }





    </script>


    <!-- end canvas diagram script -->



      
    <script src="<?php echo base_url(); ?>assets/heatmap/heatmap.js"></script>
    <script>
        window.onload = function() {
        // create heatmap instance
        var heatmap = h337.create({
        container: document.getElementById('heatmapContainer'),
        // a waterdrop gradient ;-)
        gradient: { .1: 'rgba(0,0,0,0)', 0.25: "rgba(0,0,90, .6)", .6: "blue", .9: "cyan", .95: 'rgba(255,255,255,.4)'},
        maxOpacity: .6,
        radius: 10,
        blur: .90
    });

    <?php foreach ($beacons as $key) : 

        $CI =& get_instance();
        $CI->load->model('adminmodel');
        $heatCount = $CI->adminmodel->getHeatCountOfUser($key->beacon_name);

        ?>
          
        

            var canvas = $('canvas');
                    
            var generate = function() {
            
            var max = 100;
            var min = 0;
            // var t = [];
            var x = <?php echo $key->point_x; ?>;
            var y = <?php echo $key->point_y+35; ?>;
            var c = 100;
            var r = <?php if($heatCount[0]->heat_count_of_users) { echo $heatCount[0]->heat_count_of_users*10 ; } else { echo "1"; }  ?>;
                      
            // add the datapoint to heatmap instance
            heatmap.addData({ x: x, y:y, value: c, radius: r});

            // for drawImage
                    
            canvas.drawImage({
                source: '<?= base_url('assets_c/images/beaconImage.png') ?>',
                x: <?php echo $key->point_x-20; ?>, y: <?php echo $key->point_y-20; ?>,
                width: 80/2,
                height: 110/2,
                draggable: false,
                fromCenter: false,
            }).drawLayers();

            // end drawImage

            // For drawText

            canvas.drawText({
                fillStyle: "#ff0000",
                x: <?php echo $key->point_x; ?> , y: <?php echo $key->point_y; ?>,
                fontSize: '12pt',
                text: "<?php echo $key->beacon_name; ?>",
                fromCenter: true
            }).drawLayers();

            // end drawText
                
        };

        generate();



    <?php endforeach ?>
        
    };

    </script>


  </body>
</html>