<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
 
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cash Rub</title>

        <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
        <link href="<?php echo base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/custom1.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/dashboard1.css" rel="stylesheet" type="text/css">
        <link rel="icon" href="<?php echo base_url(); ?>assets/images/fevicon.png"/>        
        <link href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

        <link rel="Stylesheet" type="text/css" href="<?php echo base_url(); ?>paint/demo/demo.css" />
        <link rel="Stylesheet" type="text/css" href="<?php echo base_url(); ?>paint/lib/wColorPicker.min.css" />  
        <link rel="Stylesheet" type="text/css" href="<?php echo base_url(); ?>paint/wPaint.min.css"/>
        <!-- /global stylesheets -->

        <!-- Core JS files -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_inputs.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/jgrowl.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/moment/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/ripple.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/custom.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>paint/lib/jquery.ui.core.1.10.3.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>paint/lib/jquery.ui.widget.1.10.3.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>paint/lib/jquery.ui.mouse.1.10.3.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>paint/lib/jquery.ui.draggable.1.10.3.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>paint/lib/wColorPicker.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>paint/wPaint.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>paint/plugins/main/wPaint.menu.main.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>paint/plugins/text/wPaint.menu.text.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>paint/plugins/shapes/wPaint.menu.main.shapes.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>paint/plugins/file/wPaint.menu.main.file.min.js"></script>
        <!-- <script type="text/javascript" src="< ?php echo base_url(); ?>paint/plugins/file/wPaint.menu.main.file.js"></script> -->
        <!-- <script type="text/javascript" src="< ?php echo base_url(); ?>paint//plugins/main/src/wPaint.menu.main.js"></script> -->
  <!-- end -->

    <style type="text/css">

        .wPaint-menu-holder{
          width: 595px;
        }

    </style>


</head>
<body>

  <?php include 'include/header.php'; ?>
  
  <div class="page-container">
      <!-- Page content -->
      <div class="page-content">
          <?php include 'include/sidebar.php'; ?>
          <!-- Main content -->
          <div class="content-wrapper" style="background-color:#ededed;">
            
            <div class="page-header">

                                <!-- Header content -->
                                <div class="page-header-content">
                                    <div class="page-title">
                                        <h4><a href="<?php echo base_url(); ?>index.php/control/home"><i class="icon-arrow-left15 position-left"></i></a> <span class="text-semibold"></span>Draw Floor Plan</h4>
                                        <!-- <div class="heading-elements">
                                            <div class="heading-btn-group">
                                                <a href="<?php echo base_url(); ?>index.php/control/viewOffer" class="btn bg-blue btn-labeled heading-btn"><b><i class="icon-price-tag3"></i></b> View Offers </a>

                                            </div>
                                        </div>   -->



                                        <ul class="breadcrumb position-right">
                                            <li><a href="<?php echo base_url(); ?>index.php/control/home">Home</a></li>
                                            <li><a href="#">Draw Floor Plan</a></li>
                                            <!-- <li class="active">Add Offers</li> -->
                                        </ul>

                                    </div>
                                </div>
            </div>

            <div class="content">
                <div id="wPaint" style="position:relative; width:1000px; height:600px; background-color:white; margin:50px auto 20px 10px;"></div>
                <center id="wPaint-img"></center>
            </div>

          </div>

      </div>
  
  </div>    
</body>

<script type="text/javascript">
        var images = [
          '<?php echo base_url(); ?>/paint/test/uploads/wPaint.png',
        ];

        function saveImg(image) {
          var _this = this;

          $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>index.php/control/savePaintImage',
            data: {image: image},
            success: function (resp) {

            _this._displayStatus('Image saved successfully');
            resp = $.parseJSON(resp);
              images.push(resp.img);
              $('#wPaint-img').attr('src', image);
            }
          });

  


          $.get("<?php echo base_url(); ?>index.php/control/getLastPaintUpload", function(data, status){
            
            var str = data.replace(/\s+/g, '');

            var redi = '<?php echo base_url(); ?>index.php/control/assign_beacon/'+str;
            window.location.href = redi;

          });


          $.get("<?php echo base_url(); ?>index.php/control/getLastPaintUpload", function(data, status){
            
            var str = data.replace(/\s+/g, '');

            var redi = '<?php echo base_url(); ?>index.php/control/assign_beacon/'+str;
            window.location.href = redi;

          });
        }

        function loadImgBg () {
            this._showFileModal('bg', images);
        }

        function loadImgFg () {
            this._showFileModal('fg', images);
        }

        // init wPaint
        $('#wPaint').wPaint({
          menuOffsetLeft: -1,
          menuOffsetTop: -47,
          saveImg: saveImg,
          loadImgBg: loadImgBg,
          loadImgFg: loadImgFg
        });
      </script>


</html>