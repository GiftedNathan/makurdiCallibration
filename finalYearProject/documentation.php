
<?php
    include_once('includes/connection.php');
    include_once('includes/starter.php');
?>

<body>
    <?php include_once('includes/header.php'); ?>
    <div class="container">
        
        <?php
            $sql = "SELECT * FROM documentation";
            if(!$result = mysqli_query($mysqli, $sql) ){
                echo 'ERROR, could not select documentation: ' . mysqli_error($mysqli);
            }  else {
                echo '....SELECT STATMENT EXECUTED WELL.';
                while($row = mysqli_fetch_array($result)){
                    echo '<div class="sectionDoc">' ;
                        echo '<h2>' .$row['docTitle'] . '</h2>' ;  
                        echo '<p>' .$row['docBody'] . '</p>' ;
                        if(!empty($row['docCode'])){
                            echo '<pre class="code"';
                                echo '<code>';
                                    echo $row['docCode'];
                                echo '</code>';
                            echo '</pre>';
                        } else { echo null;}
                        if(!empty($row['docImage'])){
                            //echo '<img src= "' . $row['docImage']  . '"' . '/>';
                            //echo " <img src=" . $row['docImage'] . "'/>";
                        } else { echo null;}
                    echo '</div>' ;
                }
            }
        ?>

        <?php
            $sql = "SELECT * FROM funtions";
            $result = mysqli_query($mysqli, $sql);
            if(!$result){
                echo 'ERROR, could not select from funtions: ' . mysqli_error($mysqli);
            } else {
                while($row = mysqli_fetch_array($result)){
                    echo '<div class="sectionDoc"> ';
                        echo '<h2>' . $row['functionName'] . '</h2>';
                        echo '<p>' . $row['functionDesc'] . '</p>';
                        echo '<pre class="code"> ';
                            echo '<code>';
                                echo $row['functionUsage'];
                            echo '</code>';
                        echo '</pre> ';

                    echo '</div> ';
                }
            }
        ?>  

        <?php include_once('includes/footer.php'); ?>

    </div> <!-- end of container -->

    <?php include_once('includes/copyright.php'); ?>

</body>
</html>