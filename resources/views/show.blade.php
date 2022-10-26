<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script
    async
    src="https://unpkg.com/es-module-shims@1.3.6/dist/es-module-shims.js"
></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
    <script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/three.js/0.145.0/three.min.js"
        integrity="sha512-mElAVmOZp/n8OKao194p++kIARCbLKnf/pdVTVI+ZkxL0Rmyw6p5C4kcLd67l2WdvfyBqFe6dI4lR3m++xhdnA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
   
    <title>3d load</title>
</head>

<body>

</body>

<script type="module">
    import * as THREE from 'https://cdn.skypack.dev/three@0.129.0/build/three.module.js';
import { OrbitControls } from 'https://cdn.skypack.dev/three@0.129.0/examples/jsm/controls/OrbitControls.js';
import { GLTFLoader } from 'https://cdn.skypack.dev/three@0.129.0/examples/jsm/loaders/GLTFLoader.js';

     const scene = new THREE.Scene();
    scene.background = new THREE.Color(0xdddddd);
    
    
    const renderer = new THREE.WebGLRenderer({antialias:true});
      
    const camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 0.1, 1000)
    camera.position.z = 10;
    camera.position.y = 2;
    
      const controls = new OrbitControls( camera, renderer.domElement );
      controls.addEventListener('change', renderer);  
        const directionalLight = new THREE.DirectionalLight(0xffffff,100);
      directionalLight.position.set(0,1,0);
      directionalLight.castShadow = true;
    
      scene.add(directionalLight);
      const light = new THREE.PointLight(0xc4c4c4,100);
      light.position.set(0,300,500);
    //  const hlight = new THREE.AmbientLight (0x404040,10);
    //   scene.add(hlight);
    
    //   scene.add(light);
    //   const light2 = new THREE.PointLight(0xc4c4c4,10);
    //   light2.position.set(500,100,0);
    //   scene.add(light2);
    //   const light3 = new THREE.PointLight(0xc4c4c4,10);
    //   light3.position.set(0,100,-500);
    //   scene.add(light3);
    //  const light4 = new THREE.PointLight(0xc4c4c4,10);
    //   light4.position.set(-500,300,500);
    //   scene.add(light4);
    
      renderer.setSize(window.innerWidth,window.innerHeight);
      document.body.appendChild(renderer.domElement);
    
      const loader = new GLTFLoader();
      const filename='{{asset('/storage/uploads/'.$filename)}}';
      loader.load(filename, function(gltf){
      const car = gltf.scene.children[0];
        car.scale.set(0.5,0.5,0.5);
        scene.add(gltf.scene);
        renderer.render(scene,camera);
        animate();
      });
    
    function animate() {
    
        requestAnimationFrame(animate);
        // controls.update();
        renderer.render(scene,camera);
    }
</script>
</html>
 