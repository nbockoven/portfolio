<!-- contact modal -->
<div id='contact' class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role='form' action='submit.php' method='post' id='contactForm'>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">contact me</h4>
        </div>
        <div class="modal-body">

          <div class="input-group">
            <label class="input-group-addon" for'inputName'>name</label>
            <input type="text" name='inputName' class='form-control' placeholder="what should I call you?" required>
          </div><!-- .input-group -->
          <br>
          <div class="input-group">
            <label class="input-group-addon" for'inputEmail'>email</label>
            <input type="email" name='inputEmail' class='form-control' placeholder="where should I reply?" required>
          </div><!-- .input-group -->
          <br>
          <div class="input-group">
            <label class="input-group-addon" for'inputMessage'>message</label>
            <textarea name='inputMessage' class='form-control' placeholder='what would you like to say?' rows='5' required></textarea>
          </div><!-- .input-group -->
          <br>
          <div class="input-group">
            <label class="input-group-addon" for'inputAnswer'>
              <?php $rand1 = rand(0, 10); $rand2 = rand(0, 10); $numbers = array('zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten');?>
              <?php echo $numbers[$rand1];?><input type='hidden' name='inputRandNum1' value='<?php echo $numbers[$rand1];?>'> plus <?php echo $numbers[$rand2];?><input type='hidden' name='inputRandNum2' value='<?php echo $numbers[$rand2];?>'> equals
            </label>
            <input type='number' class="form-control" min='0' max='20' id='inputAnswer' name='inputAnswer' placeholder='0' required>
          </div><!-- .form-group -->

        </div><!-- .modal-body -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
          <button type="submit" class="btn btn-primary" disabled>send</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- email status modal -->
<div id='emailStatus' class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">email status</h4>
      </div>
      <div class="modal-body">
        <p class='alert' id='emailStatusMessage'></p>
      </div><!-- .modal-body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
