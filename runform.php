<?php

  $link = mysql_connect("localhost","root","");
  if (!$link)
    {
    die('Could not connect: ' . mysql_error());
  }
  mysql_select_db("weeklyupdate") or die(mysql_error());
  
  $submittype = $_POST['submission'];
  
  if($submittype == 'Save Report') {
    $reportdatedb = str_replace("/","",$_POST['thedate']);
    $reportsave = mysql_query("
      INSERT INTO reports (thedate,lsichanges,lsiwhatsnew,lsiadditions,lsideletions,lsiideas,lsidiscussion,cumminswhatsnew,cumminsadditions,cumminsdeletions,cumminsideas,cumminsperformance,cumminsproblems,cschanges,cswhatsnew,csideas,csprojects,otherinternal,otherideas,otherimprovements,soap1,soap2,soap3,soap4,soap5,panel1,panel2,panel3,panel4,panel5,otherbusiness)
        VALUES (
          '" . mysql_real_escape_string($reportdatedb) . "',
          '" . mysql_real_escape_string($_POST['lsichanges']) . "',
          '" . mysql_real_escape_string($_POST['lsiwhatsnew']) . "','" . mysql_real_escape_string($_POST['lsiadditions']) . "','" . mysql_real_escape_string($_POST['lsideletions']) . "','" . mysql_real_escape_string($_POST['lsiideas']) . "','" . mysql_real_escape_string($_POST['lsidiscussion']) . "',
          '" . mysql_real_escape_string($_POST['cumminswhatsnew']) . "','" . mysql_real_escape_string($_POST['cumminsadditions']) . "','" . mysql_real_escape_string($_POST['cumminsdeletions']) . "','" . mysql_real_escape_string($_POST['cumminsideas']) . "','" . mysql_real_escape_string($_POST['cumminsperformance']) . "','" . mysql_real_escape_string($_POST['cumminsproblems']) . "',
          '" . mysql_real_escape_string($_POST['cschanges']) . "','" . mysql_real_escape_string($_POST['cswhatsnew']) . "','" . mysql_real_escape_string($_POST['csideas']) . "','" . mysql_real_escape_string($_POST['csprojects']) . "',
          '" . mysql_real_escape_string($_POST['otherinternal']) . "','" . mysql_real_escape_string($_POST['otherideas']) . "','" . mysql_real_escape_string($_POST['otherimprovements']) . "',
          '" . mysql_real_escape_string($_POST['soap1']) . "','" . mysql_real_escape_string($_POST['soap2']) . "','" . mysql_real_escape_string($_POST['soap3']) . "','" . mysql_real_escape_string($_POST['soap4']) . "','" . mysql_real_escape_string($_POST['soap5']) . "',
          '" . mysql_real_escape_string($_POST['panel1']) . "','" . mysql_real_escape_string($_POST['panel2']) . "','" . mysql_real_escape_string($_POST['panel3']) . "','" . mysql_real_escape_string($_POST['panel4']) . "','" . mysql_real_escape_string($_POST['panel5']) . "',
          '" . mysql_real_escape_string($_POST['otherbusiness']) . "'
        )
          ON DUPLICATE KEY UPDATE
            lsichanges = '" . mysql_real_escape_string($_POST['lsichanges']) . "',
            lsiwhatsnew = '" . mysql_real_escape_string($_POST['lsiwhatsnew']) . "',
            lsiadditions = '" . mysql_real_escape_string($_POST['lsiadditions']) . "',
            lsideletions = '" . mysql_real_escape_string($_POST['lsideletions']) . "',
            lsiideas = '" . mysql_real_escape_string($_POST['lsiideas']) . "', 
            lsidiscussion = '" . mysql_real_escape_string($_POST['lsidiscussion']) . "',
            cumminswhatsnew = '" . mysql_real_escape_string($_POST['cumminswhatsnew']) . "',
            cumminsadditions = '" . mysql_real_escape_string($_POST['cumminsadditions']) . "',
            cumminsdeletions = '" . mysql_real_escape_string($_POST['cumminsdeletions']) . "',
            cumminsideas = '" . mysql_real_escape_string($_POST['cumminsideas']) . "',
            cumminsperformance = '" . mysql_real_escape_string($_POST['cumminsperformance']) . "',
            cumminsproblems = '" . mysql_real_escape_string($_POST['cumminsproblems']) . "',
            cschanges = '" . mysql_real_escape_string($_POST['cschanges']) . "',
            cswhatsnew = '" . mysql_real_escape_string($_POST['cswhatsnew']) . "',
            csideas = '" . mysql_real_escape_string($_POST['csideas']) . "',
            csprojects = '" . mysql_real_escape_string($_POST['csprojects']) . "',
            otherinternal = '" . mysql_real_escape_string($_POST['otherinternal']) . "',
            otherideas = '" . mysql_real_escape_string($_POST['otherideas']) . "',
            otherimprovements = '" . mysql_real_escape_string($_POST['otherimprovements']) . "',
            soap1 = '" . mysql_real_escape_string($_POST['soap1']) . "',
            soap2 = '" . mysql_real_escape_string($_POST['soap2']) . "',
            soap3 = '" . mysql_real_escape_string($_POST['soap3']) . "',
            soap4 = '" . mysql_real_escape_string($_POST['soap4']) . "',
            soap5 = '" . mysql_real_escape_string($_POST['soap5']) . "',
            panel1 = '" . mysql_real_escape_string($_POST['panel1']) . "',
            panel2 = '" . mysql_real_escape_string($_POST['panel2']) . "',
            panel3 = '" . mysql_real_escape_string($_POST['panel3']) . "',
            panel4 = '" . mysql_real_escape_string($_POST['panel4']) . "',
            panel5 = '" . mysql_real_escape_string($_POST['panel5']) . "',
            otherbusiness = '" . mysql_real_escape_string($_POST['otherbusiness']) . "'                    
    ");
  
    if($reportsave) {
      echo "report added";
    } else {
      echo "something went wrong..." . mysql_error();
    }
  }
  
  elseif($submittype == 'Load Report') {
    echo '<h1>Load Report</h1>';    
    $getdates = mysql_query('SELECT thedate FROM reports');
    while ($gotdate = mysql_fetch_assoc($getdates)){      
      $output = '<p><a href="index.php?reportdate=' . str_replace('/)','',$gotdate['thedate']) . '">' . substr_replace(substr_replace($gotdate['thedate'],'/',4,0),'/',2,0) . '</a></p>';
      echo $output;
    }
  }
  
  elseif($submittype == 'Print Report') {
  $reportdatedb = str_replace("/","",$_POST['thedate']);
    $reportdatedb = str_replace("/","",$_POST['thedate']);
    $reportprint = mysql_query("
      INSERT INTO reports (thedate,lsichanges,lsiwhatsnew,lsiadditions,lsideletions,lsiideas,lsidiscussion,cumminswhatsnew,cumminsadditions,cumminsdeletions,cumminsideas,cumminsperformance,cumminsproblems,cschanges,cswhatsnew,csideas,csprojects,otherinternal,otherideas,otherimprovements,soap1,soap2,soap3,soap4,soap5,panel1,panel2,panel3,panel4,panel5,otherbusiness)
        VALUES (
          '" . mysql_real_escape_string($reportdatedb) . "',
          '" . mysql_real_escape_string($_POST['lsichanges']) . "',
          '" . mysql_real_escape_string($_POST['lsiwhatsnew']) . "','" . mysql_real_escape_string($_POST['lsiadditions']) . "','" . mysql_real_escape_string($_POST['lsideletions']) . "','" . mysql_real_escape_string($_POST['lsiideas']) . "','" . mysql_real_escape_string($_POST['lsidiscussion']) . "',
          '" . mysql_real_escape_string($_POST['cumminswhatsnew']) . "','" . mysql_real_escape_string($_POST['cumminsadditions']) . "','" . mysql_real_escape_string($_POST['cumminsdeletions']) . "','" . mysql_real_escape_string($_POST['cumminsideas']) . "','" . mysql_real_escape_string($_POST['cumminsperformance']) . "','" . mysql_real_escape_string($_POST['cumminsproblems']) . "',
          '" . mysql_real_escape_string($_POST['cschanges']) . "','" . mysql_real_escape_string($_POST['cswhatsnew']) . "','" . mysql_real_escape_string($_POST['csideas']) . "','" . mysql_real_escape_string($_POST['csprojects']) . "',
          '" . mysql_real_escape_string($_POST['otherinternal']) . "','" . mysql_real_escape_string($_POST['otherideas']) . "','" . mysql_real_escape_string($_POST['otherimprovements']) . "',
          '" . mysql_real_escape_string($_POST['soap1']) . "','" . mysql_real_escape_string($_POST['soap2']) . "','" . mysql_real_escape_string($_POST['soap3']) . "','" . mysql_real_escape_string($_POST['soap4']) . "','" . mysql_real_escape_string($_POST['soap5']) . "',
          '" . mysql_real_escape_string($_POST['panel1']) . "','" . mysql_real_escape_string($_POST['panel2']) . "','" . mysql_real_escape_string($_POST['panel3']) . "','" . mysql_real_escape_string($_POST['panel4']) . "','" . mysql_real_escape_string($_POST['panel5']) . "',
          '" . mysql_real_escape_string($_POST['otherbusiness']) . "'
        )
          ON DUPLICATE KEY UPDATE
            lsichanges = '" . mysql_real_escape_string($_POST['lsichanges']) . "',
            lsiwhatsnew = '" . mysql_real_escape_string($_POST['lsiwhatsnew']) . "',
            lsiadditions = '" . mysql_real_escape_string($_POST['lsiadditions']) . "',
            lsideletions = '" . mysql_real_escape_string($_POST['lsideletions']) . "',
            lsiideas = '" . mysql_real_escape_string($_POST['lsiideas']) . "', 
            lsidiscussion = '" . mysql_real_escape_string($_POST['lsidiscussion']) . "',
            cumminswhatsnew = '" . mysql_real_escape_string($_POST['cumminswhatsnew']) . "',
            cumminsadditions = '" . mysql_real_escape_string($_POST['cumminsadditions']) . "',
            cumminsdeletions = '" . mysql_real_escape_string($_POST['cumminsdeletions']) . "',
            cumminsideas = '" . mysql_real_escape_string($_POST['cumminsideas']) . "',
            cumminsperformance = '" . mysql_real_escape_string($_POST['cumminsperformance']) . "',
            cumminsproblems = '" . mysql_real_escape_string($_POST['cumminsproblems']) . "',
            cschanges = '" . mysql_real_escape_string($_POST['cschanges']) . "',
            cswhatsnew = '" . mysql_real_escape_string($_POST['cswhatsnew']) . "',
            csideas = '" . mysql_real_escape_string($_POST['csideas']) . "',
            csprojects = '" . mysql_real_escape_string($_POST['csprojects']) . "',
            otherinternal = '" . mysql_real_escape_string($_POST['otherinternal']) . "',
            otherideas = '" . mysql_real_escape_string($_POST['otherideas']) . "',
            otherimprovements = '" . mysql_real_escape_string($_POST['otherimprovements']) . "',
            soap1 = '" . mysql_real_escape_string($_POST['soap1']) . "',
            soap2 = '" . mysql_real_escape_string($_POST['soap2']) . "',
            soap3 = '" . mysql_real_escape_string($_POST['soap3']) . "',
            soap4 = '" . mysql_real_escape_string($_POST['soap4']) . "',
            soap5 = '" . mysql_real_escape_string($_POST['soap5']) . "',
            panel1 = '" . mysql_real_escape_string($_POST['panel1']) . "',
            panel2 = '" . mysql_real_escape_string($_POST['panel2']) . "',
            panel3 = '" . mysql_real_escape_string($_POST['panel3']) . "',
            panel4 = '" . mysql_real_escape_string($_POST['panel4']) . "',
            panel5 = '" . mysql_real_escape_string($_POST['panel5']) . "',
            otherbusiness = '" . mysql_real_escape_string($_POST['otherbusiness']) . "'                    
    ");
    
    if($reportprint) {
?>

  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <title>Report for w/c <?php echo substr_replace(substr_replace($_POST['thedate'],'/',4,0),'/',2,0); ?></title>        
      <link type="text/css" rel="stylesheet" media="screen, print" href="css/print.css" />
      
      <script type="text/javascript">
        window.print();
      </script>  
    </head>
    
    <body>
  
      <h1>Report for week commencing <?php echo substr_replace(substr_replace($_POST['thedate'],'/',4,0),'/',2,0); ?></h1>
      
      <?php if(!empty($_POST['lsichanges']) || !empty($_POST['lsiwhatsnew']) || !empty($_POST['lsiadditions']) || !empty($_POST['lsideletions']) || !empty($_POST['lsiideas']) || !empty($_POST['lsidiscussion'])) { ?>
        <div id="print-lsi" class="sectionwrapper">
          <h2>LSi Website</h2>
          <?php if(!empty($_POST['lsiwhatsnew'])) { echo '<h3>What\'s New</h3><p>' . nl2br($_POST['lsiwhatsnew']) . '</p>'; } ?>
          <?php if(!empty($_POST['lsichanges'])) { echo '<h3>Changes</h3><p>' . nl2br($_POST['lsichanges']) . '</p>'; } ?>
          <?php if(!empty($_POST['lsiadditions'])) { echo '<h3>Additions</h3><p>' . nl2br($_POST['lsiadditions']) . '</p>'; } ?>
          <?php if(!empty($_POST['lsideletions'])) { echo '<h3>Deletions</h3><p>' . nl2br($_POST['lsideletions']) . '</p>'; } ?>
          <?php if(!empty($_POST['lsiideas'])) { echo '<h3>Ideas</h3><p>' . nl2br($_POST['lsiideas']) . '</p>'; } ?>
          <?php if(!empty($_POST['lsidiscussion'])) { echo '<h3>Discussion</h3><p>' . nl2br($_POST['lsidiscussion']) . '</p>'; } ?>
        </div>
      <?php } ?>
      
      
      
      <?php if(!empty($_POST['cumminswhatsnew']) || !empty($_POST['cumminsadditions']) || !empty($_POST['cumminsdeletions']) || !empty($_POST['cumminsideas']) || !empty($_POST['cumminsperformance']) || !empty($_POST['cumminsproblems'])) { ?>
        <div id="print-cummins" class="sectionwrapper">
          <h2>Cummins Website</h2>
          <?php if(!empty($_POST['cumminswhatsnew'])) { echo '<h3>What\'s New</h3><p>' . nl2br($_POST['cumminswhatsnew']) . '</p>'; } ?>
          <?php if(!empty($_POST['cumminsadditions'])) { echo '<h3>Additions</h3><p>' . nl2br($_POST['cumminsadditions']) . '</p>'; } ?>
          <?php if(!empty($_POST['cumminsdeletions'])) { echo '<h3>Deletions</h3><p>' . nl2br($_POST['cumminsdeletions']) . '</p>'; } ?>
          <?php if(!empty($_POST['cumminsideas'])) { echo '<h3>Ideas</h3><p>' . nl2br($_POST['cumminsideas']) . '</p>'; } ?>
          <?php if(!empty($_POST['cumminsperformance'])) { echo '<h3>Performance</h3><p>' . nl2br($_POST['cumminsperformance']) . '</p>'; } ?>
          <?php if(!empty($_POST['cumminsproblems'])) { echo '<h3>Problems</h3><p>' . nl2br($_POST['cumminsproblems']) . '</p>'; } ?>
        </div>
      <?php } ?>
      
      
      
      <?php if(!empty($_POST['cschanges']) || !empty($_POST['cswhatsnew']) || !empty($_POST['csideas']) || !empty($_POST['csprojects'])) { ?>
        <div id="print-otherdevelopments" class="sectionwrapper">
          <h2>Corporate Scheme Sites</h2>
          <?php if(!empty($_POST['cschanges'])) { echo '<h3>Changes</h3><p>' . nl2br($_POST['cschanges']) . '</p>'; } ?>
          <?php if(!empty($_POST['cswhatsnew'])) { echo '<h3>What\'s New</h3><p>' . nl2br($_POST['cswhatsnew']) . '</p>'; } ?>
          <?php if(!empty($_POST['csideas'])) { echo '<h3>Ideas</h3><p>' . nl2br($_POST['csideas']) . '</p>'; } ?>
          <?php if(!empty($_POST['csprojects'])) { echo '<h3>Projects</h3><p>' . nl2br($_POST['csprojects']) . '</p>'; } ?>
        </div>
      <?php } ?>
      
      
      
      <?php if(!empty($_POST['otherinternal']) || !empty($_POST['otherideas']) || !empty($_POST['otherimprovements'])) { ?>
        <div id="print-otherdevelopments" class="sectionwrapper">
          <h2>Other Developments</h2>
          <?php if(!empty($_POST['otherinternal'])) { echo '<h3>Internal Website</h3><p>' . nl2br($_POST['otherinternal']) . '</p>'; } ?>
          <?php if(!empty($_POST['otherideas'])) { echo '<h3>Ideas</h3><p>' . nl2br($_POST['otherideas']) . '</p>'; } ?>
          <?php if(!empty($_POST['otherimprovements'])) { echo '<h3>Improvements</h3><p>' . nl2br($_POST['otherimprovements']) . '</p>'; } ?>
        </div>
      <?php } ?>
      
      <div id="print-soappanel" class="sectionwrapper">
        <h2>Soap Server &amp; Panel Checks</h2>
        <h3>Soap Server</h3>
        <ul>
          <li><span>Monday:</span> <?php if(!empty($_POST['soap1'])) { echo $_POST['soap1']; } else { echo 'Not Checked'; } ?></li>
          <li><span>Tuesday:</span> <?php if(!empty($_POST['soap2'])) { echo $_POST['soap2']; } else { echo 'Not Checked'; } ?></li>
          <li><span>Wednesday:</span> <?php if(!empty($_POST['soap3'])) { echo $_POST['soap3']; } else { echo 'Not Checked'; } ?></li>
          <li><span>Thursday:</span> <?php if(!empty($_POST['soap4'])) { echo $_POST['soap4']; } else { echo 'Not Checked'; } ?></li>
          <li><span>Friday:</span> <?php if(!empty($_POST['soap5'])) { echo $_POST['soap5']; } else { echo 'Not Checked'; } ?></li>
        </ul>
        <h3>Integration Panel</h3>
        <ul>
          <li><span>Monday:</span> <?php if(!empty($_POST['panel1'])) { echo $_POST['panel1']; } else { echo 'Not Checked'; } ?></li>
          <li><span>Tuesday:</span> <?php if(!empty($_POST['panel2'])) { echo $_POST['panel2']; } else { echo 'Not Checked'; } ?></li>
          <li><span>Wednesday:</span> <?php if(!empty($_POST['panel3'])) { echo $_POST['panel3']; } else { echo 'Not Checked'; } ?></li>
          <li><span>Thursday:</span> <?php if(!empty($_POST['panel4'])) { echo $_POST['panel4']; } else { echo 'Not Checked'; } ?></li>
          <li><span>Friday:</span> <?php if(!empty($_POST['panel5'])) { echo $_POST['panel5']; } else { echo 'Not Checked'; } ?></li>
        </ul>
      </div>
      
      <?php if(!empty($_POST['otherbusiness'])) { ?>
        <div id="print-otherbusiness" class="sectionwrapper">
          <h2>Other Business</h2>
          <p><?php echo nl2br($_POST['otherbusiness']); ?></p>
        </div>
      <?php } ?>
    
    </body>
  
  </html>

<?php } else {
    echo "There was an error with printing: " . mysql_error();
  } }
  elseif($submittype == 'New Report') {
   echo '<p><a href="index.php">Create a new report</a></p>';
  }
  mysql_close($link);
?>