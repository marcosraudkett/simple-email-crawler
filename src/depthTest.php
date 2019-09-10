<?php
	/* inlcude autoloader or email_crawler */
	require_once "../includes/init.php";
	/* include tests page menu */
	require_once 'includes/menu.php';

	//if form is submitted
	if(isset($_POST["crawl"])) 
	{
		//check that url is set and is not empty
		if (isset($_POST["url"]) && !empty($_POST["url"])) 
		{

	        $_POST['url'] = htmlspecialchars($_POST['url']);
	        $_POST['url'] = str_replace("'", "&#39;", $_POST['url']);

			/* ========================================= */

			/* printing the whole output (unique is true, if you set it to false you will also get all the empty elements) */
			echo '<b>Output:</b> <br><br>';
			$crawler = new email_crawler($_POST['url'], true, true);
			$crawl = $crawler->crawl_site();
			
			
			
			echo '<pre>';
			
				var_dump($crawl);
			
			echo '</pre>';

			


		}
	}

?>
<br>
<br>

<form method="POST">
	<input type="text" name="url" placeholder="website url" value="<?php if(isset($_POST['url'])) { echo $_POST['url']; } else { echo 'https://marcosraudkett.com/mvrclabs/email-crawler/tests/test_pages/deep/'; }?>">
	<button type="submit" name="crawl">Get Email(s)</button>
</form>