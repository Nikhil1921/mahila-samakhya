<section class="contact_us_section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title_main mb-3 text-center">
                    <?php $this->load->view('breadcrumb', $title) ?>
                </div>
                <div class="table-responsive mt-5">
                <table class="table table-bordered table-striped product-table">
                    <thead>
                    <tr style="background: #939796 !important;color: #ffffff !important;">
                        <th class="text-center"><strong>કચેરીનું નામ</strong></th>
                        <th class="text-center"><strong>સરનામું</strong></th>
                        <th class="text-center"><strong>સંપર્ક</strong></th>
                        <th class="text-center"><strong>ઈમેલ</strong></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($kacheries as $v): ?>
                        <tr>
                        <td class="text-center"><?= $v['name'] ?></td>
                        <td class="text-center"><?= $v['address'] ?></td>
                        <td class="text-center"><?= $v['mobile'] ?></td>
                        <td class="text-center"><?= $v['email'] ?></td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</section>