<?php
echo '<div class="contentN">Novosti</div>';
$files= array();
foreach (new DirectoryIterator('./novosti') as $file) {
    if($file->isDot()) continue;
    array_push($files,$file->getFilename());
}

    for ($i=0; $i<count($files)-1; $i++) 
    {
        $dat = file('./novosti/'.$files[$i]);
        $date1 = $dat[0];
        $dat = file('./novosti/'.$files[$i+1]);
        $date2 = $dat[0];
    }
        
    for ($i=0; $i<count($files); $i++) 
    {
        $dat = file('./novosti/'.$files[$i]);
        $datum = $dat[0];
        $autor = $dat[1];
        $naslov = ucfirst(strtolower($dat[2]));
        $tekst = " ";
        $size = sizeof($dat);
        $index  = 3;
        $open = false;
        
       while($index < $size)
        {
           if($dat[$index] == "--\r\n") 
           {
               $open = true;
               $index = $index + 1;
               break;
           }
            $tekst = $tekst . $dat[$index];
            $index = $index + 1;
        }
        
       while($open && $index < $size)
            $index = $index + 1;
        
        $datum = str_replace( "\r\n", '<br />', $datum );
        $naslov = str_replace( "\r\n", '<br />', $naslov );
        $tekst = str_replace( "\r\n", '<br />', $tekst );
        $autor = str_replace( "\r\n", '<br />', $autor );
        
        
         echo '<div class="mainContent">'.
            '<div class="content">'.
                 '<div>'.
                     '<div class="datum">'.
                          "$datum".
                      '</div>'.              
            ' <div class="autor">'.$autor.'</div>'.
                  '</div>'.
                $naslov.
            '</div>'.
            '<div class="content">'.
                "$tekst"; ?>
           <?php echo '</div>'.
       '</div>';
    }
    ?>
    