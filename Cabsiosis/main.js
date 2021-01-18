import * as THREE from 'https://cdn.jsdelivr.net/npm/three@0.120.1/build/three.module.js'
import { OBJLoader } from 'https://cdn.jsdelivr.net/npm/three@0.120.1/examples/jsm/loaders/OBJLoader.js'
import { EffectComposer } from 'https://cdn.jsdelivr.net/npm/three@0.120.1/examples/jsm/postprocessing/EffectComposer.js'
import { RenderPass } from 'https://cdn.jsdelivr.net/npm/three@0.120.1/examples/jsm/postprocessing/RenderPass.js'
import { ShaderPass } from 'https://cdn.jsdelivr.net/npm/three@0.120.1/examples/jsm/postprocessing/ShaderPass.js'
import { LuminosityShader } from 'https://cdn.jsdelivr.net/npm/three@0.120.1/examples/jsm/shaders/LuminosityShader.js'
import TWEEN from "https://cdn.jsdelivr.net/npm/tween-js-modern-module@17.2.0/dist/tween.esm.js"

// declare scene vars
let container;
let scene, bgColorDark, bgColorWhite, camera, controls, renderer, renderTarget, manager, loader, composer;
let isOn = true;

// declare model vars
let object, objects, titleObj, jpObj, ronObj, jansObj, terrainObj;
objects = [];

// declare raycast vars
let raycaster, mouse, intersects, intersect;
raycaster = new THREE.Raycaster();
mouse = new THREE.Vector2();

let cameraYPos = new THREE.Vector3().set(0, 0, 5);

var bgEvent = new CustomEvent('bgEvent');

init();
animate();

function init() {
    container = document.createElement('div');
    container.setAttribute('id', 'viewport');
    document.getElementById('here').appendChild(container);

    // camera
    camera = new THREE.PerspectiveCamera(90, window.innerWidth / window.innerHeight, 0.1, 2000);
    camera.position.z = 5;
    
    // scene
    scene = new THREE.Scene();
    scene.fog = new THREE.Fog( 0x000000, 1, 1000 );
    bgColorDark = new THREE.Color(0x0a0a0a);
    bgColorWhite = new THREE.Color(0xf5f1e1);

    let spotLight = new THREE.SpotLight(0xffffff);
    spotLight.position.y = 5;
    spotLight.castShadow = true;
    spotLight.shadow.mapSize.width = 512;
    spotLight.shadow.mapSize.height = 512;
    spotLight.shadow.camera.near = 500;
    spotLight.shadow.camera.far = 2000;
    spotLight.shadow.camera.fov = 30;
    scene.add(spotLight);


    let pointLight = new THREE.PointLight( 0xffffff, 0.3 );
    pointLight.position.y = 5;
	camera.add(pointLight);
    scene.add(camera);

    // renderer
    renderer = new THREE.WebGLRenderer({ alpha: true, premultipliedAlpha: false });
    renderTarget = new THREE.WebGLRenderTarget(window.innerWidth || 1, window.innerHeight || 1, { format: THREE.RGBAFormat, stencilBuffer: false });
    renderer.autoClear = false;
    renderer.setClearColor(0xffffff, 0);
    renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.setPixelRatio(window.devicePixelRatio);

    // manager
    manager = new THREE.LoadingManager();
    manager.OnProgress = function(item, loaded, total) {
        console.log(item, loaded, total);
    };

    function OnProgress(xhr) {
        if (xhr.lengthComputable) {
            let percentComplete = xhr.loaded / xhr.total * 100;
            console.log('model' + Math.round(percentComplete, 2) + '% downloaded');

        }
    }

    function onError() { console.log('err'); }

    let material = new THREE.MeshStandardMaterial({color: '#e0e0e0', roughness: 0});
    let tMaterial = new THREE.MeshStandardMaterial({color: '#424242', roughness: 1});
    // load model
    loader = new OBJLoader(loader); 
    loader.load('models/title.obj', function(object) {
        object.traverse(function(child) {
            if (child instanceof THREE.Mesh) {
                child.material = material;
            }
        });
        titleObj = object;
        scene.add(object);
        objects.push(object);

        titleObj.position.set(0, 0, 0);
    });
    loader.load('models/camera.obj', function(object) {
        object.traverse(function(child) {
            if (child instanceof THREE.Mesh) {
                child.material = material;
            }
        });
        jpObj = object;
        scene.add(object);
        objects.push(object);

        jpObj.position.set(0, -60, 0);
    });
    loader.load('models/unity.obj', function(object) {
        object.traverse(function(child) {
            if (child instanceof THREE.Mesh) {
                child.material = material;
            }
        });
        ronObj = object;
        scene.add(object);
        objects.push(object);

        ronObj.position.set(0, -70, 0);
    });
    loader.load('models/js.obj', function(object) {
        object.traverse(function(child) {
            if (child instanceof THREE.Mesh) {
                child.material = material;
            }
        });
        jansObj = object;
        scene.add(object);
        objects.push(object);

        jansObj.position.set(0, -80, 0);
    });
    loader.load('models/terrain.obj', function(object) {
        object.traverse(function(child) {
            if (child instanceof THREE.Mesh) {
                child.material = tMaterial;
            }
        });
        terrainObj = object;
        scene.add(object);
        objects.push(object);

        terrainObj.position.set(0, -25, 0);
    });


    // postprocessing
    
    composer = new EffectComposer(renderer, renderTarget);
    var renderPass = new RenderPass(scene, camera);
    renderPass.clearColor = new THREE.Color(0, 0, 0);
    renderPass.clearAlpha = 0;
    composer.addPass(renderPass);   

    // shaders
    var lS = new ShaderPass(LuminosityShader);
    composer.addPass(lS);


    renderer.render(scene, camera);
    container.appendChild(renderer.domElement);

    window.addEventListener('resize', onWindowResize, false);
    window.addEventListener('changePage', moveCamPos);
    window.addEventListener('mousemove', onMouseMove, false)
    window.addEventListener('mousedown', selectObj, false);
}

function onWindowResize() {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();

    renderer.setSize(window.innerWidth, window.innerHeight);
    composer.setSize(window.innerWidth, window.innerHeight);
}

function animate() {
    requestAnimationFrame(animate);

    if (jpObj && ronObj && jansObj) {
        jpObj.rotation.x += 0.005;
        jpObj.rotation.y += 0.005;

        ronObj.rotation.x += 0.005;
        ronObj.rotation.y += 0.005;

        jansObj.rotation.x += 0.005;
        jansObj.rotation.y += 0.005;
    }

    TWEEN.update();
    render();
}

function render() {
    renderer.render(scene, camera);
    composer.render();
}

function onMouseMove(e) {
    e.preventDefault();
    mouse.set( ( e.clientX / window.innerWidth ) * 2 - 1, - ( e.clientY / window.innerHeight ) * 2 + 1 );
    raycaster.setFromCamera(mouse, camera);
}

function selectObj(e) {
    e.preventDefault();
    mouse.set( ( e.clientX / window.innerWidth ) * 2 - 1, - ( e.clientY / window.innerHeight ) * 2 + 1 );
    raycaster.setFromCamera(mouse, camera);
    intersects = raycaster.intersectObjects(objects, true);
    if (intersects.length > 0){
        intersect = intersects[0];
        console.log(intersect.object.name);
        if (intersect.object.name !== 'Text' && intersect.object.name !== 'terrain_Cube') {
            window.dispatchEvent(bgEvent);
        }
        /* click anim [NOT WORKING]
        let from = intersect.object.position.z;
        let to = {
            x: intersect.object.position.x,
            y: intersect.object.position.y,
            z: intersect.object.position.z
        }
        let bounceObj = new TWEEN.Tween(from)
            .to(to, 1000)
            .easing(TWEEN.Easing.Elastic.Out)
            .onUpdate(function() {})
        bounceObj.start();
        return bounceObj;        
        */
    }
}

function moveCamPos() {
    console.log(sPage);
    switch(sPage) {
        case 0:
            cameraYPos.y = 0;
            break;
        case 1:
            cameraYPos.y = -60;
            break;
        case 2:
            cameraYPos.y = -70;
            break;
        case 3:
            cameraYPos.y = -80;
            break;
        case 4:
            cameraYPos.y = -90;
            break;
    }
    let from = camera.position;
    let to = {
        x: camera.position.x,
        y: cameraYPos.y,
        z: camera.position.z
    };
    let tween = new TWEEN.Tween(from)
        .to(to, 1000)
        .easing(TWEEN.Easing.Quadratic.Out)
        .onUpdate(function() { })
    tween.start();
    return tween;
}