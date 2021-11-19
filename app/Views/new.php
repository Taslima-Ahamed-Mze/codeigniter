<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
<?php $validation = \Config\Services::validation(); ?>
<div class="alert <?= session()->getFlashdata('alert-class') ?>">
    <?= session()->getFlashdata('message') ?>
</div>
    <div class="row justify-content-md-center my-4">
        <h3 class="card-title">Ajouter un utilisateur</h3>
        <div class="card">
            <div class="card-body">
                <form method="post" action="<?= site_url('/new-form') ?>">
                    <div class="form-group">
                        <div class="row my-3">
                            <div class="col-md-6">

                                <label for="exampleInputEmail1">Nom</label>
                                <input type="text" class="form-control"  name="lastname" placeholder="Nom">
                                <!-- Error -->
                                <?php if($validation->getError('lastname')) {?>
                                    <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('lastname'); ?>
                                    </div>
                                <?php }?>
                            </div>
                            <div class="col-md-6">

                                <label for="exampleInputEmail1">Prénom</label>
                                <input type="text" class="form-control" name="firstname" placeholder="Prénom">
                                <?php if($validation->getError('firstname')) {?>
                                    <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('firstname'); ?>
                                    </div>
                                <?php }?>
                            </div>
                            <div class="col-md-6">

                                <label for="exampleInputEmail1">Adresse</label>
                                <input type="text" class="form-control"  name="address" placeholder="Adresse">
                                <?php if($validation->getError('address')) {?>
                                    <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('address'); ?>
                                    </div>
                                <?php }?>
                            </div>
                            <div class="col-md-6">    
                                <label for="exampleInputEmail1">Code postal</label>
                                <input type="text" class="form-control"  name="zip_code" placeholder="Code postal"> 
                                <?php if($validation->getError('zip_code')) {?>
                                    <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('zip_code'); ?>
                                    </div>
                                <?php }?>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Téléphone</label>
                                <input type="text" class="form-control"  name="phone" placeholder="Téléphone">
                                <?php if($validation->getError('phone')) {?>
                                    <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('phone'); ?>
                                    </div>
                                <?php }?>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Date de naissance</label>
                                <input type="date" class="form-control"  name="birthdate" >
                                <?php if($validation->getError('birthdate')) {?>
                                    <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('birthdate'); ?>
                                    </div>
                                <?php }?>
                            </div>
                            <div class="col-md-12">
                                <label for="exampleFormControlSelect1">Service</label>
                                <select class="form-control" name="service">
                                    <option value="">Service</option>
                                    <?php foreach($services as $service): ?>
                                        <option value="<?= $service['id'] ?>"><?= $service['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if($validation->getError('service')) {?>
                                    <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('service'); ?>
                                    </div>
                                <?php }?>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
                
            </div>
        </div>         
    </div>
<?= $this->endSection() ?>