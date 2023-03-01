<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!$this->session->userdata('level')) {
	redirect('auth');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Genetika - <?=$title;?></title>
    <link rel="icon" href="<?=base_url();?>assets/img/favicon.png" type="image/x-icon">

    <link href="<?=base_url();?>assets/css/toastr.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/custom-scrollbar/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
    <link href="<?=base_url();?>assets/css/custom0.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/loading.css" rel="stylesheet">
  </head>

  <body class="nav-md">

    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed" style="background-color:#337ab7;">
          <div class="left_col scroll-view" style="background-color:#337ab7;">


            <br/><br/>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?=base_url();?>assets/img/logo.png" alt="..." class="img-circle profile_img" alt="avatar">
              </div>
              <div class="profile_info">
                <span style="color:#ffffff;">Welcome,</span>
                <h2><?=$this->session->userdata('username');?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br/>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?=base_url();?>"><i class="fa fa-home"></i> Beranda </a></li>

                  <?php if ($this->session->userdata('level')=='admin') {?>
                  <li><a><i class="fa fa-pencil"></i> Pengelolaan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=base_url()?>pengelolaan/mapel"><b class="fa fa-book"></b>Mata Pelajaran</a></li>
                      <li><a href="<?=base_url()?>pengelolaan/prodi"><b class="fa fa-graduation-cap"></b>Program Studi</a></li>
                      <li><a href="<?=base_url()?>pengelolaan/guru"><b class="fa fa-users"></b>Guru</a></li>
                      <li><a href="<?=base_url()?>pengelolaan/ruang"><b class="fa fa-building"></b>Ruang</a></li>
                      <li><a href="<?=base_url()?>pengelolaan/waktu"><b class="fa fa-clock-o"></b>Waktu</a></li>
                      <li><a href="<?=base_url()?>pengelolaan/waktu_guru"><b class="fa fa-calendar-o"></b>Request Waktu</a></li>
                      <li><a href="<?=base_url()?>pengelolaan/mapel_prodi"><b class="fa fa-bookmark"></b>Mapel Prodi</a></li>
                      <li><a href="<?=base_url()?>pengelolaan/user"><b class="fa fa-user"></b>User</a></li>
                      <li><a href="<?=base_url()?>pengelolaan/konfig"><b class="fa fa-cog"></b>Konfigurasi</a></li>
                    </ul>
                  </li>
                  <?php }?>

                  <li><a><i class="fa fa-book"></i> Penjadwalan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      <?php if ($this->session->userdata('level')=='admin') {?>
                      <li><a href="<?=base_url()?>penjadwalan/kelas"><b class="fa fa-qrcode"></b>Kelas</a></li>
                      <li><a href="<?=base_url()?>penjadwalan/generate_jadwal"><b class="fa fa-pie-chart"></b>Buat Jadwal</a></li>
                      <?php }?>
                      <li><a href="<?=base_url()?>penjadwalan/jadwal_pelajaran"><b class="fa fa-calendar"></b>Lihat Jadwal</a></li>

                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- loading animation-->
        <div class='loader'>
          <div class='loader--dot'></div>
          <div class='loader--dot'></div>
          <div class='loader--dot'></div>
          <div class='loader--dot'></div>
          <div class='loader--dot'></div>
          <div class='loader--dot'></div>
          <div class='loader--text'></div>
        </div>
        <!--/loading animation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <?=$parse_content?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Sistem Penjadwalan <a href="#">Mata Pelajaran</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->

      </div>
    </div>
    <script src="<?=base_url();?>assets/js/toastr.min.js"></script>
    <script src="<?=base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/js/validator.js"></script>
    <script src="<?=base_url();?>assets/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?=base_url();?>assets/js/custom.js"></script>
    <script src="<?=base_url();?>assets/js/script.js"></script>

    <script>
    function ShowLoading(){
      $(".loader").show();
    }

    $(function(){
      $modal_prodi = $("#responsive");
      $(".edit_prodi" ).on( "click", function() {

        urle = $(this).attr('href');
        idp = $(this).attr('id');
        $.ajax({
          type: "POST",
          url: urle,
          data: { id_ru: idp }
        }).done(function( msg ) {
          $('#responsive').html(msg);
          $modal_prodi.modal('show');
        });
        return false;
      });

      $modal_waktu = $("#waktu");
      $(".get_guru" ).on( "click", function() {
        alert('hai');
        urle = $(this).attr('href');
        $.ajax({
          type: "POST",
          url: urle
        }).done(function( msg ) {
          $('#responsive').html(msg);
          $modal_prodi.modal('show');
        });
        return false;
      });

      $(".get_waktu" ).on( "click", function() {
        url = $(this).attr('href');
        $.ajax({
          type: "POST",
          url: url
        }).done(function( msg ) {
          $('#waktu').html(msg);
          $modal_waktu.modal('show');
        });
        return false;
      });

      $(".edit_guru" ).on( "click", function() {
        urle = $(this).attr('href');
        id_kelas = $(this).attr('id');
        $.ajax({
          type: "POST",
          url: urle,
          data: { idkls: id_kelas }
        }).done(function( msg ) {
          $('#responsive').html(msg);
          $modal_prodi.modal('show');
        });
        return false;
      });

    });

    document.getElementById('1').onchange = function() {
      document.getElementById('x').disabled = !this.checked;
      document.getElementById('x').value = "";
      };

    document.getElementById('2').onchange = function() {
      document.getElementById('xi').disabled = !this.checked;
      document.getElementById('xi').value = "";
      };

    document.getElementById('3').onchange = function() {
      document.getElementById('xii').disabled = !this.checked;
      document.getElementById('xii').value = "";
      };
    </script>
    <script>
      $('.remove').on("click",function() {
        tr = $(this).parents('tr');
        tr.remove();
        return false;
      });
    </script>

  </body>
</html>
