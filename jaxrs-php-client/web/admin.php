<html>
<head>
    <title>Admin cards</title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<body>

<div class="block_page">
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12 ">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Valid</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Delete</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Create</a>
                    <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">List</a>
                </div>
            </nav>
            <div class="tab-content" style="width: 100% !important;" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                   <div style="width: 1024px !important;">
                       <form method="post" action="../src/Controller.php">
                           <div class="form-group">
                               <label for="exampleInputEmail1">Credit card number</label>
                               <input required type="number" class="form-control" id="exampleInputEmail1" name="validCard" placeholder="Enter control number here">
                               <?php
                                if (isset($_GET['validation'])){
                                    $validation = $_GET['validation'];
                                    if ($validation == "true"){
                                        echo "<script>alert('THIS CARD IS VALID')</script>";
                                        echo "<small id=\"emailHelp\" class=\"form-text text-muted\"><p style='color:green;'>THIS CARD IS VALID</p></small>";
                                    }else{
                                        echo "<script>alert('THIS CARD IS NOT VALID')</script>";
                                        echo "<small id=\"emailHelp\" class=\"form-text text-muted\"><p style='color: red;'>THIS CARD IS NOT VALID</p></small>";
                                    }
                                }
                                else {
                                    echo "<small id=\"emailHelp\" class=\"form-text text-muted\">Please enter the control number of the card to check if it is valid</small>";
                                }
                               ?>
                           </div>
                           <button type="submit" class="btn btn-primary btn-lg btn-block" >Check now</button>
                       </form>
                   </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div style="width: 1024px !important;">
                        <form method="post" action="../src/Controller.php">
                            <div class="form-group">
                                <label for="CreditCardId">Credit card ID</label>
                                <input required type="number" class="form-control" id="CreditCardId" name="deleteCard" placeholder="Enter the id card here">
                                <?php
                                if (isset($_GET['delete'])){
                                    $delete = $_GET['delete'];
                                    if ($delete == "true"){
                                        echo "<script>alert('THIS CARD WAS DELETED')</script>";
                                        echo "<small id=\"emailHelp\" class=\"form-text text-muted\"><p style='color:green;'>THE CARD WAS DELETED</p></small>";
                                    }else{
                                        echo "<script>alert('CANNOT DELETE THIS CARD')</script>";
                                        echo "<small id=\"emailHelp\" class=\"form-text text-muted\"><p style='color: red;'>CANNOT DELETE THIS CARD</p></small>";
                                    }
                                }
                                else {
                                    echo "<small id=\"emailHelp\" class=\"form-text text-muted\">Please enter the id of the card you want to delete</small>";
                                }
                                ?>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block" >Delete now</button>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div style="width: 1024px !important;">
                        <form method="post" action="../src/Controller.php">
                            <div class="form-group">
                                <label for="cardNumber">Number</label>
                                <input required type="text" class="form-control" id="CreditCardId" name="cardNumber" >

                                <label for="dateEnd">Expiry Date</label>
                                <input required type="date" class="form-control" id="cardNumber" name="dateEnd" >

                                <label for="ctrlNumber">Control number</label>
                                <input required type="number" class="form-control" id="ctrlNumber" name="ctrlNumber" >

                                <label for="cardType">Type</label>
                                <select id="cardType" name="cardType" class="form-control">
                                    <option value="masterCard">
                                        Master Card
                                    </option>
                                    <option value="visa">
                                        VISA
                                    </option>
                                    <option value="PayPall">PayPall</option>
                                </select>
                                <?php
                                if (isset($_GET['create'])){
                                    $create = $_GET['create'];
                                    if ($create == "true"){
                                        echo "<script>alert('THIS CARD CREATED SUCCESSFULLY')</script>";
                                        echo "<small id=\"emailHelp\" class=\"form-text text-muted\"><p style='color:green;'>THE CARD WAS CREATED</p></small>";
                                    }else{
                                        echo "<script>alert('CANNOT CREATE THIS CARD')</script>";
                                        echo "<small id=\"emailHelp\" class=\"form-text text-muted\"><p style='color: red;'>CANNOT CREATE THIS CARD</p></small>";
                                    }
                                }
                                else {
                                    echo "<small id=\"emailHelp\" class=\"form-text text-muted\">please make sure the fields are corrects</small>";
                                }
                                ?>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block" >Create now</button>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                    <div style="width: 1024px !important;">
                        <?php
                        require '../vendor/autoload.php';
                        use GuzzleHttp\Client;
                        
                        $client = new Client();
                        try{
                            $response = $client->request('GET','http://localhost:8080/creditws/resources/creditCard/findAll');
                            if ($response->getStatusCode()==200){
                                $items = json_decode((string)$response->getBody(),true);
                                echo "<table class='table table-striped'>";
                                echo "<thead><tr style='background-color:rgba(230,0,0,0.5)'><td>ID</td><td>Number</td><td>Expiry date</td><td>Control number</td><td>Type</td></tr></thead>";
                                foreach ($items as $key => $value){
                                    echo "<tr>";
                                    foreach ($value as $key2 => $value2){
                                        echo "<td>$value2</td>";
                                    }
                                    echo "</tr>";
                                }
                                echo "</table>";
                            }
                        }catch (\GuzzleHttp\Exception\RequestException $error){
                           if ($error->getCode()== 404)
                               echo "<center><h3 style='color: red;'>There is no card in the database !</h3></center>";
                           else
                               echo "<h3>error from the server : </h3>".$error->getCode();
                        }


                        ?>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>



</body>
</html>