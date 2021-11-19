<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP1</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
    
<div class="container">
    <?php $validation = \Config\Services::validation(); ?>
    <div class="row justify-content-md-center">
        
        <div class="col-lg-6">
            <h3>Ajouter un utilisateur</h3>
            
            <form method="post" action="<?= site_url('/new-form') ?>">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nom</label>
                    <input type="text" class="form-control"  name="lname" placeholder="Nom">
                    <!-- Error -->
                    <?php if($validation->getError('lname')) {?>
                        <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('lname'); ?>
                        </div>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Prénom</label>
                    <input type="text" class="form-control" name="fname" placeholder="Prénom">
                    <?php if($validation->getError('fname')) {?>
                        <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('fname'); ?>
                        </div>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Adresse</label>
                    <input type="text" class="form-control"  name="address" placeholder="Adresse">
                    <?php if($validation->getError('address')) {?>
                        <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('address'); ?>
                        </div>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Code postal</label>
                    <input type="text" class="form-control"  name="zcode" placeholder="Code postal">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Téléphone</label>
                    <input type="text" class="form-control"  name="phone" placeholder="Adresse">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Date de naissance</label>
                    <input type="date" class="form-control"  name="date" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Service</label>
                    <select class="form-control" name="service">
                        <option value="">Service</option>
                        <?php foreach($services as $service): ?>
                            <option value="<?= $service['id'] ?>"><?= $service['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
        
            
        
        
               
    </div>
</div>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>