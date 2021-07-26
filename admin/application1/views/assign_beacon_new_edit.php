<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/default/components_thumbnails.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Feb 2017 05:37:07 GMT -->
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
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


        <!-- other -->

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
          <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/core/libraries/jquery.min.js"></script>

        <!--<link rel="stylesheet" href="<?php echo base_url() ?>/assets/js/plugins/iCheck/square/square.css">-->
        <!-- /global stylesheets -->

        <!-- Core JS files -->

   
   
        <!-- /theme JS files -->
        <style>
       
       /*     .navbar-nav {
               margin-top: 15px;
               margin-left: 0px!important;
            }*/ 

            .caret{
               margin-top: 0px;
            }

            /*.icon-paragraph-justify3{
               margin-top: -14px;
            }*/




            .panel-body {
                padding: 10px;
            }
            .alert, .thumbnail {
                margin-bottom: 5px;
            }
            


            canvas{
                background-image: url('<?= base_url('uploads/') . $space_detail->space_image ?>');
                background-repeat: no-repeat;
                background-size: 100% 100%;
            }
            /*legend{
                display: none;
            }*/
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

                <!-- Main sidebar -->
                <?php include 'include/sidebar.php'; ?>
                <!-- /main sidebar -->


                <!-- Main content -->
                <div class="content-wrapper">

                                        <!-- /page header -->
                    <!-- <div class="page-header">
                        <div class="page-header-content">
                            <div class="page-title">

                            </div>
                        </div>


                        <div class="breadcrumb-line breadcrumb-line-component">
                            <ul class="breadcrumb">
                                <li><a href="<?php echo site_url('control/spaces'); ?>"><i class="icon-home2 position-left"></i> Manage Beacons</a></li>
                                <li class='active'>Assign Beacons</li>
                            </ul>
                        </div>
                    </div> -->

                    <div class="page-header">

                                <!-- Header content -->
                                <div class="page-header-content">
                                    <div class="page-title">
                                        <h4><a href="<?php echo base_url(); ?>index.php/control/home"><i class="icon-arrow-left15 position-left"></i></a> <span class="text-semibold"></span>Manage Beacons</h4>
                                        <!-- <div class="heading-elements">
                                            <div class="heading-btn-group">


                                                <a href="<?php echo site_url('control/add_beacon/'.$space_detail->space_id);?>" class="btn bg-blue btn-labeled heading-btn"><b><i class="icon-plus3"></i></b> Add New Beacon </a>

                                            </div>
                                        </div> -->  



                                        <ul class="breadcrumb position-right">
                                            <li><a href="<?php echo base_url(); ?>index.php/control/home">Home</a></li>
                                            <li><a href="#">Floor Plan</a></li>
                                            <li class="active">Manage Beacons</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>




                    <div class="col-md-12 text text-center">  
                        <?php if ($this->session->flashdata('message')) { ?>
                            <div class="alert alert-success" id="flash">      
                                <?php echo $this->session->flashdata('message') ?>
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            </div>
                        <?php } ?>
                        <?php if ($this->session->flashdata('message_error')) { ?>
                            <div class="alert alert-danger" id="flash">      
                                <?php echo $this->session->flashdata('message_error') ?>
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>       
                            </div>
                        <?php } ?>
                        <!-- Content area -->
                    </div>
                    <div class="content">

                        <?php
                            if ($this->session->flashdata()) {
                                echo $this->session->flashdata('beacon_placed')."<br>";
                            }
                        ?>


                        <div class="panel panel-flat">


                        <div class="alert alert-danger" id="show_the_alert" style="display: none;">
                         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          Please add atleast one entrance beacon.
                        </div>

                            

                            <div class="panel-body">
                                <!-- <legend class="text-bold"></legend> -->
                                
                                <!-- <div style="padding: 10px;" align="right;">


                                    <a href="<?php echo site_url('control/add_beacon/'.$space_detail->space_id);?>"><button class="btn" style="background-color: #03A9F4;"></i>Add New Beacons</button></a>

                                </div> -->
                               
                                <?php
                                    if ($space_detail) {
                                        $width = $space_detail->width;
                                        $height = $space_detail->height;
//                                      echo '<pre>';
//                                      var_dump($beacon_details);die;
                                    ?>
                                    <div class="row">

                                        <div class="col-md-9" >
                                            <canvas style="border: 1px solid black; cursor: pointer;" width="<?= $width; ?>" height="<?= $height; ?>" ></canvas> 
                                        </div>
                                    </div>

                                <?php } ?>

                                <div class="text-center">

                                    <!-- <button type="submit"  id="space_point" space_id="<?= $space_detail->space_id; ?>" class="btn bg-blue btn-labeled heading-btn">Save Changes <i class="icon-arrow-right14 position-right"></i></button> -->
                                        <!-- =========================Yashraj code ===================--> 

                                    <button type="submit"  id="space_point" space_id="<?= $space_detail->space_id; ?>" class="btn bg-blue btn-labeled heading-btn">Save Changes<i class="icon-arrow-right14 position-right"></i></button> 

                                    

 <!-- =========================Yashraj code close ===================--> 
                                    
                                </div>
                                
                            </div>
                        </div>
                        <!-- /content area -->

                    </div>
                    <!-- /main content -->

                </div>
                <!-- /page content -->

            </div>
            <!-- /page container -->



    <!-- sta rt -->


        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/core/libraries/jquery.min.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins/loaders/pace.min.js"></script>
        <!-- <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/core/libraries/bootstrap.min.js"></script> -->

        
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins/loaders/blockui.min.js"></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        
        <!--<script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins/forms/styling/switchery.min.js"></script>-->

        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins/forms/styling/uniform.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins/media/fancybox.min.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins/uploaders/fileinput.min.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/core/app.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/pages/uploader_bootstrap.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/pages/components_thumbnails.js"></script>

    <!-- end -->

        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jcanvas/16.7.3/jcanvas.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



    <script type="text/javascript">
            
            var canvas = $('canvas');
            var patt = canvas.createPattern({
            // Define width/height of pattern (before repeating)
                width: <?= $space_detail->grid_pixel; ?>, height: <?= $space_detail->grid_pixel; ?>,
                source: function (context) {
                // Draw rectangle (which will repeat)
                    // $(this).drawRect({
                    //     fillStyle: 'transparent',
                    //     strokeStyle: '#009c56',
                    //     strokeWidth: 0.5,
                    //     x: 0, y: 0,
                    //     width: 1000, height: 1000,
                    //     fromCenter: false,
                    //     cornerRadius: 1
                    // }); 
                }
            });
            var distX, distY, dist;
            canvas.addLayer({
                type: 'rectangle',
                fillStyle: patt,
                x: 0, y: 0,
                name: "base",
                width: $(canvas).attr('width') * 1000, height: $(canvas).attr('height') * 1000,
                    click: function (layer) {
                        var distX, distY, dist;
                        distX = layer.eventX - layer.x;
                        distY = layer.eventY - layer.y;
                        // the distance from the circle's center
                        dist = Math.sqrt(Math.pow(distX, 2) + Math.pow(distY, 2));
                        layer.opacity = dist / layer.radius;
                    }
                }).drawLayers();
                                        
            function lineRedraw() {
                var pts = canvas.getLayerGroup('point');
                canvas.removeLayerGroup('line').drawLayers();
                canvas.removeLayerGroup('pointvalue').drawLayers();
                var obj = {
                    fillStyle: 'transparent',
                    strokeDash: [1, 0],
                    strokeStyle: '#000',
                    strokeWidth: 1,
                    rounded: true,
                    layer: true,
                    closed: true,
                    groups: ["line"],
                };


                //canvas.getLayerGroup('line');
                for (var p = 0; p < pts.length; p += 1) {
                    obj['x' + (p + 1)] = pts[p].x;
                    obj['y' + (p + 1)] = pts[p].y;

                    canvas.drawText({
                        fillStyle: "#ff0000",
                        strokeStyle: '#ff0000',
                        strokeWidth: 0,
                        x: pts[p].x+15, y: pts[p].y+30,
                        fontSize: '12pt',
                        fontFamily: 'Arial',
                        // fontColor: white,
                        text: 'Point' + (p + 1) + '(' + Number(pts[p].x/<?= $space_detail->grid_pixel; ?>).toFixed(1) + "ft," + Number(pts[p].y/<?= $space_detail->grid_pixel; ?>).toFixed(1) + "ft)",
                        layer: true,
                        text_name: 'Point' + (p + 1),
                        groups: ["pointvalue"],
                        fromCenter: true
                    })
                }
                canvas.drawLine(obj);
            }

            function clearcanvas() {
                canvas.removeLayerGroup('line').drawLayers();
                canvas.removeLayerGroup('point').drawLayers();
                canvas.removeLayerGroup('pointvalue').drawLayers();
                //canvas.clearCanvas();
            }

            function save() {
                var all = canvas.getLayerGroup('point');
                var txt = canvas.getLayerGroup('pointvalue');
                //  alert(all.toString());
                //var myObjString = JSON.stringify(all);
                seen = [];
                json = JSON.stringify(canvas, function (key, val) {
            
                if (typeof val == "object") {
                    if (seen.indexOf(val) >= 0)
                        return seen.push(val)
                    }
                return val
                })
            
                alert(json);
            
                for (var p = 0; p < all.length; p += 1) {
                    //obj['x' + (p + 1)] = all[p].x;
                    //obj['y' + (p + 1)] = all[p].y;
                    //alert(pts[p])
                    //alert(all[p].x);
                    //alert(txt[p].text);
                }
            }

            function unbindclick() {
                canvas.unbind("click");
            }
            
            function bindclick() {
                unbindclick();

            canvas.bind("click", function (event) {

            var totalOffsetX = 0;
            var totalOffsetY = 0;
            var canvasX = 0;
            var canvasY = 0;
            var currentElement = this;
            
            do {
            totalOffsetX += currentElement.offsetLeft - currentElement.scrollLeft;
            totalOffsetY += currentElement.offsetTop - currentElement.scrollTop;
            } while (currentElement = currentElement.offsetParent)
            canvasX = event.pageX - totalOffsetX;
            canvasY = event.pageY - totalOffsetY;
            //alert(canvasX);
            //return {x:canvasX, y:canvasY}
            var all = canvas.getLayerGroup('point');
            if (!all) {
                all = [];
                // alert("ASdf");
            }
            name = "point" + all.length;
            
            //alert(name);
            ////alert(all.length);

            canvas.addLayer({
                type: 'rectangle',
                fillStyle: '#ff0000',
                x: canvasX, y: canvasY,
                draggable: false,
                groups: ["point"],
                name: name,
                width: 15, height: 15,
                    mouseout: function (layer) {
                        lineRedraw();
                    }
                }).drawLayers();
            });
            }



            function removelast() {
                var all = canvas.getLayerGroup('point');
                var name = "point" + (all.length - 1);
                $('canvas').removeLayer(name).drawLayers();
                lineRedraw();
            }
                                      
            function addbeacon(beacon) {
                                            
                var beaconname = $(beacon).parent().attr('name');
                var id = $(beacon).parent().attr('names');
                
                // alert(id);

                var beacons = canvas.getLayerGroup('beacon');
                
                canvas.drawImage({
                    source: '<?= base_url('assets_c/images/beaconImage.png') ?>',
                    x: 150, y: 150,
                    width: 80/2,
                    height: 110/2,
                    layer: true,
                    name: beaconname,
                    groups: ["beacon"],
                    draggable: true,
                    fromCenter: false,
                    mouseout: function (layer) {
                        reasignbeaconpoint();
                    }
                }).drawLayers();

                // alert(beacons[0].id);

                reasignbeaconpoint();
                $(beacon).parent().css('background','rgba(0,0,0,.1)');
            }

            function reasignbeaconpoint() {
                var pts = canvas.getLayerGroup('beacon');
                canvas.removeLayerGroup('beaconvalue').drawLayers();

                for (var p = 0; p < pts.length; p += 1) {

                    canvas.drawText({
                        fillStyle: "#ff0000",
                        strokeStyle: '#ff0000',
                        strokeWidth: 0,
                        x: pts[p].x+15, y: pts[p].y+30,
                        fontSize: '12pt',
                        fontFamily: 'Arial',
                        

                        // text: pts[p].name + '(' + Number(pts[p].x/<?= $space_detail->grid_pixel; ?>).toFixed(1) + "ft," + Number(pts[p].y/<?= $space_detail->grid_pixel; ?>).toFixed(1) + "ft)",
                        
                        text: pts[p].name,


                        layer: true,
                        text_name: 'Beacon' + (p + 1),
                        groups: ["beaconvalue"],
                        // Measure (x, y) from the text's top-left corner
                        fromCenter: true
                    }).drawLayers();
                }
            }

            function zoomin() {
                canvas.scaleCanvas({
                    scale: 1.1
                }).drawLayers();
            }

            function zoomout() {
                canvas.scaleCanvas({
                    scale: 0.9
                }).drawLayers();
            }

            function rotate() {
                canvas.rotateCanvas({
                   rotate: 15
                }).drawLayers();
            }

            </script>
            
            <script>
                       
            $(document).ready(function () {
            // 
                $('#space_point').on('click', function () {
                    // alert("asdsad");    
                    var all = canvas.getLayerGroup('beacon');
                    var sample = new Array();
                    
                    if(all == undefined){
                        $("#show_the_alert").show();
                    }
                    
                    // alert(all);

                    for (var p = 0; p < all.length; p += 1) {
                        var point_name = all[p].name;
                        var point_x = all[p].x;
                        var point_y = all[p].y;

                        // alert(point_y);

                        sample.push({"space_id": <?= $space_detail->space_id ?>, "beacon_name": point_name, "point_x": point_x, "point_y": point_y});

                        // alert(point_name);
                    }

                    // alert("as");
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('control/save_edit_beacon'); ?>",
                        // data:{"point_name":point_name, "point_x" :point_x , "point_y": point_y},
                        
                        // alert(sample);
                        data: {"data": sample},
                            success: function (data) {

                                // alert(data);
                                if (data = true) {
                                    //location.reload();
                                    // window.location = "<?php echo site_url('control/spaces') ?>";
                                    window.location.href = "<?php echo base_url(); ?>index.php/control/assign_beacon/<?php echo $space_detail->space_id ?>";
                                    // alert("asdsd");
                                } else {
                                    // alert("sd");
                                }
                            }

                    });

                });
            });

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
                            x: <?= $point->point_x ?>, y: <?= $point->point_y ?>,
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
                            source: '<?= base_url('assets_c/images/beaconImage.png') ?>',
                            x: <?= $beacon->point_x ?>, y: <?= $beacon->point_y ?>,
                            width: 80/2,
                            height: 110/2,
                            layer: true,
                            // margin:3,
                            name: '<?= $beacon->beacon_name ?>',
                            groups: ["beacon"],
                            draggable: true,
                            fromCenter: true,
                            mouseout: function (layer) {
                                reasignbeaconpoint();
                            }

                        });
                        
                        $('[name=<?=$beacon->beacon_name?>]').css('background','rgba(0,0,0,.1)');

        
                <?php } ?>

                    reasignbeaconpoint();

                    function deletebeacon(beacon) {
                        var name = $(beacon).parent().attr('name');
                        canvas.removeLayer(name);
                            //alert(name);
                        $(beacon).parent().css('background','transparent');
                        //  $(beacon).parent().css('background','#00FF00');
                        reasignbeaconpoint();
                    }





            </script>

        






    </body>

    <!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/default/components_thumbnails.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Feb 2017 05:37:30 GMT -->
</html>
