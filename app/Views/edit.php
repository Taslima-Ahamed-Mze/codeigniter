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
    <?php $validation = \Config\Services::validation(); 
    //dd($users[0]->address);
    ?>
    <div class="row">
        <div class="col-md-6">

            <form method="post" action="<?= site_url('/edit-form/'.$users[0]->id) ?>">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nom</label>
                    <input type="text" class="form-control" value="<?= $users[0]->lastname ?>"  name="lname" placeholder="Nom">
                    <!-- Error -->
                    <?php if($validation->getError('lname')) {?>
                        <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('lname'); ?>
                        </div>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Prénom</label>
                    <input type="text" class="form-control" value="<?= $users[0]->firstname ?>" name="fname" placeholder="Prénom">
                    <?php if($validation->getError('fname')) {?>
                        <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('fname'); ?>
                        </div>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Adresse</label>
                    <input type="text" class="form-control" value="<?= $users[0]->address ?>" name="address" placeholder="Adresse">
                    <?php if($validation->getError('address')) {?>
                        <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('address'); ?>
                        </div>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Code postal</label>
                    <input type="text" class="form-control" value="<?= $users[0]->zip_code ?>" name="zcode" placeholder="Code postal">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Téléphone</label>
                    <input type="text" class="form-control" value="<?= $users[0]->phone ?>"  name="phone" placeholder="Adresse">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Date de naissance</label>
                    <input type="date" class="form-control" value="<?= $users[0]->birthdate ?>"  name="date" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Service</label>
                    <select class="form-control"  name="service">
                        <option selected="selected" value="<?= $users[0]->service_id ?>"><?= $users[0]->name ?></option>
                        <?php foreach($services as $service): ?>
                            <option value="<?= $service['id'] ?>"><?= $service['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Editer</button>
            </form>
        </div>
        
            
        
        
               
    </div>
</div>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>