<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/default/components_thumbnails.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Feb 2017 05:37:07 GMT -->
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cannon Design</title>

        <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="<?php echo base_url() ?>/assets_c/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets_c/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets_c/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets_c/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets_c/css/colors.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets_c/css/ques.css" rel="stylesheet" type="text/css">
        <!-- /global stylesheets -->


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


        <!-- Core JS files -->
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/loaders/pace.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/loaders/blockui.min.js"></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/forms/styling/switchery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/forms/styling/uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/media/fancybox.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/core/app.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/pages/components_thumbnails.js"></script>
        <!-- /theme JS files -->
        <style>
            .panel-body {
                padding: 10px;
            }
            .alert, .thumbnail {
                margin-bottom: 5px;
            }
            .btn:hover{
                color:black !important;
            }
            .btn:focus{
                color:black !important;
            }
            canvas{
                background-image: url('<?= base_url('upload/') . $space_detail->space_image ?>');
                background-repeat: no-repeat;
                background-size: 100% 100%;
            }


        </style>
    </head>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
           <script>
    $(document).ready(function(){
        $('.copy_questionary').on('click', function() {
        alert();    
    
        var questionary_id = $(this).attr("id");
        alert(questionary_id);
          var data ='' ;
            $.ajax({
            type: "POST",
            url:"<?php echo site_url('main/copy_questionary'); ?>",
            data:{"questionary_id":questionary_id},
            success: function(data){
    //        alert(data);            
                if(data == 'yes'){
    //            alert(data);    
                    $("#msg").html('<div class="alert alert-success">Job code enabled successfully.<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>');
                } 
                else{
    //             alert(data);
                    $("#msg").html('<div class="alert alert-success">Job code disabled successfully.<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>');
    
            }    
            }
    //          alert(data);
    //   
        });
        
    });
    });
    </script>-->

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

                    <!-- Page header -->
                    <!--				<div class="page-header">
                                                            <div class="page-header-content">
                                                                    <div class="page-title">
                                                                            <h6><span class="text-semibold">Dashboard</span></h6>
                                                                    </div>
                    
                                                                    <div class="heading-elements">
                                                                            <div>
                                                                        <ul class="breadcrumb">
                                       <li><a href="#"><i class="icon-home2 position-left"></i> Manage Questionnaire</a></li>
                                                                      </ul>
                    
                                                            </div>
                                                            </div>
                                                            </div>
                    
                                                            
                                                    </div>-->
                    <!-- /page header -->
                    <div class="page-header">
                        <div class="page-header-content">
                            <div class="page-title">

                            </div>
                        </div>


                        <div class="breadcrumb-line breadcrumb-line-component">
                            <ul class="breadcrumb">
                                <li><a href="<?php echo site_url('main/spaces'); ?>"><i class="icon-home2 position-left"></i> Manage Space</a></li>
                                <!-- <li class='active'>Dashboard</li>  -->
                                <li class='active'>Draw Points</li>

                            </ul>
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


                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Draw Points</h5>
                                <div class="alert alert-info">
                                    <strong>Note:</strong> Each box will be represent to 1 ft.
                                </div>


                                <!--							<div class="heading-elements">
                                                                                                <ul class="icons-list">
                                                                                        <li><a data-action="collapse"></a></li>
                                                                                        <li><a data-action="reload"></a></li>
                                                                                        <li><a data-action="close"></a></li>
                                                                                </ul>
                                                                        </div>-->
                            </div>

                            <div class="panel-body">
                                <legend class="text-bold"></legend>
                                <div style="padding: 10px;">

                                    <button onclick="clearcanvas()" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i> Clear</button>
                                    <button onclick="bindclick()" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i> Add New Points</button>
                                    <button onclick="removelast()" class="btn btn-default"><i class="glyphicon glyphicon-trash"></i> Remove Point</button>
                                    <button onclick="unbindclick()" class="btn btn-default"><i class="glyphicon glyphicon-edit"></i> Re-arrange Points</button>
                               <!--     <button onclick="zoomin()" class="btn btn-default"><i class="glyphicon glyphicon-zoom-in"></i> Zoom In </button>
                                    <button onclick="zoomout()" class="btn btn-default"><i class="glyphicon glyphicon-zoom-out"></i> Zoom Out</button>
                                    <button onclick="rotate()" class="btn btn-default"><i class="glyphicon glyphicon-repeat"></i> Rotate</button>-->
                                    
                                    <input type="button" value="Go" class="btn btn-default" style="margin-left:5px; float:right;"/>  
                                    <label style="float:right;">Pixel</label>
                                    
                                    <input type="text" class="form-control" id="pixelsizetext" value="<?= $space_detail->grid_pixel; ?>" onkeypress="return isNumber(event)" style="width:100px; float:right;"/>
                                    <label style="float: right;">1'-0"=</label>
                                </div>

                                <?php
                                if ($space_detail) {
                                    $width = $space_detail->width;
                                    $height = $space_detail->height;
                                    ?>
                                    <div style="width: 960px; height: 500px ;  overflow-y: scroll; overflow-x: scroll;" >
                                        <canvas style="border: 1px solid black; cursor: pointer;" width="<?= $width; ?>" height="<?= $height; ?>" ></canvas>
                                    </div>	

                                <?php } ?>

                                <div class="text-center">
<!--                                    <button onclick="removelast()" class="btn btn-default"><i class="glyphicon glyphicon-repeat"></i> UnDo</button>
                                    <button onclick="clearcanvas()" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i> Clear</button>	-->
        <!--                            <button type="submit"  id="space_point" space_id="<?= $space_detail->space_id; ?>" class="btn btn-default">Save Changes <i class="icon-arrow-right14 position-right"></i></button>    -->

                                    <button type="submit"  id="space_point" space_id="<?= $space_detail->space_id; ?>" class="btn btn-default" style="margin-top:40px;">Save Changes <i class="icon-arrow-right14 position-right"></i></button>


                                </div>
                                </form>
                            </div>
                        </div>
                        <!-- /content area -->

                    </div>
                    <!-- /main content -->

                </div>
                <!-- /page content -->

            </div>
            <!-- /page container -->


            <script
                src="https://code.jquery.com/jquery-3.2.1.js"
                integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jcanvas/16.7.3/jcanvas.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script type="text/javascript">
                                        var canvas = $('canvas');

                                        function isNumber(evt) {
                                            evt = (evt) ? evt : window.event;
                                            var charCode = (evt.which) ? evt.which : evt.keyCode;
                                            //alert(charCode);
                                            if (charCode == 46) {
                                                return true;
                                            } else {
                                                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                                                    return false;
                                                }
                                                return true;
                                            }
                                        }
                                        $('#pixelsizetext').change(function () {


                                            var numberpixel = $(this).val();
                                            canvas.removeLayer('base').drawLayers();
                                            setbase(numberpixel);
                                            $('canvas').moveLayer('base', 0);
                                            lineRedraw();
                                        });
                                        setbase(<?= $space_detail->grid_pixel; ?>);
                                        function setbase(numberpixel1) {

                                            var patt = canvas.createPattern({
                                                // Define width/height of pattern (before repeating)
                                                width: numberpixel1, height: numberpixel1,
                                                source: function (context) {
                                                    // Draw rectangle (which will repeat)
                                                    $(this).drawRect({
                                                        fillStyle: 'transparent',
                                                        strokeStyle: '#009c56',
                                                        strokeWidth: 0.5,
                                                        x: 0, y: 0,
                                                        width: 1000, height: 1000,
                                                        fromCenter: false,
                                                        cornerRadius: 1
                                                    });
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




                                        }








                                        canvasbase = $('canvas').getLayer('base');


                                        function relMouseCoords(event) {
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
                                            alert(canvasX);
                                            return {x: canvasX, y: canvasY}


                                        }



                                        function lineRedraw() {
                                            //alert('asdf');
                                            var pts = canvas.getLayerGroup('point');
                                            //var lines = canvas.getLayerGroup('line');

                                            canvas.removeLayerGroup('line').drawLayers();
                                            canvas.removeLayerGroup('pointvalue').drawLayers();
                                            //lines.remove.drawLayers();
                                            //for (var p = 0; p < lines.length; p += 1) {
                                            // $('canvas').removeLayer(lines[p]).drawLayers();
                                            //  }
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
                                                //alert(pts[p])
                                                // alert(pts[p].x);


                                                canvas.drawText({
                                                    fillStyle: "#000",
                                                    strokeStyle: '#000',
                                                    strokeWidth: 0,
                                                    x: pts[p].x, y: pts[p].y - 15,
                                                    fontSize: '10pt',
                                                    fontFamily: 'Arial',
                                                    text: 'Point' + (p + 1) + '(' + Number(pts[p].x / Number($('#pixelsizetext').val())).toFixed(1) + "ft," + Number(pts[p].y / Number($('#pixelsizetext').val())).toFixed(2) + "ft)",
                                                    layer: true,
                                                    text_name: 'Point' + (p + 1),
                                                    groups: ["pointvalue"],
                                                    // Measure (x, y) from the text's top-left corner
                                                    fromCenter: true
                                                            // Rotate the text by 30 degrees
                                                            //
                                                            //  rotate: 0



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
                                                        return
                                                    seen.push(val)
                                                }
                                                return val
                                            })
                                            alert(json);
                                            //alert(myObjString.toString());
                                            // console.log(all);
                                            // alert(all.length);
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

                                                canvasX = canvasbase.eventX - canvasbase.x;
                                                canvasY = canvasbase.eventY - canvasbase.y;

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
                                                    fillStyle: '#585',
                                                    x: canvasX, y: canvasY,
                                                    draggable: true,
                                                    groups: ["point"],
                                                    name: name,
                                                    width: 15, height: 15,
                                                    mouseout: function (layer) {
                                                        lineRedraw();
                                                    }
                                                }).drawLayers();
                                                if (canvasX == 0) {
                                                    if (canvasY == 0) {
                                                        removelast();
                                                    }
                                                }


                                            });
                                        }



                                        function removelast() {
                                            var all = canvas.getLayerGroup('point');
                                            //alert(all.length);
                                            var name = "point" + (all.length - 1);

                                            $('canvas').removeLayer(name).drawLayers();
                                            // $('canvas').removeLayer(all.length - 1).drawLayers();
                                            // $('canvas').removeLayer(all.length - 1).drawLayers();
                                            lineRedraw();
                                        }


                                        function addbeacon(beacon) {
                                            var beacons = canvas.getLayerGroup('beacon');
                                            //alert(beacons);
                                            if (!beacons) {
                                                beacons = []
                                            }
                                            var beaconname = "Beacon" + (beacons.length + 1);
                                            //alert(beaconname);
                                            // alert(alllayers.length);
                                            //canvas.moveLayer('box', 1);    
                                            //alert($(beacon).attr('name'));
                                            canvas.drawImage({
                                                source: '<?= base_url('assets_c/images/beaconImage.png') ?>',
                                                x: 50, y: 50,
                                                width: 15,
                                                height: 20,
                                                layer: true,
                                                name: beaconname,
                                                groups: ["beacon"],
                                                draggable: true,
                                                fromCenter: false
                                            }).drawLayers();

                                            //$(beacon).fadeOut(1000);

                                        }


                                        function zoomin() {
                                            //canvas.scaleCanvas({
                                            // scale: 1.1
                                            //  }).drawLayers();
//var h=   $(canvas).css('height')+50;
                                            //  var w= $(canvas).css('width')+50;
                                            $(canvas).css('-height', '+=50px');
                                            $(canvas).css('-width', '+=50');


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

                //                function save(){
                //                   
                $(document).ready(function () {
                    $('#space_point').on('click', function () {
                        //    alert();    
                        var all = canvas.getLayerGroup('point');
                        var txt = canvas.getLayerGroup('pointvalue');
                        var space_id = $(this).attr("space_id");
                        //        alert(space_id);
                        var count = all.length;
                        if (count > 2) {
                            var sample = new Array();
                            for (var p = 0; p < all.length; p += 1) {
                                var point_name = txt[p].text_name;
                                var point_x = all[p].x;
                                var point_y = all[p].y;
                                var numberpixel = $('#pixelsizetext').val();
                                sample.push({"space_id": space_id, "grid_pixel": numberpixel, "point_name": point_name, "point_x": point_x, "point_y": point_y});
                            }

                            $.ajax({
                                type: "POST",
                                url: "<?php echo site_url('main/save_spacepoint'); ?>",
                                //        data:{"point_name":point_name, "point_x" :point_x , "point_y": point_y},
                                data: {"data": sample},
                                success: function (data) {
                                    //        alert(data);            
                                    if (data == 'true') {
                                        //            alert(data);    
                                        window.location = " <?php echo site_url('main/spaces') ?>";
                                        //            $("#msg").html('<div class="alert alert-success">Job code enabled successfully.<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>');
                                    } else {
                                        //             alert(data);
                                        //                $("#msg").html('<div class="alert alert-success">Job code disabled successfully.<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>');

                                    }
                                }
                                //          alert(data);
                                //   
                            });

                        } else {

                            alert('Please select more then 2 point');
                        }

                    });
                });





            </script>

            <script>

<?php
foreach ($space_point as $point) {
    ?>
                    canvas.addLayer({
                        type: 'rectangle',
                        fillStyle: '#585',
                        x: <?= $point->point_x ?>, y: <?= $point->point_y ?>,
                        draggable: true,
                        groups: ["point"],
                        width: 15, height: 15,
                        mouseout: function (layer) {
                            lineRedraw();
                        }
                    }).drawText({
                        fillStyle: '#000',
                        strokeStyle: '#000',
                        strokeDash: [1, 1, ],
                        strokeWidth: 0,
                        x: <?= $point->point_x ?>, y: <?= $point->point_y - 15 ?>,
                        fontSize: '10pt',
                        fontFamily: 'Arial',
                        //                        text: 'Point'+all.length+'('+canvasX+","+canvasY+")",
                        text: '<?= $point->point_name ?>' + '(' +<?= $point->point_x ?> + "," +<?= $point->point_y ?> + ")",
                        text_name: '<?= $point->point_name ?>',
                        layer: true,
                        groups: ["pointvalue"],
                        // Measure (x, y) from the text's top-left corner
                        fromCenter: true
                                // Rotate the text by 30 degrees
                                //
                                //  rotate: 0
                    }).drawLayers();

    <?php
}
?>

                lineRedraw();


            </script>

    </body>

    <!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/default/components_thumbnails.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Feb 2017 05:37:30 GMT -->
</html>
