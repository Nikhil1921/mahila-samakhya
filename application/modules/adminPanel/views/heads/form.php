<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-header">
    <h5><?= $title ?> <?= $operation ?></h5>
</div>
<div class="card-body">
    <?= form_open_multipart('', '', ['image' => isset($data['img']) ? $data['img'] : '']) ?>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Name', 'name', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "name",
                        'name' => "name",
                        'maxlength' => 50,
                        'required' => "",
                        'value' => set_value('name') ? set_value('name') : (isset($data['name']) ? $data['name'] : '')
                    ]); ?>
                    <?= form_error('name') ?>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Image', 'image', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "file",
                        'id' => "image",
                        'name' => "image",
                    ]); ?>
                    <?= form_error('hoddo') ?>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Hoddo', 'hoddo', 'class="col-form-label"') ?>
                    <?= form_textarea([
                        'class' => "form-control",
                        'type' => "text",
                        'rows'=>"3",
                        'id' => "hoddo",
                        'name' => "hoddo",
                        'maxlength' => 200,
                        'required' => "",
                        'value' => set_value('hoddo') ? set_value('hoddo') : (isset($data['hoddo']) ? $data['hoddo'] : '')
                    ]); ?>
                    <?= form_error('hoddo') ?>
                </div>
            </div>
            <?php if (isset($data['img'])): ?>
                <div class="col-2">
                    <?= img(['src' => $this->path.$data['img'], 'width' => '100%', 'height' => '120']); ?>
                </div>
            <?php endif ?>
            <div class="col-12"></div>
            <div class="col-3">
                <?= form_button([
                    'type'    => 'submit',
                    'class'   => 'btn btn-outline-primary btn-block col-12',
                    'content' => 'SAVE'
                ]); ?>
            </div>
            <div class="col-3">
                <?= anchor("$url", 'CANCEL', 'class="btn btn-outline-danger col-12"'); ?>
            </div>
        </div>
    <?= form_close() ?>
</div>