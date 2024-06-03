<?php
	if(!define('ABSPATH')){
		exit();
	}
?>
<style>
.ghosthome {
	position: fixed;
	top: 150px;
	left: 0;
	width: 50px;
	height: 150px;
	border-radius: 0px 50% 50% 0px;
	background-color: #222940;
	z-index: 100;
}

.ghost {
	position: absolute;
    top:0;
	width: 100px;
	height: 100px;
	opacity: 0;
	will-change: transform, opacity, filter;
	filter: blur(0px);
}

.ghost_svg {
	width: 100%;
	height: auto;
}
#gradient{
    z-index: 99;
}
.wrapper{
    position: fixed;
    top:60px;
    left:0px;
    z-index: 99;
}
path {
	fill: url(#gradient);
}
.ghostsvg-animation-2{
	position:fixed;
}
</style>
<div class="wrapper"></div>
<div class="ghosthome"></div>
<template>
	<div class="ghost">
		<svg class="ghost_svg" viewBox="0 0 50 50">
			<path d="M46.4,29.6C41.2,15,34.2,2,24.6,1.9C15.1,2,8.1,15,2.9,29.6C-2,44.5,5.4,47.8,24.6,47.7C43.9,47.8,51.3,44.5,46.4,29.6z M19.5,26.3c-1.9,0-3.4-2.4-3.4-5.4s1.5-5.4,3.4-5.4c1.9,0,3.4,2.4,3.4,5.4S21.4,26.3,19.5,26.3z M29.8,26.3c-1.9,0-3.4-2.4-3.4-5.4 s1.5-5.4,3.4-5.4s3.4,2.4,3.4,5.4S31.6,26.3,29.8,26.3z" />
		</svg>
	</div>
</template>

<svg class="ghostsvg-animation-2">
	<linearGradient id="gradient" gradientUnits="userSpaceOnUse" x1="25" y1="2" x2="25" y2="50">
		<stop offset="0" style="stop-color:#000000;stop-opacity:0.5" />
		<stop offset="1" style="stop-color:#000000;stop-opacity:0" />
	</linearGradient>
</svg>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
<script>
    let template = document.querySelector("template");
let wrapper = document.querySelector(".wrapper");
let randomBrio = gsap.utils.random(2, 4, 1, true);

for (let i = 0; i < 30; i++) {
	let fragment = template.content.cloneNode(true);
	let ghost = fragment.querySelector(".ghost");
	wrapper.append(fragment);
	let brio = randomBrio();

	gsap.to(ghost, {
		repeat: -1,
		yoyo: true,
		repeatDelay: 5,
		keyframes: {
			y: [100, ...Array(brio).fill("random(800, 50)")],
			"0%": { opacity: 0, filter: "blur(10px)" },
			"10%": { opacity: "random(0.2, 0.7)", filter: "blur(0px)" }
		},
		x: window.innerWidth,
		duration: 8,
		delay: "random(0, 5)",
		ease: "none",
		scale: "random(0.1, 0.5)",
		rotation: "random(-20, 20)"
	});
}
</script>