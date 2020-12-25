<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Police Scorecard - Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">

        <link href="{{ asset('/favicon.ico') }}" rel="shortcut icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css">

        <style>
            .main {
                padding-top: 40px;
            }

            .navbar-brand {
                color: #FFF !important;
            }

            .download-link {
                color: #222;
                text-decoration: none;
                font-weight: bold;
            }

            .download-link:hover {
                color: #000;
                text-decoration: underline;
            }

            .card-header {
                border: 1px solid #ddd;
                background: #eee;
            }

            .card-header h5 {
                margin: 0;
            }

            .card-header .btn-link {
                width: 100%;
                text-align: left;
            }

            .card-body {
                border: 1px solid #ddd;
                background: #f7f7f7;
            }

            .accordion {
                margin-top: 10px;
            }

            .accordion ul {
                margin-left: 12px;
                padding: 10px 16px;
            }

            button.btn {
                width: 200px;
                text-align: center;
            }

            #results {
                margin-top: 20px;
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand">
                        <a href="/admin" style="color: white;">Police Scorecard</a>
                    </div>
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="https://docs.google.com/spreadsheets/d/14ZrbaHnzb2eTtrwLS2o8CwNC7EJ90ZVHAVksf81Bfo8/edit" rel="noopener" target="_blank">Manage Data</a>
                        </li>

                        <li class="dropdown">
                            <a href="/admin/clear-cache">Clear Cache</a>
                        </li>

                        <li class="dropdown">
                            <a href="/admin/mapbox">Mapbox</a>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </nav>

        @if($clearCache)
        <div class="container main" role="main">
            <div class="page-header">
                <h1>Cache Cleared</h1>
            </div>
            <p class="text-success">Application &amp; API Cache has been cleared.</p>
        </div>
        @elseif($mapbox)
        <div class="container main" role="main">
            <div class="page-header">
                <h1>Mapbox Tiles</h1>
            </div>

            @if($updated && $response && isset($response['id']))
            <div class="alert alert-success alert-dismissible" role="alert">
                <strong>UPDATE SUCCESS:</strong> Updated Mapbox Tileset: {{ $response['id'] }} ( {{ bytesToHuman($response['file_size']) }} )
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @else
            <div class="alert alert-danger alert-dismissible" role="alert">
                <strong>UPDATE ERROR:</strong> <span id="api-error-message">{{ $error ? $error : 'An Unknown Error has Occurred.' }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            @if($updated && $response && isset($response['id']))
                @if($published && $response && isset($response['published']) && isset($response['published']['jobId']))
            <div class="alert alert-success alert-dismissible" role="alert">
                <strong>PUBLISH SUCCESS:</strong> {{ $response['published']['response'] }} ( {{ $response['published']['jobId'] }} )
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                @else
            <div class="alert alert-danger alert-dismissible" role="alert">
                <strong>PUBLISH ERROR:</strong> <span id="api-error-message">{{ $response['published']['response'] }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                @endif
            @endif

            <a href="https://studio.mapbox.com/tilesets/policescorecard.aopjgh6s/" class="btn btn-primary" rel="noopener" target="_blank">Open Tileset</a>&nbsp;
            <a href="https://studio.mapbox.com/styles/policescorecard/ckdq6vklx0q3r1iqrwpiris3f/edit/#3.32/23.97/-110.11"  class="btn btn-default" rel="noopener" target="_blank">Preview Tileset in Mapbox</a>&nbsp;
            <a href="/" class="btn btn-default" rel="noopener" target="_blank">Open Home Page</a>
        </div>
        @else
        <div class="container main" role="main">
            <div class="page-header">
                <h1>Manage Data</h1>
            </div>

            <p>Use the button below to pull down the latest CSV file from Google Sheets and import the data into our API.</p>

            <div class="alert alert-danger alert-dismissible" role="alert" style="display: none;">
                <strong>ERROR:</strong> <span id="api-error-message">The import failed to complete.</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <p>
                <button class="btn btn-primary" onclick="return updateData(false)" data-loading-text="<i class='fa fa-spinner fa-spin '></i> &nbsp;Importing Changes ...">Import Changes</button>&nbsp;
                <button class="btn btn-default" onclick="return updateData(true)" data-loading-text="<i class='fa fa-spinner fa-spin '></i> &nbsp;Importing Everything ...">Import Everything</button>

                <div id="loading-text" class="text-info small" style="display: none;">&nbsp;This may take a few minutes</div>
            </p>

            <div id="results" style="display: none">

                <h4 class="text-info">Import Results:</h4>

                <div class="accordion" id="summary">
                    <!-- Success -->
                    <div class="card">
                        <div class="card-header" id="headingSuccess">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSuccess" aria-expanded="true" aria-controls="collapseSuccess">
                                    Success ( <span id="successTotal"></span> )
                                </button>
                            </h5>
                        </div>

                        <div id="collapseSuccess" class="collapse" aria-labelledby="headingSuccess" data-parent="#summary">
                            <div class="card-body">
                                <div id="success">
                                    <ul></ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Failed -->
                    <div class="card">
                        <div class="card-header" id="headingFailed">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFailed" aria-expanded="true" aria-controls="collapseFailed">
                                    Failed ( <span id="failedTotal"></span> )
                                </button>
                            </h5>
                        </div>

                        <div id="collapseFailed" class="collapse" aria-labelledby="headingFailed" data-parent="#summary">
                            <div class="card-body">
                                <div id="failed">
                                    <ul></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h5 class="text-info">Meta Info:</h5>

                <div class="accordion" id="accordion">
                    <!-- Errors -->
                    <div class="card">
                        <div class="card-header" id="headingErrors">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseErrors" aria-expanded="true" aria-controls="collapseErrors">
                                    Errors ( <span id="errorsTotal"></span> )
                                </button>
                            </h5>
                        </div>

                        <div id="collapseErrors" class="collapse" aria-labelledby="headingErrors" data-parent="#accordion">
                            <div class="card-body">
                                <div id="errors">
                                    <ul></ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Warnings -->
                    <div class="card">
                        <div class="card-header" id="headingWarnings">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseWarnings" aria-expanded="true" aria-controls="collapseWarnings">
                                    Warnings ( <span id="warningsTotal"></span> )
                                </button>
                            </h5>
                        </div>

                        <div id="collapseWarnings" class="collapse" aria-labelledby="headingWarnings" data-parent="#accordion">
                            <div class="card-body">
                                <div id="warnings">
                                    <ul></ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notices -->
                    <div class="card">
                        <div class="card-header" id="headingNotices">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNotices" aria-expanded="true" aria-controls="collapseNotices">
                                    Notices ( <span id="noticesTotal"></span> )
                                </button>
                            </h5>
                        </div>

                        <div id="collapseNotices" class="collapse" aria-labelledby="headingNotices" data-parent="#accordion">
                            <div class="card-body">
                                <div id="notices">
                                    <ul></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function updateData(cleanImport) {
                var message = cleanImport ? 'This will overwrite all existing data and cannot be undone. Continue ?' : 'This will import New and Updated Data? Continue ?';
                var loadingMessage = cleanImport ? 'Importing All Records. This may take a few minutes.' : 'Importing New & Updated Records. This should go pretty quickly.';

                if (confirm(message)) {
                    var $button = cleanImport ? $('button.btn-default') : $('button.btn-primary');
                    var $altButton = cleanImport ? $('button.btn-primary') : $('button.btn-default');
                    var $errors = $('#errors ul');
                    var $failed = $('#failed ul');
                    var $loadingText = $('#loading-text');
                    var $notices = $('#notices ul');
                    var $results = $('#results');
                    var $success = $('#success ul');
                    var $warnings = $('#warnings ul');

                    var $errorsTotal = $('#errorsTotal');
                    var $failedTotal = $('#failedTotal');
                    var $noticesTotal = $('#noticesTotal');
                    var $successTotal = $('#successTotal');
                    var $warningsTotal = $('#warningsTotal');

                    var failedTotal = 0;
                    var successTotal = 0;

                    $errors.html('');
                    $failed.html('');
                    $notices.html('');
                    $results.slideUp();
                    $success.html('');
                    $warnings.html('');

                    $errorsTotal.text(0);
                    $failedTotal.text(0);
                    $noticesTotal.text(0);
                    $successTotal.text(0);
                    $warningsTotal.text(0);

                    $button.button('loading');
                    $altButton.attr('disabled', true);
                    $loadingText.text(loadingMessage).show();

                    // Reset UI
                    $('#api-error-message').text('The import failed to complete.');
                    $('.alert').slideUp();
                    $('.collapse').collapse('hide');

                    $.ajax({
                        type: 'POST',
                        url: '{{ config("api.api_base") }}/{{ config("api.api_version") }}/update/scorecard',
                        data: {
                            token: '{{ config("api.admin_token") }}',
                            cleanImport: cleanImport
                        },
                        beforeSend: function(jqXHR, settings) {
                            jqXHR.setRequestHeader('API-Key', '{{ config("api.api_key") }}');
                        },
                        headers: {
                            'API-Key': '{{ config("api.api_key") }}'
                        },
                        error: function(request, status, error) {
                            $button.button('reset');
                            $altButton.removeAttr('disabled');
                            $loadingText.hide();

                            $('.alert').slideDown();
                        },
                        success: function(response) {
                            if (response && response.data) {
                                $.each(response.errors, function(key, row) {
                                    $errors.append('<li>' + row + '</li>');
                                });

                                $.each(response.notices, function(key, row) {
                                    $notices.append('<li>' + row + '</li>');
                                });

                                $.each(response.warnings, function(key, row) {
                                    $warnings.append('<li>' + row + '</li>');
                                });

                                $.each(response.data, function(key, row) {
                                    if (row.success && row.message !== 'Already Up To Date') {
                                        successTotal++;
                                        $success.append('<li>' + row.location + '</li>');
                                    } else if (row.message !== 'Already Up To Date') {
                                        failedTotal++;
                                        $failed.append('<li>' + row.location + ': ' + row.message + '<pre style="display: none">' + row.stack + '</pre></li>');
                                    }
                                });

                                $warningsTotal.text(response.warnings.length.toLocaleString());
                                $noticesTotal.text(response.notices.length.toLocaleString());
                                $errorsTotal.text(response.errors.length.toLocaleString());
                                $successTotal.text(successTotal.toLocaleString());
                                $failedTotal.text(failedTotal.toLocaleString());

                                $results.slideDown();
                            } else if (response && response.errors) {
                                $button.button('reset');
                                $altButton.removeAttr('disabled');
                                $loadingText.hide();

                                $('#api-error-message').text(response.errors[0])

                                $('.alert').slideDown();
                            }

                            $button.button('reset');
                            $altButton.removeAttr('disabled');
                            $loadingText.hide();
                        },
                        dataType: 'json'
                    });

                    return false;
                }

                return false;
            }
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
        @endif
    </body>
</html>
