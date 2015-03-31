<?php include 'app.php';?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="This is my reply to Aligent's test as part of their hiring process.">
    <meta name="author" content="Ramin Vakilian">
    <link rel="icon" href="favicon.ico">

    <title>Aligent's Test</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.2/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/cover.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Aligent's Test</h3>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading"><span class="glyphicon glyphicon-calendar"></span> Date Difference</h1>
            <p class="lead">Select two dates and press Submit to see how many days, weekdays and complete weeks lies in between.</p>
          </div>

          <form>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Date From</label>
                <input type="date" class="form-control" name="date-from" value="<?=$date_from?>">
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Time Zone</label>
                <select class="form-control" name="from-timezone">
                  <?php foreach($tzlist as $tz) { ?>
                  <option value="<?= $tz ?>" <?php if((!empty($timezone1) && $tz==$timezone1) || (empty($timezone1) && $tz==$default_time_zone)) echo "selected" ?> ><?= $tz ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Date To</label>
                <input type="date" class="form-control" name="date-to" value="<?=$date_to?>">
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Time Zone</label>
                <select class="form-control" name="to-timezone">
                  <?php foreach($tzlist as $tz) { ?>
                  <option value="<?= $tz ?>" <?php if((!empty($timezone2) && $tz==$timezone2) || (empty($timezone2) && $tz==$default_time_zone)) echo "selected" ?> ><?= $tz ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <p class="lead">
              <button type="submit" class="btn btn-lg btn-default">Submit</button>
            </p>
          </form>

          <?php if($show_result): ?>
          <div class="result">
            <p class="lead">
              In the selected date range there are
              <span class="label label-default" data-toggle="tooltip" data-placement="top" title="equivalent to <?=converted($diffs['days'])?>."><?=$diffs['days']['value']?></span> Days,
              <span class="label label-default" data-toggle="tooltip" data-placement="top" title="equivalent to <?=converted($diffs['weekdays'])?>."><?=$diffs['weekdays']['value']?></span> Week Days or
              <span class="label label-default" data-toggle="tooltip" data-placement="top" title="equivalent to <?=converted($diffs['weeks'])?>."><?=$diffs['weeks']['value']?></span> Complete Weeks<br/>
            </p>
            <small>Tip: Hover on numbers to see more details.</small>
          </div>
          <?php endif; ?>

          <div class="mastfoot">
            <div class="inner">
              <p>This page is developed as a reply to Aligent's test by <a href="my.linkedin.com/in/raminvakilian">Ramin Vakilian</a>.</p>
            </div>
          </div>

        </div>

      </div>

    </div>

    <a href="https://github.com/raminv80/date-diff-test"><img style="position: absolute; top: 0; left: 0; border: 0;" src="https://camo.githubusercontent.com/82b228a3648bf44fc1163ef44c62fcc60081495e/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f6c6566745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_left_red_aa0000.png"></a>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.2/js/select2.min.js"></script>
    <script src="assets/script.js"></script>
  </body>
</html>