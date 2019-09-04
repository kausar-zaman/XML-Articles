<!-- Link stylesheet -->
<link rel='stylesheet' href='style/index.css'>
<div id='wrapper'>
<div id='catsearch'>
<h2>Search article by category</h2>
 <form name='search' method='POST' action='searchcategory.php'>
    <?php 
	
//output search category form
//output drop down list	
//declare url of xml file as variable
//load url file
//declare loaded file as variable
//execute xpath from xml variable
//declare xpath query as variable called channel
//for each channel variable as item
//output channel variable from category element from xml file
//output submit button
//END
	
    echo "<select name='catSearch' id='catSearch'>";
	
	$url = 'http://unn-isrd1.newnumyspace.co.uk/xml-com/';

        $xml = simplexml_load_file($url);
		
		$channel = $xml->xpath('//channel/item[1] | //channel/item[2] | //channel/item[3] | //channel/item[4] | //channel/item[5] | //channel/item[7]');
            foreach ($channel as $item)
            {
                echo "<option value='".$item->category."'>" . $item->category . "</option>";
            }
    echo "</select>";
    ?>
      <input type='submit' value='Search' name='submit'/>
</form>
</div>
</div>
