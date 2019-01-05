<?php 
    session_start(); 
    
?>

<!-- this is the head tags containing all links, meta tags and all needed starter files -->
<?php include_once('includes/starter.php'); ?>
<body>
    
    <!-- this is the head section of the website -->
    <?php include_once('includes/header.php'); ?>


    <!-- this is the main body -->
    <div class="container">

        <!-- this body beginss with a slider -->
        <?php include_once('includes/slider.php'); ?>


        <!-- first section -->
            <div class="section firstSection">
                <h2>Makurdi Callibration</h2>
                <p>
                    An organized collection of all the towns or districts or better
                still Areas as some will have it called and major streets alongside villages and 
                their zip codes within Makurdi city. The project is for the main time limited to Makurdi 
                city as an honor to the Federal University of Agriculture Makurdi.
                </p>
                <a href="documentation.php"><button class="button"> Get Started</button></a>
                
                <a href="downloads/makurdi.zip"><button class="button" name="download"> Download</button></a>
                <?php $_SESSION['download'] = 'yes'; ?>
                
            </div>

        <!-- second section -->
            <div class="section secondSection">
                <div class="gettingStarted">
                    <h2>Getting Started</h2>
                    <p>
                        Download the library using the download botton above of at the header top-right. 
                        Unzip the file, then copy and paste the folder (makurdi) at the desired location 
                        of your work or project.
                    </p>
                    <form action="" method="post">
                    <a href="downloads/makurdi.zip"><button class="button" name="some"> Download</button></a> 
                    </form>
                </div>
                <div class="howTo">
                    <h2>How To Use This Library</h2>
                    <p>
                        Include the root file (index.php) using the php include function: include('makurdi/index.php').
                        create an instace of the class: $obj = new Makurdi();
                        And the object can be use with all the fifteen methods or functions available in the library.
                        Good Luck.
                    </p>
                    <a href="documentation.php"><button class="button"> Read Documentation</button></a>
                </div>
            </div>
            

        <!-- third section -->
            <div class="section thirdSection">
                <h2>What is your opinion about this work</h2>
                <p>
                    This is the first major project I have carried out in my quest to become a software 
                    developer. It is built with pure HTML5, CSS3 and PHP7 over two color shades; black 
                    and white. I currently refer to this work 
                    as version 0.1 and hope to continually build on this by and by. 
                </p>
                <p>
                    On this note, I 
                    humbly beseek you to make your inputs, critisism, comments and or opinions aimed 
                    at improving this work and most especially my quest to be a developer. In other 
                    to achieve this, the work is hereby hosted. This will 
                    bridge the gape of communication between you and I.  
                </p>
                <p>  Please use the Button to make your inputs, Thanks. </p>

                <a href="#modal"><button class="button" name="button"> Make Recommendation</button></a>
                <!-- <form action="" method="post">
                    <a href="#test"><button class="button" name="button" > Make Recommendation</button></a>
                </form> -->
            </div>
            

        <!-- this is the footer section -->
        <?php include_once('includes/footer.php'); ?>
            

     </div> <!-- end of container -->
    
    <!-- the copyright part -->
    <?php include_once('includes/copyright.php'); ?>

    <!------------------------------- end of the entire page --------------------------------->

    <!-- this the modal -->
    <div class="modal" id="modal">
        <div class="modalContent">
            <a href="#" class="modalClose">X</a>
            <div class="modalHeader">
                <?php 
                    if(isset($_SESSION['message']) && $_SESSION['message'] != null ){
                        echo '<h2>' . $_SESSION['message'] . '</h2>';
                    } else {
                        echo '<h2>Feedback Form</h2>';
                    }
                ?>
            </div>
            <div class="modalBody">
                <form action="database/insert.php" method="post">
                <p>Kind use the form below to make your inputs. You may wish to exit this window and go 
                    through the web application again to aid your feedback.</p>
                    <div class="forminput"> 
                        <h3>The Header</h3>
                        <p>What do you think of the Logo, navigation menu and the Header as a whole</p>
                        <textarea name="header" id="" cols="30" rows="2"></textarea>
                    </div>
                    <div class="forminput">
                        <h3>The slider</h3>
                        <p>What about the slider. do you think it should be better</p>
                        <textarea name="slider" id="" cols="30" rows="2"></textarea>
                    </div>
                    <div class="forminput">
                        <h3>The body and or content</h3>
                        <p>What do you say about the content as a whole</p>
                        <textarea name="body" id="" cols="30" rows="2"></textarea>
                    </div>
                    <div class="forminput">
                        <h3>The Footer</h3>
                        <p>What do you say about the footer</p>
                        <textarea name="footer" id="" cols="30" rows="2"></textarea>
                    </div>
                    <div class="forminput">
                        <h3>Buttons, modals and colour</h3>
                        <p>What do you say about the buttons, use of modal(pup ups) and the colours for the whole design</p>
                        <textarea name="buttons" id="" cols="30" rows="2"></textarea>
                    </div>
                    <div class="forminput">
                        <h3>Other Pages </h3>
                        <p>The documentation page is of more concern here. what do you think about it content</p>
                        <p>Do you think the code should be displayed in a better way? please suggest.
                           What are you observations for the other pages?
                        </p>
                        <textarea name="pages" id="" cols="30" rows="2"></textarea>
                    </div>
                    <div class="forminput">
                        <h3>Mobile Compatibility</h3>
                        <p> Please use a mobile phone or tablet to access this project, or 
                            resize the browser window if you are using a personal computer. 
                            Would you say this work is mobile compatible, why?
                        </p>
                        <textarea name="compatibility" id="" cols="30" rows="2"></textarea>
                    </div>
                    <div class="forminput input">
                        <h3>Your Contact Detail </h3>
                        <p> This is optional, however, if completed details shall be treated as 
                            confidential and will be used one to one correspondence only.
                        </p>
                        <input type="text" name="name" placeholder="Your Name">
                        <input type="email" name="email" placeholder="Your Email">
                        <input type="number" name="phone" placeholder="Your Phone Number">
                    </div>
                    <br>
                    <button class="button btnForm" name="submit">Submit</button>
                    <input class="button btnForm" type="reset" value="Clear">                    
                    
                </form>
                <div class="modalFooter"><h3>Thanks For Your Input, it means a lot.</h3></div>
            </div>
            
        </div>
    </div>
    
    <!-- modal -->
    <?php
        include_once('includes/functions.php');
        if(isset($_POST['some'])){
            $url = $_SERVER['PHP_SELF'];
            $head = 'Thank You For Downloading';
            $body = 'Thank you for downloading makurdi library. You may wish to check your download 
                    folder or the folder you keep your dowmloaded files for library you just downloeded. 
                    It is a zip folder; unzip it and proceed with the set up';
            $foot = 'Once agin, thanks. It means a lot';

            modal($head, $body, $foot, $url);
            session_destroy();
        }
    ?> 
    <!-- modal -->
    <?php 
        // include_once('includes/functions.php');
        // $head = 'THIS IS THE HEAD OF THE MODAL';
        // $body = '
        //             Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        //             Modi vel, illum neque minus laudantium expedita. Laboriosam
        //             itaque quo hic id dolor dolore
        //             dignissimos perspiciatis? Eveniet odit aliquam nam. Aperiam, omnis?
        //         ';
        // $foot = 'HERE IS NOW THE FOOT PART OF THIS MODAL';
        
        // //echo $_SERVER['HTTP_HOST'];

        // if( isset($_POST['button']) ){
        //     //echo $_GET['name'];
        //     var_dump($_POST['button']);
        //     modal($head, $body, $foot);
        // }
    ?>

</body>
</html>
    <!-- this the modal -->
    <!-- <div class="modal" id="test">
        <div class="modalContent">
            <a href="#" class="modalClose">X</a>
            <div class="modalHeader"><h2>This is the Head of this modal</h2></div>
            <div class="modalBody">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Modi vel, illum neque minus laudantium expedita. Laboriosam
                    itaque quo hic id dolor dolore
                    dignissimos perspiciatis? Eveniet odit aliquam nam. Aperiam, omnis?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Modi vel, illum neque minus laudantium expedita. Laboriosam
                    itaque quo hic id dolor dolore
                    dignissimos perspiciatis? Eveniet odit aliquam nam. Aperiam, omnis?
                </p>
                
            </div>
            <div class="modalFooter"><h3>Hear is the footer</h3></div>
        </div>
    </div>    -->
