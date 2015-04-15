

<?php
	

function  create_image(){
	
	// Create a new image object that will be saved to the server
	$image = imagecreate(200, 80) or die("Cannot Initialize new GD image stream");
	
	// Create the color pallet for the png file
	$background_color = imagecolorallocate($image, 0, 0, 63);  // Dark Blue
	$line_color = imagecolorallocate( $image, 31, 31, rand(100,255) );  // Random light Blue
	$text_colour = imagecolorallocate( $image, 255, 255, 0 );  // Yellow
	
	// Choose the line width
	imagesetthickness ( $image, 3 );
	// Draw a line on the image with a start (12,77) and end (197, 34) point
	// using the line_color
	imageline( $image, 12, 75, 197, 32, $line_color );
	
	// Select the costom font from our server
	$font = 'MIDNSBRG.TTF';
	// Output the text to the image using font size, angle, x pos, y position 
	// and font choice.  The last option is the  string of text to output
	imagettftext($image, 27, 13, 5, 73, $text_colour, $font, "Image-". rand(0,9));
	
	// Prepare the final image and save to path.  If you only pass 
	// it $image it will output to the browser instead of a file
	imagepng($image,"image.png");
	
	
	// We finish by clearing the colors from memory
	imagecolordeallocate( $image, $background_color );
	imagecolordeallocate( $image, $line_color );
	imagecolordeallocate( $image, $text_colour );
	
	// And we close the connection to the image object now that its saved.
	imagedestroy($image);
}
	
	
	// Create image
	create_image();
	// Create output
	$output = '	<a href="index.php"><img src="image.png" alt="generated image" /></a><br/>';
?>


<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Image Manipulation</title>
</head>

<body>
<?php echo $output; ?>
</body>
</html>