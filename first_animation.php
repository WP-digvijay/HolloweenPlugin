<?php
if(!defined('ABSPATH')){
	exit();
}
?>
<style>

.spider {
	position: fixed;
	top: 0;
	animation: animateSpider 15s ease-in-out infinite;
	right:50%;
	z-index: 9;
}
@keyframes animateSpider{
	0%,100%
	{
		transform: translateY(-500px);
	}
	50% 
	{
		transform: translateY(0px);
	}
}
.pumpkin01 {
	position: fixed;
	top: 100px;
	right: 200px;
	animation: animatePumpkin 8s ease-in-out infinite;
	z-index: 9;
}
.pumpkin02 {
	position: fixed;
	bottom: 20px;
	left: 50px;
	scale: 0.5;
	animation: animatePumpkin 4s ease-in-out infinite;
	z-index: 9;
}

@keyframes animatePumpkin {
	0%,100% 
	{
		transform: translateY(-50px);
	}
	50% 
	{
		transform: translateY(50px);
	}
}
.spiderWeb {
	position: absolute;
	width: 100%;
	height: 100%;
	object-fit: cover;
	mix-blend-mode: screen;
}
 
    </style>
			<img src="https://i.imgur.com/EtCPE3S.png" class="spider">
			<img src="https://i.imgur.com/VlAEovB.png" class="pumpkin01">
			<img src="https://i.imgur.com/z1sM4My.png" class="pumpkin02">
