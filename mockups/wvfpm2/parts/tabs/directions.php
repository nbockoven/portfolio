<div class="row" id="directions">
  <div class="container">
    <div class="col-xs-12">
      <h2>
        <span class="en">Directions</span>
        <span class="vi">Hướng</span>
      </h2>
      <div class="row">
        <label class="col-sm-2 control-label">
          <span class="en">Our Address</span>
          <span class="vi">Địa chỉ của chúng tôi</span>
        </label>
        <div class="col-sm-10">3336 S. Pioneer Parkway Suite 302 West Valley City, UT 84120</div>
      </div><!-- .row -->

      <div class="row" style="margin-bottom:20px">
        <div class="col-xs-12">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Where are you coming from?" name="fromHere">
            <span class="input-group-btn">
              <button class="btn btn-success" type="button" name='directionsGo' onclick="calcRoute()">Go!</button>
            </span>
          </div><!-- /input-group -->
        </div><!-- .col-xs-12 -->
      </div><!-- .row -->

      <div class="row">
        <div class="col-md-6">
          <div id="map-canvas"></div><!-- #map-canvas -->
        </div><!-- .col-md-7 -->
        <div class="col-md-6">
          <div id="directions-panel"></div><!-- #directions-panel -->
        </div><!-- .col-md-5 -->
      </div><!-- .row -->
    </div><!-- .col-xs-12 -->
  </div><!-- .container -->
</div><!-- #directions -->
