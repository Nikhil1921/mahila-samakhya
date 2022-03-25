<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="background">
  <section class="content">
    <div class="container">
      <div class="row content_main">
        <div class="padd">
          <div class="col-lg-12 content_right">
            <?php $this->load->view('breadcrumb', $title) ?>
            <div class="row cont_right_main">
              <div class="col-lg-2">
                <div class="sec_content">
                  <?php foreach($kacheries as $k): ?>
                  <div class="content-1">
                    <p>
                      <?= anchor('staff/'.$k['slug'], $k['name'].' કચેરી', 'class="contet_a"'); ?>
                    </p>
                  </div>
                  <?php endforeach ?>
                </div>
              </div>
              <div class="col-lg-10 mahila_content">
                <h2 class="title">કર્મચારીઓ</h2>
                <div class="table-responsive mt-5">
                  <table class="table table-bordered table-striped product-table">
                    <thead>
                      <tr style="background: #939796 !important;color: #ffffff !important;">
                        <th colspan="3" style="text-align: center;"><strong>ફોટો</strong></th>
                        <th colspan="5" style="text-align: center;"><strong>નામ</strong></th>
                        <th colspan="2" style="text-align: center;"><strong>હોદ્દો</strong></th>
                        <th colspan="2" style="text-align: center;"><strong>મોબાઈલ નંબર</strong></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($staff as $v): ?>
                      <tr>
                        <td colspan="3" style="text-align: center;"><?= img(['class' => "img_staff", 'src' => $v['image']]) ?></td>
                        <td colspan="5" style="text-align: center;"><p class="tbl_p"><?= $v['name'] ?></p></td>
                        <td colspan="2" style="text-align: center;"><?= $v['hoddo'] ?></td>
                        <td colspan="2" style="text-align: center;"><?= $v['mobile'] ?></td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</section>