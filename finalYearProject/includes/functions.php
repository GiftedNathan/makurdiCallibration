


<?php

function modal($head, $body, $foot, $url){
    echo '    
            <div class="modalSmall" >
                <div class="modalContentSmall">
                    <a href="'.$url.'" class="modalCloseSmall">X</a>
                    <div class="modalHeaderSmall">
                        <h2>'.$head.'</h2>
                    </div>
                    <div class="modalBodySmall">
                        '.$body.'
                    </div>
                    <div class="modalFooterSmall"><h3>'.$foot.'.</h3></div>
                    
                </div>
            </div>
        ';  
    }


// <a href="#" class="modalClose"><label for="modalClose">X</label></a>




    // echo $_SERVER['HTTP_HOST'];
    // echo $_SERVER['PHP_SELF']; 
    // echo '<br>';
    // echo $_SERVER['REQUEST_URI'];
    // echo '<br>';
    // $al = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "https" ) ;
    // echo $al . '://';
    // echo $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    // echo '<br>';
    // echo '<br>';
    // echo '<br>';
?>

