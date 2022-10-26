<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/aframe/1.2.0/aframe.min.js" integrity="sha512-/gO16YMp20RIqCZXZyvMlzALQqEoiDU0akshw25wFiXCRGl+0p/HPWkOd8HWFn6bnatGhxakGLfYhWaPPVQIyA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- <script type="module" src="{{asset('js/aframe-ar.js')}}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/ar.js/2.2.2/aframe-ar.js" integrity="sha512-dnY+hxpnvw66YH5zcmNGih6+DdknsocKFa44tZagwh1x6S0wYDhRbjlcOXjQFgEwJA3uFYI9BVdDuS+9Cs6m3A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<!-- support 3D text -->
<script type="module" src="js/aframe-text-geometry-component.min.js"></script>
    <title></title>
</head>
<body>
<a-scene embedded vr-mode-ui="enabled: false;" arjs="debugUIEnabled: false;">

	<a-assets></a-assets>
		<a-asset-item id="exoFont" src="fonts/exoBlack.typeface.json"></a-asset-item>
		
	</a-assets>

	<!-- 2D text -->
	<a-marker type="pattern" url="data/kanji.patt">
		
		<!-- positioning a plane directly below text for increased visibility; need to adjust position to avoid z-fighting.  -->
		<a-plane color="white" rotation="-90 0 0" position="0 -0.25 0" width="3" material="transparent: true; opacity: 0.90"></a-plane>


		<a-text value="{{$text->content}}" font="fonts/Exo2Bold.fnt" color="red" rotation="-90 0 0" align="center" scale="2 2 2"></a-text>
		
		<!-- positioning a second copy to attempt drop-shadow effect; need to adjust position to avoid z-fighting -->
	</a-marker>

	<!-- 3D text -->
	<a-marker type="pattern" url="data/hiro.patt">

	<a-entity text-geometry="value:{{$text->content}}; font: #exoFont;">
	</a-entity>

	</a-marker>

    <a-entity camera></a-entity>
    
</a-scene>
</body>
</html>