<!-- Add Book Form -->
<div class="container-fluid d-flex justify-content-center" style="padding: 20px;">
    <div class="form-container" style="width: 70%; max-width: 800px; min-width: 400px; border: 1px solid #ccc; background-color: gray; padding: 20px; border-radius: 8px; text-align: center;">
        <h3 style="margin-top: -30px; display: inline-block; color: black; padding: 0 10px;">
            Add a Book
        </h3>
        <form method="post" action="index.php?action=addBook">
            <!-- Book Title -->
            <div class="row" style="padding: 5px; margin: 5px;">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Book Title" name="book_title" value="">
                    <span><p style="font-weight: bold; display: inline;"><?php if (!empty($data['book_title_error']))
                     { echo $data['book_title_error']; } ?></p></span>
                </div>
            </div>
            <!-- Author -->
            <div class="row" style="padding: 5px; margin: 5px;">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Author" name="book_author" value="">
                    <span><p style="font-weight: bold; display: inline;"><?php if (!empty($data['book_author_error']))
                     { echo $data['book_author_error']; } ?></p></span>
                </div>
            </div>
            <!-- Genre -->
            <div class="row" style="padding: 5px; margin: 5px;">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Book Genre" name="book_genre" value="">
                    <span><p style="font-weight: bold; display: inline;"><?php if (!empty($data['book_genre_error'])) 
                    { echo $data['book_genre_error']; } ?></p></span>
                </div>
            </div>
            <!-- Book Description -->
            <div class="row" style="padding: 5px; margin: 5px;">
                <div class="col">
                    <textarea class="form-control" placeholder="Book Description" name="book_description" rows="4"></textarea>
                    <span><p style="font-weight: bold; display: inline;"><?php if (!empty($data['book_description_error']))
                     { echo $data['book_description_error']; } ?></p></span>
                </div>
            </div>
            <!-- Book Price -->

            <div class="row" style="padding: 5px; margin: 5px;">
                <div class="col">
                <input type="number" class="form-control" placeholder="Book Price" name="book_price" step="0.01" value="">
                <span><p style="font-weight: bold; display: inline;">
                    <?php if (!empty($data['book_price_error'])) { echo $data['book_price_error']; } ?>
                </p></span>
                </div>
            </div>
            <!-- Book Image -->
            <div class="row" style="padding: 5px; margin: 5px;">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Book Image" name="book_image" value="">
                    <span><p style="font-weight: bold; display: inline;"><?php if (!empty($data['book_image_error'])) 
                    { echo $data['book_image_error']; } ?></p></span>
                </div>
            </div>
            <br>
            <!-- Submit and Reset Buttons -->
            <div class="row justify-content-center" style="padding: 5px; margin: 5px;">
                <div class="d-flex justify-content-center align-items-center">
                    <input type="submit" class="btn me-2" style="background-color: blue; color: white;" value="Add Book" name="submit">
                    <input type="reset" class="btn" style="background-color: blue; color: white;" value="Clear Form" name="reset">
                </div>
            </div>
        </form>
    </div>
</div>
