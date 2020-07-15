<?php $this->load->view('header.php');  ?>
<header class="masthead" style="background-image: url('<?php echo base_url();?>assets/img/home-bg.jpg')">
    <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <div class="site-heading">
                <h1>Login</h1>
              </div>
            </div>
          </div>
    </div>
    </header>
    <div class="container">
      <div class="row justify-content-center">
        <div class="com-md-8">

            <?php echo $this->session->flashdata('message');?>
            <?php echo form_open();?>
                <div class="form-group">
                    <label>Username</label>
                        <?php echo form_input('username', set_value('username'), 'class="form-control"'); ?>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <?php echo form_password('password', set_value('password'), 'class="form-control"'); ?>
                </div>
            <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
      </div>
    </div>
<?php $this->load->view('footer.php');  ?>
