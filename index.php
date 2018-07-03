<?php
require_once 'vendor/autoload.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="custom.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

  </head>
  <body>


    <?php
    // initialize the client
    $client = new \Contentful\Delivery\Client(
    '042f3d48d54d84dc5d38f646eee6cbf9a54000521daeb93c7d8137b0a3d07396',
    'hop0g8j86vh6'
    );

    // query to display the categories in the menu, ordered by ID
    $query = new \Contentful\Delivery\Query();
    $query->setContentType('category')
            ->orderBy('fields.id');
    $categories = $client->getEntries($query);
    ?>
 

		<a class="menu-bar" data-toggle="collapse" href="#menu">
            <span class="bars"></span>            
        </a>
    	<div class="menu collapse in" id="menu">
            <ul class="list-inline">
            	<?php
				foreach ($categories as $category) {
				
					$category->getName();
                    // retrieve the system ID for the next query.. not sure if this is the easiest solution :)
					$systemID= $category->getSystemProperties()->getId();
    				echo "<li><a href=\"index.php?id=".$systemID."\">".$category->name."</a></li>";
				}
            	?>
              
            </ul>   
    	</div>

        <div class="container main-section">
            <div class="row">
			<?php
            if (isset($_GET['id'])) {
                // get all the products of the selected category
                $query2 = new \Contentful\Delivery\Query();
                $query2->setContentType('product')
                ->where('fields.category.sys.id',$_GET['id']);
                $products = $client->getEntries($query2);
                            foreach ($products as $product) {
                                echo "<div class='col-md-3 col-sm-3 col-xs-12 image-main-section'>";

                                echo"<div class='row img-part'>";
                                    echo "<div class='col-md-12 col-sm-12 colxs-12 img-section'>";
                                // Getting the image, first I get the ID
                                //... but I am sure there is a better way to get the image link...
                                        $imageid=$product->get('imageId');
                                // query to get the asset Image
                                        $asset = $client->getAsset($imageid[0]);
                                // set the option for a 100px height image
                                        $options = (new \Contentful\Core\File\ImageOptions())
                                        ->setFormat('jpg')
                                        ->setHeight(350);
                                //print the image finally!
                                        echo "<img src=".$asset->getFile()->getUrl($options)."></div>";
                                        echo "<div class='col-md-12 col-sm-12 col-xs-12 image-title'>";
                                            echo "<h3>". $name= $product->name."</h3>
                                        </div>";
  		                                echo "<div class='col-md-12 col-sm-12 col-xs-12 image-description'>";
                                            echo "<p>".$product->description."</p>
                                        </div>";
                                        echo "<div class='col-md-12 col-sm-12 col-xs-12'>
                                            <a href='#' class='btn btn-success add-cart-btn'>ADD TO CART</a>
                                        </div>
                                    </div>                                    </div>

                                ";
	                       }
                        } 
            	?>
            </div>
        </div> 
        </div> 
  

    
    
    </body>
    </html>
    