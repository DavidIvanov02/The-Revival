<!-- jQuery -->
<script type="text/javascript" src="<?php echo Base_url();?>js/jquery.min.js"></script>

<!-- Bootstrap -->
<script type="text/javascript" src="<?php echo Base_url();?>js/bootstrap.min.js"></script>

<!-- Init  -->
<script type="text/javascript" src="<?php echo Base_url();?>js/youplay.min.js"></script>

<!-- Parallax -->

<script>
	if ( typeof youplay !== 'undefined' ) {
		youplay.init( {

			parallax: true,
			
			navbarSmall: false,

			fadeBetweenPages: true,

			php: {
				twitter: './php/twitter/tweet.php',
				instagram: './php/instagram/instagram.php'
			}
		} );
	}
</script>