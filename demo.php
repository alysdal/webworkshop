<?php

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Demo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script type="text/javascript">
        // change background according to sensor value
        function updateBackgroundColor() {
            var url = "https://api.particle.io/v1/devices/390024001347343338333633/light?access_token=fa2405080d01b918e0574a0f23a0b06c64332305";

            $.getJSON( url, function( data ) {


                //var color = data.result / 4 + 100 ;

                var color = colorTemperatureToRGB(data.result * 10);

                console.log(color, "rgb(" + color.r + "," + color.g + "," + color.b + ")");

                // update text
                $('#lightval').text(data.result);

                // update bg color
                $('body,html').css('background-color', "rgb(" + color.r + "," + color.g + "," + color.b + ")");
            });

            setTimeout(updateBackgroundColor, 0);
        }

        setTimeout(updateBackgroundColor, 100);

        // Helper functions from stackoverflow.
        function proportion(value,max,minrange,maxrange) {
            return Math.round(((max-value)/(max))*(maxrange-minrange))+minrange;
        }

        function colorTemperatureToRGB(kelvin){
            var temp = kelvin / 100;
            var red, green, blue;
            if( temp <= 66 ){
                red = 255;
                green = temp;
                green = 99.4708025861 * Math.log(green) - 161.1195681661;
                if( temp <= 19){
                    blue = 0;
                } else {
                    blue = temp-10;
                    blue = 138.5177312231 * Math.log(blue) - 305.0447927307;
                }
            } else {
                red = temp - 60;
                red = 329.698727446 * Math.pow(red, -0.1332047592);
                green = temp - 60;
                green = 288.1221695283 * Math.pow(green, -0.0755148492 );
                blue = 255;
            }
            return {
                r : Math.floor(clamp(red,   0, 255)),
                g : Math.floor(clamp(green, 0, 255)),
                b : Math.floor(clamp(blue,  0, 255))
            }
        }

        function clamp( x, min, max ) {

            if(x<min){ return min; }
            if(x>max){ return max; }

            return x;

        }
    </script>
</head>
<body>
<h2>Lysstyrke: <span id="lightval" ></span></h2>
</body>
</html>
