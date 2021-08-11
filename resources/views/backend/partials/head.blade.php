

    <link rel="apple-touch-icon" href={{asset("assets/backend/images/ico/apple-icon-120.png")}}>
    <link rel="shortcut icon" type="image/x-icon" href={{asset("assets/backend/images/ico/favicon.ico")}}>
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">

          @if(App::getLocale() == 'en')

          <link rel="stylesheet" type="text/css" href={{asset("assets/backend/css/plugins/animate/animate.css")}}>
          <!-- BEGIN VENDOR CSS-->
          <link rel="stylesheet" type="text/css" href={{asset("assets/backend/css/vendors.css")}}>

          @else
<link rel="stylesheet" type="text/css" href={{asset("assets/backend/css-rtl/plugins/animate/animate.css")}}>
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/css-rtl/vendors.css")}}>
          @endif

    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/vendors/css/weather-icons/climacons.min.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/fonts/meteocons/style.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/vendors/css/charts/morris.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/vendors/css/charts/chartist.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/vendors/css/forms/selects/select2.min.css")}}>
    <link rel="stylesheet" type="text/css"
          href={{asset("assets/backend/vendors/css/charts/chartist-plugin-tooltip.css")}}>
    <link rel="stylesheet" type="text/css"
          href={{asset("assets/backend/vendors/css/forms/toggle/bootstrap-switch.min.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/vendors/css/forms/toggle/switchery.min.css")}}>


    @if (App::getLocale() == 'en')

    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/css/core/menu/menu-types/vertical-menu.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/css/pages/chat-application.css")}}>
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/css/app.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/css/custom-rtl.css")}}>
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href={{asset("assets/backend/css/core/menu/menu-types/vertical-menu.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/css/core/colors/palette-gradient.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/css/core/colors/palette-gradient.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/css/pages/timeline.css")}}>

    @else

    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/css-rtl/core/menu/menu-types/vertical-menu.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/css-rtl/pages/chat-application.css")}}>
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/css-rtl/app.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/css-rtl/custom-rtl.css")}}>
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href={{asset("assets/backend/css-rtl/core/menu/menu-types/vertical-menu.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/css-rtl/core/colors/palette-gradient.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/css-rtl/core/colors/palette-gradient.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/css-rtl/pages/timeline.css")}}>
    @endif


    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/fonts/simple-line-icons/style.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/vendors/css/cryptocoins/cryptocoins.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/vendors/css/extensions/datedropper.min.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/vendors/css/extensions/timedropper.min.css")}}>
    <!-- END Page Level CSS-->


    <!-- BEGIN Custom CSS-->
      @if(App::getLocale() == 'en')

    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/css/style.css")}}>

    @else

    <link rel="stylesheet" type="text/css" href={{asset("assets/backend/css-rtl/style-rtl.css")}}>

    @endif
    <!-- END Custom CSS-->




    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
