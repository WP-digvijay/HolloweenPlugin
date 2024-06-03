<?php
    if(!defined('ABSPATH')){
        exit();
    }
?>
<style>
      /* mouse animation  */
    #ghost1 {
        position: fixed;
        top:50px;
        transition: transform 2s;
        pointer-events: none;
        z-index: 10;
    }
      /* mouse animation end  */
</style>
    <div id="ghost1">
        <img class="ghost2" src="https://tim-school.com/codepen/halloween-ghost/ghost11.gif" width="80" height="80" alt="gostimg"/>
    </div>
<script>
    // mouse animation 
    document.addEventListener('mousemove', function(ev){
        document.getElementById('ghost1').style.transform = 'translateY('+(ev.clientY-0)+'px)';
        document.getElementById('ghost1').style.transform += 'translateX('+(ev.clientX-0)+'px)';
    },false);
    // mouse animation end
</script>