
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            /* background-color: #777; */
        }
        .sidemenu{
            background: black;
            color: white;
            width: 20%;
        }
        #toggle{
            display: none;
        }
        .menulist{
            display: none;
        }
        
        #toggle:checked + .menulist{
            display: block;
        }
    </style>
</head>
<body>
    <div class="sidemenu">
        <label for="toggle">Menu</label>
        <input type="checkbox" id="toggle">
        <div class="menulist">
            <ul>
                <a href="#?name = natha"><li>some items here</li></a>
                <a href="#"><li>some items here</li></a>
                <a href="#"><li>some items here</li></a>
                <a href="#"><li>some items here</li></a>
                <a href="#"><li>some items here</li></a>
                <a href="#"><li>some items here</li></a>
                <a href="#"><li>some items here</li></a>
                <a href="#"><li>some items here</li></a>
                <a href="#"><li>some items here</li></a>
            </ul>
        </div>
    </div>
    <?php
        $name = '';
        if ($_GET){
            echo 'CORRECT, IT WORKED';
        }  
    ?>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
        <tr>
            <th>Some data</th>
            <td>some data</td>
        </tr>
        <tr>
            <td>Some data2</td>
            <td>some data2</td>
        </tr>
        <tr>
            <td>Some data</td>
            <td>some data</td>
        </tr>
    </table>



<?php
    // include_once('includes/functions.php');

    // $url = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    // $head = 'Thank You For Downloading';
    // $body = 'Thank you for downloading makurdi library. You may wish to check your download 
    //         folder or the folder you keep your dowmloaded files for library you just downloeded. 
    //         It is a zip folder; unzip it and proceed with the set up';
    // $foot = 'Once agin, thanks. It means a lot';

    // modal($head, $body, $foot, $url);
?>

<!--
<div class="modalSmall" >
    <div class="modalContentSmall">
        <a href="" class="modalCloseSmall">X</a>
        <div class="modalHeaderSmall">
            <h2>Feedback Form</h2>
        </div>
        <div class="modalBodySmall">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
            Facilis molestiae unde eos perferendis, quaerat labore sed 
            incidunt voluptates rerum id illum vero exercitationem amet 
            quia at modi repellendus! Maxime, fugiat!
        </div>
        <div class="modalFooterSmall"><h3>Thanks For Your Input, it means a lot.</h3></div>
        
    </div>
</div>
 -->


</body>
</html>