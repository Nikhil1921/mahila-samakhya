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
                      <?= anchor('gallery/'.$k['slug'], $k['name'].' કચેરી', 'class="contet_a"'); ?>
                    </p>
                  </div>
                  <?php endforeach ?>
                </div>
              </div>
              <div class="col-lg-10 mahila_content">
                <div class="row">
                  <div class="col-lg-12">
                    <h2 class="title">Photo Gallery</h2>
                    <div class="row gallery_main mt-3">
                      <?php foreach($gallery['imgs'] as $img): ?>
                      <div class="col-lg-3">
                        <div class="photo">
                          <?= img(['src' => $img['image'], 'class' => "gallery_img"]) ?>
                          <p class="gallery_p"><?= $img['name'] ?></p>
                        </div>
                      </div>
                      <?php endforeach ?>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <h2 class="title">Video Gallery</h2>
                    <div class="row gallery_main mt-3">
                      <?php foreach($gallery['videos'] as $vid): ?>
                      <div class="col-lg-4">
                        <div class="photo">
                          <iframe src="https://www.youtube.com/embed/<?= $vid['v_url'] ?>" width="100%" frameborder="0"></iframe>
                          <p class="gallery_p"><?= $vid['name'] ?></p>
                        </div>
                      </div>
                      <?php endforeach ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</section>