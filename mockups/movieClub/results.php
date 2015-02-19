<div id="results" class="reveal-modal medium">
  <div id="chart_div">
    <?php
    /*
      $theResults = getResults();
      //get the total
      $total = 0;
      $highestCount = 0;
      $count = 0;
      foreach($theResults as $theResult){
        $count += 1;
        if($count == 1){
          $highestCount = $theResult['count'];
        }
        elseif($theResult['count'] > $highestCount){
          $highestCount = $theResult['count'];
        }
        $total += $theResult['count'];
      }
      echo '<table style="width:100%">';
      foreach($theResults as $theResult){
        $thePercent = floor(($theResult['count'] / $total) * 100);
        if($theResult['count'] == $highestCount){
          $theColor = 'success';
        }
        else{
          $theColor = 'alert';
        }
        if($theResult['count'] > 1){
          $theCount = $theResult['count']." votes";
        }
        else{
          $theCount = $theResult['count']." vote";
        }
        echo "<tr><td rowspan='2'><img src='".$theResult['movie_photo']."' alt='".$theResult['movie_title']."'></td><td style='width:80%;vertical-align:bottom;font-weight:bold'>".$theResult['movie_title']."</td></tr><tr><td style='vertical-align:top'><div class='progress ".$theColor."' style='width:100%'><span class='meter' style='text-indent:1%;font-weight:bold;color:white;width: ".$thePercent."%'>".$theCount."</span></div></td></tr>";
      }
      echo '</table>';
      */
    ?>
  </div>
  <a href='javascript:void(0)' class="close-reveal-modal" onclick="theReveal('close')">&#215;</a>
</div>
