<div class="">
  <div class="page-title">

    <div class="">
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url();?>"><i class="fa fa-home"></i> Beranda </a>
        <li class="active"><?php echo $title;?></li>

          <div class="dropdown pull-right">
            <button class="btn btn-warning btn-default dropdown-toggle btn-sm" style="background-color:#FFA200;" type="button" data-toggle="dropdown"><?=$this->session->userdata('username');?>
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li class="divider"></li>
              <li><a href="<?=base_url('auth/logout')?>"><i class="fa fa-sign-out"></i> Keluar </a></li>
              <li class="divider"></li>
            </ul>
          </div>

      </ul>

    </div>

  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_content">
          <h3>Selamat datang kembali, <?=$this->session->userdata('username');?></h3><hr>


          <div class="row">

            <div class="col-12">
              <img src="<?=base_url();?>assets/img/logo.png" alt="..." class="center" style="display:block;margin-left:auto;margin-right:auto;width:150px;" alt="avatar">
            </div>
            <div class="col-12">
              <h2 class="text-center"><?=$this->session->userdata('username');?></h2>
              <h4 class="text-center"><?=$this->session->userdata('email');?></h4>
              <h4 class="text-center"><b><?=$this->session->userdata('level');?></b></h4>
            </div>
          </div>

          <div class="pull-right">
            <a href="<?=base_url().'pengelolaan/user_edit'?>"><button class="btn btn-sm btn-primary ">Ubah Profil</button></a>
          </div>
          <br><br><hr>

        </div>
      </div>
    </div>
  </div>

  <br><hr>
  <div class="clearfix"></div>

</div>
