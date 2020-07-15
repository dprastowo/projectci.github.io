<?php $this->load->view('header.php');  ?>
<header class="masthead" style="background-image: url('<?php echo base_url();?>assets/img/home-bg.jpg')">
   <div class="overlay"></div>
   <div class="container">
     <div class="row">
       <div class="col-lg-8 col-md-10 mx-auto">
         <div class="post-heading">
          <h1>Tambah Artikel Baru</h1>
         </div>
       </div>
     </div>
   </div>
 </header>
 <div class="container">
   <div class="row justify-content-center">
     <div class="com-md-8">
            <h1>Tambah Artikel</h1>
            <div class="alert alert-warning">
              <?php echo validation_errors(); ?>
            </div>

            <?php echo form_open_multipart(); ?>
                 <div class="form_group">
                     <label>Judul</label>
                     <?php echo form_input('title', set_value('title'), 'class="form-control"'); ?>
                 </div>
                 <div class="form_group">
                     <label>URL</label>
                     <?php echo form_input('url', set_value('url'), 'class="form-control"'); ?>
                 </div>
                 <div class="form_group">
                     <label>Konten</label>
                     <?php echo form_textarea('content', set_value('content'), 'class="form-control"'); ?>
                 </div>
                 <div class="form-group">
                    <label>Cover</label>
                    <?php echo form_upload('cover', null, 'class="form-control"'); ?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Artikel</button>
          </form>
     </div>
   </div>
 </div>
 <?php $this->load->view('footer.php');  ?>
