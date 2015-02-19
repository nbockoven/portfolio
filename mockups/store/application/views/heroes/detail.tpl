<div class="container">
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <?
          foreach( array_keys($hero) as $header ){
            echo "<th>".ucwords($header)."</th>";
          }
        ?>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?echo ucwords($hero['name'])?></td>
        <td><?echo ucwords($hero['power'])?></td>
        <td><?echo ucwords($hero['gender'])?></td>
      </tr>
    </tbody>
  </table>
</div><!-- .container -->
