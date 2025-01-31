
<style>
        /* CSS Styling for random books*/
        .featured-section {
            text-align: center;
        }

        .featured-section .column_img {
            width: 100%; /* Ensures the image takes up the full width of its container */
            height: 500px; /* Fix the height to ensure uniform size */
            object-fit: cover; /* Ensures the image fits properly without distortion */
            border: 3px solid black; /* Adds a black border around the image */
            border-radius: 5px; /* Add rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
        }

        .featured-section .col-md-4 {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            height: 100%;
        }

        .featured-section .categories_class {
            margin-top: 10px; /* Adds spacing between the image and description */
            font-size: 14px;
            color: black; /* Subtle gray for readability */
            text-align: center; /* Center-align text for consistency */
        }

        .featured-section h4 {
            margin-top: 10px;
            font-weight: bold;
            text-align: center;
        }
        .featured-section h6 {
            margin-top: 10px;
            font-weight: bold;
            text-align: center;
            color: black; 
        }
    </style> 

<!-- random 3 books we choose for users if they cannot decide -->
<section id="featured" class="featured-section text-center">
    <div class="container">
        <h2 class="mb-4">Random Books</h2>
        <div class="row">
            <?php foreach ($data as $book){?>

            <div class="col-md-4 p-3">
                <img src="<?php
                $var = rand(1,3);
                if($var == 1){
                    echo "images/" . $book['book_image'];
                } else if ($var == 2){
                    echo "images/" .  $book['book_image'];
                }else{
                    echo "images/" . $book['book_image'];
                }
                ?>" class="img-fluid column_img" alt="Random Books ">
                <h4><?php echo $book['book_title']?></h4>
                <h6>$<?php echo $book['book_price']?></h6>
                <p class="categories_class"><?php echo $book['book_description'] ?></p>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
