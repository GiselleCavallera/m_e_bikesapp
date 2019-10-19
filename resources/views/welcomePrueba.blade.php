<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        
        <!------ Include the above in your HEAD tag ---------->

        <!-- Styles -->
        <style>
            .panel.with-nav-tabs .panel-heading{
                padding: 5px 5px 0 5px;
            }
            .panel.with-nav-tabs .nav-tabs{
                border-bottom: none;
            }
            .panel.with-nav-tabs .nav-justified{
                margin-bottom: -1px;
            }
            /********************************************************************/
            /*** PANEL DEFAULT ***/
            .with-nav-tabs.panel-default .nav-tabs > li > a,
            .with-nav-tabs.panel-default .nav-tabs > li > a:hover,
            .with-nav-tabs.panel-default .nav-tabs > li > a:focus {
                color: #777;
            }
            .with-nav-tabs.panel-default .nav-tabs > .open > a,
            .with-nav-tabs.panel-default .nav-tabs > .open > a:hover,
            .with-nav-tabs.panel-default .nav-tabs > .open > a:focus,
            .with-nav-tabs.panel-default .nav-tabs > li > a:hover,
            .with-nav-tabs.panel-default .nav-tabs > li > a:focus {
                color: #777;
                background-color: #ddd;
                border-color: transparent;
            }
            .with-nav-tabs.panel-default .nav-tabs > li.active > a,
            .with-nav-tabs.panel-default .nav-tabs > li.active > a:hover,
            .with-nav-tabs.panel-default .nav-tabs > li.active > a:focus {
                color: #555;
                background-color: #fff;
                border-color: #ddd;
                border-bottom-color: transparent;
            }
            .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu {
                background-color: #f5f5f5;
                border-color: #ddd;
            }
            .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a {
                color: #777;   
            }
            .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
            .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
                background-color: #ddd;
            }
            .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a,
            .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
            .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
                color: #fff;
                background-color: #555;
            }
        </style>
    </head>

    <body>

        <div class="container">
            <div class="page-header">
                <h1>Panels with nav tabs.<span class="pull-right label label-default">:)</span></h1>
            </div>
            <div class="row">
            	<div class="col-md-6">
                    <div class="panel with-nav-tabs panel-default">
                        <div class="panel-heading">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1default" data-toggle="tab">Default 1</a></li>
                                    <li><a href="#tab2default" data-toggle="tab">Default 2</a></li>
                                    <li><a href="#tab3default" data-toggle="tab">Default 3</a></li>
                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#tab4default" data-toggle="tab">Default 4</a></li>
                                            <li><a href="#tab5default" data-toggle="tab">Default 5</a></li>
                                        </ul>
                                    </li>
                                </ul>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab1default">Default 1</div>
                                <div class="tab-pane fade" id="tab2default">Default 2</div>
                                <div class="tab-pane fade" id="tab3default">Default 3</div>
                                <div class="tab-pane fade" id="tab4default">Default 4</div>
                                <div class="tab-pane fade" id="tab5default">Default 5</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel with-nav-tabs panel-primary">
                        <div class="panel-heading">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1primary" data-toggle="tab">Primary 1</a></li>
                                    <li><a href="#tab2primary" data-toggle="tab">Primary 2</a></li>
                                    <li><a href="#tab3primary" data-toggle="tab">Primary 3</a></li>
                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#tab4primary" data-toggle="tab">Primary 4</a></li>
                                            <li><a href="#tab5primary" data-toggle="tab">Primary 5</a></li>
                                        </ul>
                                    </li>
                                </ul>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab1primary">Primary 1</div>
                                <div class="tab-pane fade" id="tab2primary">Primary 2</div>
                                <div class="tab-pane fade" id="tab3primary">Primary 3</div>
                                <div class="tab-pane fade" id="tab4primary">Primary 4</div>
                                <div class="tab-pane fade" id="tab5primary">Primary 5</div>
                            </div>
                        </div>
                    </div>
                </div>
        	</div>
        </div>

</body>
</html>
