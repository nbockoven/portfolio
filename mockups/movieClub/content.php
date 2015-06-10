<div class='container'>
  <ul class='legend'>
    <li class='label voted'>your vote</li>
    <li class='label watched'>you saw it</li>
    <li class='label youAndOthers_watched'>you & others saw it</li>
    <li class='label others_watched'>others saw it</li>
  </ul>
  <div class='alert-box radius outline'>What's the next movie?</div>
  <!-- Using only the large-block-grid -->
  
      <?php
        $theMovies = array('in theaters' => $in_theaters_movies, 'opening' => $opening_movies, 'upcoming' => $upcoming_movies);
        foreach($theMovies as $key => $movies){
      ?>
          <div class='panel'>
            <h6><?php echo $key ?></h6>
            <ul>
              <?php
              $usersMovies = usersMovies();
              foreach($movies as $movie){
                $id = $movie->id;
                $title = $movie->title;
                $pic = $movie->posters->profile;
                $ratingC = $movie->ratings->critics_score;
                $ratingU = $movie->ratings->audience_score;
                $date = $movie->release_dates->theater;
                $dateParts = explode('-', $date);
                $year = $dateParts[0];
                $month = $dateParts[1];
                $day = $dateParts[2];

                $isVoted = false; //if user_id = user_id
                $isWatched = false; //if user_id = user_id
                $isOthersWatched = false; //if user_id != user_id
                $class = '';
                foreach($usersMovies as $um){
                  if($id == $um[1]){
                    switch ($um[2]) {
                      case 'voted':
                        if($um[0] == $_SESSION['user_id']){
                          $isVoted = true;
                        }
                        break;
                      case 'watched':
                        if($um[0] == $_SESSION['user_id']){
                          $isWatched = true;
                        }
                        else{
                          $isOthersWatched = true;
                        }
                        break;
                    }
                  }
                }

                //determine classes
                if($isVoted){
                  $class = " class='voted'";
                }
                elseif($isWatched && $isOthersWatched){
                  $class = " class='youAndOthers_watched'";
                }
                elseif($isWatched){
                  $class = " class='watched'";
                }
                elseif($isOthersWatched){
                  $class = " class='others_watched'";
                }

              ?>
                <li>
                  <a href='javascript:void(0)' id='<?php echo $id ?>' name='<?php echo $title.','.$pic ?>'>
                    <table<?php echo $class; ?>>
                      <tr>
                        <td><img src='<?php echo $pic ?>' style='margin:0 auto'></td>
                      </tr>
                      <tr>
                        <td style='height:24px'><strong><?php echo $title ?></strong></td>
                      </tr>
                      <tr>
                        <td>Release: <?php echo $month.'-'.$day.'-'.$year ?></td>
                      </tr>
                      <tr>
                        <td>
                          <ul>
                            <?php
                              if($ratingC == -1){
                                $theScore = 'notRated';
                              }
                              elseif($ratingC < 71){
                                $theScore = 'rotten';
                              }
                              else{
                                $theScore = 'fresh';
                              }

                              if($theScore != 'notRated'){
                              ?>
                                <li><div class='rateIcon <?php echo $theScore ?>'></div></li>
                                <li><label style='margin-right:5%'><?php echo $ratingC ?>%</label></li>
                              <?php
                              }
                              $theScore = '';
                              if($ratingU == -1){
                                $theScore = 'notRated';
                              }
                              elseif($ratingU < 71){
                                $theScore = 'disliked';
                              }
                              if(strtotime($date) > date('U')){
                                $theScore = 'plus';
                              }
                              else{
                                $theScore = 'liked';
                              }
                            ?>
                            <li><div class='rateIcon <?php echo $theScore ?>'></div></li>
                            <li><label><?php echo $ratingU ?>%</label></li>
                          </ul>
                        </td>
                      </tr>
                    </table>
                  </a>
                </li>
              <?php
              }
              ?>
            </ul>
          </div>
          <?php
          }
          ?>
        <!-- <div class='alert-box radius outline'>What showtime do you propose?</div> -->
      </div>
