<!DOCTYPE html>
<html>
<head>
    <title>Timeline</title>
    <link title="timeline-styles" rel="stylesheet" href="//cdn.knightlab.com/libs/timeline3/latest/css/timeline.css">

    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,200,100,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/styles-responsive.css">
    <link rel="stylesheet" href="assets/css/themes/theme-style7.css">


    <link rel="stylesheet" href="assets/plugins/iCheck/skins/all.css">

    <link rel="stylesheet" href="assets/plugins/perfect-scrollbar/src/perfect-scrollbar.css">

    <link rel="stylesheet" href="assets/plugins/animate.css/animate.min.css">

    <link rel="stylesheet" href="assets/css/plugins.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet"/>

<style>
    #he{
        height: 80px;
    }

</style>

</head>

<body class="layout-boxed">

<header class="topbar navbar navbar-inverse navbar-fixed-top inner" id="he">
    <div class="container">
    
     <div>
        <img src="images/logoerbol.svg"  alt="" style="width: 100px">  
        
      </div>    
        <div class="navbar-header">

        </div>
        <div class="topbar-tools" id="bs-example-navbar-collapse-1">
        </div>
    </div>
</header>



<br><br><br><br>

<div class="container">


         <form action="{{ url('/timeline') }}"
              method="GET"
              role="search"
              class="navbar-form navbar-left">

            <div class="title"><h1>Timeline</h1></div>
            <h2>Ingresa los criterios de busqueda</h2>

            <div class="form-group">
                    <select class="js-example-basic-multiple form-control"
                            multiple="multiple"
                            id="tagSelect"
                            name="tags[]"
                            style="width: 900px" 
                            >
                    </select>
                
            </div>
            <div class="input-group">
                    
                    <span class="input-group-btn">
                        <button type="submit"
                                id="Buscar" 
                                class="btn btn-green btn-lg">
                                <i class="fa fa-search"></i>
                                            Buscar
                        </button>
                    </span>
                </div>
        </form>



    <div class="content" id="timelinediv">
       
        <br><br><br>

        <div id='timeline' style="width: 100%; height: 600px"></div>

    </div>

<footer class="inner">
                <div class="footer-inner">
                    <div class="pull-left">
                        2016 &copy; Periódico Digital ERBOL
                    </div>
                    <div class="pull-right">
                        <span class="go-top"><i class="fa fa-chevron-up"></i></span>
                    </div>
                </div>
</footer>
</div>





<script src="jquery-2.2.3.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>
    
<script src="http://cdn.knightlab.com/libs/timeline3/latest/js/timeline.js"></script>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>


<script src="js/script.js"/>

<script type="text/javascript">
    var additionalOptions = {
        start_at_end: true,
        timenav_height: 250
    };

</script>
<script>
    var totoro = {!!empty($json) ? "'marktwain.json'" : "JSON.parse($json);"!!};
    var timeline = new TL.Timeline('timeline', totoro, {
        start_at_end: true,
        language: 'es',
        timenav_mobile_height_percentage: 40,
        timenav_position: 'top',
        timenav_height_percentage: 25
    });
</script>

<script src="assets/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
<script src="assets/plugins/jquery.scrollTo/jquery.scrollTo.min.js"></script>
<script src="assets/plugins/velocity/jquery.velocity.min.js"></script>
<script src="assets/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
<script src="assets/js/main.js"></script>

<script>
        jQuery(document).ready(function() {
            Main.init();
                
        });
    </script>

</body>
</html>
