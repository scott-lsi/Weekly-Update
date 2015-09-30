<?php
  
  $link = mysql_connect("localhost","root","");
  if (!$link)
    {
    die('Could not connect: ' . mysql_error());
  }
  mysql_select_db("weeklyupdate") or die(mysql_error());
  
  if(isset($_GET['reportdate'])){
    $reportdate = $_GET['reportdate'];
    $getreport = mysql_query("SELECT * FROM reports WHERE thedate = '$reportdate'");
    $report = mysql_fetch_assoc($getreport);
  }
  
  mysql_close($link);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>Weekly Update | LSi - Web Design</title>
  
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
  <script type="text/javascript" src="js/jquery.masonry.min.js"></script>
  <script type="text/javascript" src="js/my.js"></script>
    
  <link type="text/css" rel="stylesheet" media="screen" href="css/style.css" />
  <link type="text/css" rel="stylesheet" media="screen" href="css/ui-lightness/jquery-ui-1.8.16.custom.css" />
  
  </head>
  <body>
    
    <a href="javascript:;" id="fixlayout" title="Things overlapping? Click to fix the layout">Fix</a>
  
    <div id="wrapper">
    
      <form action="runform.php" method="post" class="niceform"> 
    
        <div id="header">
          <img src="img/lsi-web-design.png" alt="LSi - Web Design" />
          <p class="right">Weekly Update for w/c <input type="text" id="date" name="thedate" value="<?php if(isset($reportdate)) { echo $report['thedate']; } ?>" /></p>
        </div>
      
        <div id="fieldsetwrapper">
          <fieldset>
            <legend>LSi Website</legend>
            <ul>
              <li>
                <input type="checkbox" id="lsi-whatsnew-trigger" />
                <label for="lsi-whatsnew-trigger">What's New</label>
                <textarea id="lsi-whatsnew" name="lsiwhatsnew" rows="6" cols="40"><?php if(isset($reportdate)) { echo $report['lsiwhatsnew']; } ?></textarea>
              </li>
              <li>
                <input type="checkbox" id="lsi-changes-trigger" />
                <label for="lsi-changes-trigger">Changes</label>
                <textarea id="lsi-changes" name="lsichanges" rows="6" cols="40"><?php if(isset($reportdate)) { echo $report['lsichanges']; } ?></textarea>
              </li>   
              <li>
                <input type="checkbox" id="lsi-additions-trigger" />
                <label for="lsi-additions-trigger">Additions</label>
                <textarea id="lsi-additions" name="lsiadditions" rows="6" cols="40"><?php if(isset($reportdate)) { echo $report['lsiadditions']; } ?></textarea>
              </li>
              <li>
                <input type="checkbox" id="lsi-deletions-trigger" />
                <label for="lsi-deletions-trigger">Deletions</label>
                <textarea id="lsi-deletions" name="lsideletions" rows="6" cols="40"><?php if(isset($reportdate)) { echo $report['lsideletions']; } ?></textarea>
              </li>
              <li>
                <input type="checkbox" id="lsi-ideas-trigger" />
                <label for="lsi-ideas-trigger">Ideas &amp; Improvements</label>
                <textarea id="lsi-ideas" name="lsiideas" rows="6" cols="40"><?php if(isset($reportdate)) { echo $report['lsiideas']; } ?></textarea>
              </li>
              <li>
                <input type="checkbox" id="lsi-discussion-trigger" />
                <label for="lsi-discussion-trigger">Discussion</label>
                <textarea id="lsi-discussion" name="lsidiscussion" rows="6" cols="40"><?php if(isset($reportdate)) { echo $report['lsidiscussion']; } ?></textarea>
              </li>
            </ul>
          </fieldset>
          
          <fieldset>
            <legend>Cummins Website</legend>
            <ul>
              <li>
                <input type="checkbox" id="cummins-whatsnew-trigger" />
                <label for="cummins-whatsnew-trigger">What's New</label>
                <textarea id="cummins-whatsnew" name="cumminswhatsnew" rows="6" cols="40"><?php if(isset($reportdate)) { echo $report['cumminswhatsnew']; } ?></textarea>
              </li>  
              <li>
                <input type="checkbox" id="cummins-additions-trigger" />
                <label for="cummins-additions-trigger">Additions</label>
                <textarea id="cummins-additions" name="cumminsadditions" rows="6" cols="40"><?php if(isset($reportdate)) { echo $report['cumminsadditions']; } ?></textarea>
              </li>
              <li>
                <input type="checkbox" id="cummins-deletions-trigger" />
                <label for="cummins-deletions-trigger">Deletions</label>
                <textarea id="cummins-deletions" name="cumminsdeletions" rows="6" cols="40"><?php if(isset($reportdate)) { echo $report['cumminsdeletions']; } ?></textarea>
              </li>
              <li>
                <input type="checkbox" id="cummins-ideas-trigger" />
                <label for="cummins-ideas-trigger">Ideas &amp; Improvements</label>
                <textarea id="cummins-ideas" name="cumminsideas" rows="6" cols="40"><?php if(isset($reportdate)) { echo $report['cumminsideas']; } ?></textarea>
              </li> 
              <li>
                <input type="checkbox" id="cummins-performance-trigger" />
                <label for="cummins-performance-trigger">Performance</label>
                <textarea id="cummins-performance" name="cumminsperformance" rows="6" cols="40"><?php if(isset($reportdate)) { echo $report['cumminsperformance']; } ?></textarea>
              </li>
              <li>
                <input type="checkbox" id="cummins-problems-trigger" />
                <label for="cummins-problems-trigger">Problems</label>
                <textarea id="cummins-problems" name="cumminsproblems" rows="6" cols="40"><?php if(isset($reportdate)) { echo $report['cumminsproblems']; } ?></textarea>
              </li>
            </ul>
          </fieldset>
          
          <fieldset>
            <legend>Corporate Scheme Sites</legend>
            <ul>
              <li>
                <input type="checkbox" id="cs-changes-trigger" />
                <label for="cs-changes-trigger">Changes</label>
                <textarea id="cs-changes" name="cschanges" rows="6" cols="40"><?php if(isset($reportdate)) { echo $report['cschanges']; } ?></textarea>
              </li>
              <li>
                <input type="checkbox" id="cs-whatsnew-trigger" />
                <label for="cs-whatsnew-trigger">What's New</label>
                <textarea id="cs-whatsnew" name="cswhatsnew" rows="6" cols="40"><?php if(isset($reportdate)) { echo $report['cswhatsnew']; } ?></textarea>
              </li>
              <li>
                <input type="checkbox" id="cs-ideas-trigger" />
                <label for="cs-ideas-trigger">Ideas &amp; Improvements</label>
                <textarea id="cs-ideas" name="csideas" rows="6" cols="40"><?php if(isset($reportdate)) { echo $report['csideas']; } ?></textarea>
              </li>
              <li>
                <input type="checkbox" id="cs-projects-trigger" />
                <label for="cs-projects-trigger">Projects</label>
                <textarea id="cs-projects" name="csprojects" rows="6" cols="40"><?php if(isset($reportdate)) { echo $report['csprojects']; } ?></textarea>
              </li>
            </ul>
          </fieldset>
          
          <fieldset>
            <legend>Other Developments</legend>
            <ul>
              <li>
                <input type="checkbox" id="other-internal-trigger" />
                <label for="other-internal-trigger">Internal Website</label>
                <textarea id="other-internal" name="otherinternal" rows="6" cols="40"><?php if(isset($reportdate)) { echo $report['otherinternal']; } ?></textarea>
              </li>
              <li>
                <input type="checkbox" id="other-ideas-trigger" />
                <label for="other-ideas-trigger">Ideas</label>
                <textarea id="other-ideas" name="otherideas" rows="6" cols="40"><?php if(isset($reportdate)) { echo $report['otherideas']; } ?></textarea>
              </li>   
              <li>
                <input type="checkbox" id="other-improvements-trigger" />
                <label for="other-improvements-trigger">Improvements</label>
                <textarea id="other-improvements" name="otherimprovements" rows="6" cols="40"><?php if(isset($reportdate)) { echo $report['otherimprovements']; } ?></textarea>
              </li>
            </ul>
          </fieldset>
          
          <fieldset>
            <legend>Checks</legend>
            <div>
              <h3>SOAP Server</h3>
              <ul class="horizontal">
                <li>
                  <label for="check-soap-1">Mon</label>
                  <input type="checkbox" id="check-soap-1-trigger" />
                  <input type="text" name="soap1" id="check-soap-1" class="text" value="<?php if(isset($reportdate)) { echo $report['soap1']; } ?>" />
                </li>
                <li>
                  <label for="check-soap-2-trigger">Tue</label>
                  <input type="checkbox" id="check-soap-2-trigger" />
                  <input type="text" name="soap2" id="check-soap-2" class="text" value="<?php if(isset($reportdate)) { echo $report['soap2']; } ?>" />
                </li>
                <li>
                  <label for="check-soap-3-trigger">Wed</label>
                  <input type="checkbox" id="check-soap-3-trigger" />
                  <input type="text" name="soap3" id="check-soap-3" class="text" value="<?php if(isset($reportdate)) { echo $report['soap3']; } ?>" />
                </li>
                <li>
                  <label for="check-soap-4-trigger">Thu</label>
                  <input type="checkbox" id="check-soap-4-trigger" />
                  <input type="text" name="soap4" id="check-soap-4" class="text" value="<?php if(isset($reportdate)) { echo $report['soap4']; } ?>" />
                </li>
                <li>
                  <label for="check-soap-5-trigger">Fri</label>
                  <input type="checkbox" id="check-soap-5-trigger" />
                  <input type="text" name="soap5" id="check-soap-5" class="text" value="<?php if(isset($reportdate)) { echo $report['soap5']; } ?>" />
                </li>
              </ul>
            </div>
            
            <div>
              <h3>Integration Panel</h3>
              <ul class="horizontal">
                <li>
                  <label for="check-panel-1-trigger">Mon</label>
                  <input type="checkbox" id="check-panel-1-trigger" />
                  <input type="text" name="panel1" id="check-panel-1" class="text" value="<?php if(isset($reportdate)) { echo $report['panel1']; } ?>" />
                </li>
                <li>
                  <label for="check-panel-2-trigger">Tue</label>
                  <input type="checkbox" id="check-panel-2-trigger" />
                  <input type="text" name="panel2" id="check-panel-2" class="text" value="<?php if(isset($reportdate)) { echo $report['panel2']; } ?>" />
                </li>
                <li>
                  <label for="check-panel-3-trigger">Wed</label>
                  <input type="checkbox" id="check-panel-3-trigger" />
                  <input type="text" name="panel3" id="check-panel-3" class="text" value="<?php if(isset($reportdate)) { echo $report['panel3']; } ?>" />
                </li>
                <li>
                  <label for="check-panel-4-trigger">Thu</label>
                  <input type="checkbox" id="check-panel-4-trigger" />
                  <input type="text" name="panel4" id="check-panel-4" class="text" value="<?php if(isset($reportdate)) { echo $report['panel4']; } ?>" />
                </li>
                <li>
                  <label for="check-panel-5-trigger">Fri</label>
                  <input type="checkbox" id="check-panel-5-trigger" />
                  <input type="text" name="panel5" id="check-panel-5" class="text" value="<?php if(isset($reportdate)) { echo $report['panel5']; } ?>" />
                </li>
              </ul>
            </div>
          </fieldset>
          
          <fieldset>
            <legend>Any Other Business</legend>
            <ul>
              <li>
                <input type="checkbox" id="otherbusiness-trigger" />
                <label for="otherbusiness-trigger">Any Other Business</label>
                <textarea id="otherbusiness" name="otherbusiness" rows="6" cols="40"><?php if(isset($reportdate)) { echo $report['otherbusiness']; } ?></textarea>
              </li>
            </ul>
          </fieldset> 
          
          <fieldset>
            <legend>Utilities</legend>
            <ul>
              <li>
                <input type="submit" value="Save Report" name="submission" class="save" title="Save this report to the database. All fields will be overritten" />
              </li>
              <li>
                <input type="submit" value="Print Report" name="submission" class="print" title="Generate a printable version of this report. Any changes made will be saved." />
              </li>
              <li>
                <input type="submit" value="Load Report" name="submission" class="load" title="Load a previous report. No changes made will be saved. You will be asked to confirm that this is ok." />
              </li>
              <li>
                <input type="submit" value="New Report" name="submission" class="new" title="Create a new, blank report. You will be asked to confirm that this is ok." />
              </li>
            </ul>
          </fieldset>
        </div>
      </form>
    
    </div>

  </body>
</html>