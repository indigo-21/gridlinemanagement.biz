<?php
switch ($_REQUEST['page']) {

	
	case 'how-we-generate-value':

		if(!isset($_REQUEST['service'])){
				include('views/how-we-generate-value.php');
		}else{
				include('views/services.php');
		}	
		break;
	case 'sectoral-experience':
		include('views/sectoral-experience.php');
		break;
	case 'our-firm':
		include('views/our-firm.php');
	case 'digital-archtiecture':
		include('views/digital-archtiecture.php');
		break;
	case 'contact-us':
		include('views/contact-us.php');
		break;
	case 'privacy-policy':
		include('views/privacy-policy.php');
		break;
	case 'cookies-policy':
		include('views/cookies-policy.php');
		break;
	default:
		include('views/home.php');
		break;
}

?>
