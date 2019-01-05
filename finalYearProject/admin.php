
<?php
    include_once('includes/connection.php');
    include_once('includes/starter.php');
?>

<body>
    <?php include_once('includes/header.php'); ?>
    <div class="container">
        
        <div class="section sectionDoc">
            <h2>Admin Panel</h2>
            <form action="" method="post">
                <button name="reviews">Review</button>
            </form>
        </div> 

        <?php 
            if(isset($_POST['reviews'])){
                include_once('database/db_functions.php');
                $result = getReviews();
                while($row = mysqli_fetch_array($result)){
                    echo '<div class="sectionDoc"> ';
                    echo '
                        <table>
                            <tr>
                                <th colspan="2">
                                    <h3>
                                ' 
                                    . 'REVIEW BY: ' . '  '
                                    . $row['name'] . '  ('
                                    . $row['phone'] . ',  '
                                    . $row['email'] . ')'.
                                    
                                '   </h3>
                                </th>
                            </tr>
                            <tr> 
                                <th> Header</th> 
                                <td>' . $row['header'] . '</td> 
                            </tr>
                            <tr> 
                                <th>slideer</th> 
                                <td>' . $row['slider'] . '</td> 
                            </tr>
                            <tr> 
                                <th>Body</th> 
                                <td>' . $row['body'] . '</td> 
                            </tr>
                            <tr> 
                                <th>Footer</th> 
                                <td>' . $row['footer'] . '</td> 
                            </tr>
                            <tr> 
                                <th>Buttons</th> 
                                <td>' . $row['buttons'] . '</td> 
                            </tr>
                            <tr> 
                                <th>Pages</th> 
                                <td>' . $row['pages'] . '</td> 
                            </tr>
                            <tr> 
                                <th>Compatibility</th> 
                                <td>' . $row['compatibility'] . '</td> 
                            </tr>
                            
                        </table>
                                
                    ';
                    echo '</div> ';
                }
                
            }
        ?>




        <!-- AN HTML EDITOR PLUIN
        <div class="section">
            <h3>Edit content</h3>
            <form action="">
                <label for="body">Body</label>
                <textarea name="body" id="bbody" cols="80" rows="20">
                    &lt;h1&gt;Article Title&lt;/h1&gt;
                    &lt;p&gt;Here's some sample text&lt;/p&gt;
                </textarea>
                <script type="text/javascript">
                    CKEDITOR.replace( 'body' );
                </script>
            </form>
        </div> -->






        <?php include_once('includes/footer.php'); ?>






    </div> <!-- end of container -->

    <?php include_once('includes/copyright.php'); ?>

</body>
</html>
