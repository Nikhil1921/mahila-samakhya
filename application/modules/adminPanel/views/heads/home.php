<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-header">
    <div class="row">
        <div class="col-6">
            <h5><?= $title ?> <?= $operation ?></h5>
        </div>
    </div>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered nowrap">
            <thead>
                <th>Sr.</th>
                <th>Name</th>
                <th>Hoddo</th>
                <th>Image</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php if (!$data): ?>
                    <tr>
                        <td colspan="5" class="text-center">No data available in table</td>
                    </tr>
                <?php else: foreach($data as $k => $v): ?>
                    <tr>
                        <td><?= ++$k ?></td>
                        <td><?= $v['name'] ?></td>
                        <td><?= $v['hoddo'] ?></td>
                        <td><?= img(['src' => $v['img'], 'height' => 70]) ?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="icon-settings"></span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start">
                                <?= anchor("$url/update/".e_id($v['id']), '<i class="fa fa-edit"></i> Edit</a>', 'class="dropdown-item"') ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; endif ?>
            </tbody>
        </table>
    </div>
</div>