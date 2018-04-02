<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="hitokoto" class="center"><span id="from">Godme</span>：<span id="content">Everyone is their own God.</span></div>
<script>
fetch('https://sslapi.hitokoto.cn/?encode=json').then(response=>response.text()).then(text=>{
    document.getElementById('from').innerText = JSON.parse(`${text}`).from;
    document.getElementById('content').innerText = JSON.parse(`${text}`).hitokoto;
})
</script>
<a  href="#" id="back-to-top"><span>Top</span></a>
<footer id="footer" role="contentinfo">
    &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a> -
    <?php _e('Using <a href="http://www.typecho.org">Typecho</a> &'); ?>
    <?php _e('Theme by <a href="http://www.runtua.cn">Godme</a>'); ?>
    <p>除非特别注明，本站内容采用<?php _e('<a href="https://creativecommons.org/licenses/by-nc-sa/4.0/">知识共享署名-非商业性使用-相同方式共享 4.0 国际许可协议</a>'); ?>进行许可。</p>
</footer><!-- end #footer -->

<?php $this->footer(); ?>
</div>
</div>
<canvas></canvas>
<script>
   var c=document.getElementsByTagName("canvas")[0],x=c.getContext("2d"),pr=window.devicePixelRatio||1,w=window.innerWidth,h=window.innerHeight,f=90,q,m=Math,r=0,u=m.PI*2,v=m.cos,z=m.random;c.width=w*pr;c.height=h*pr;x.scale(pr,pr);x.globalAlpha=0.6;function i(){x.clearRect(0,0,w,h);q=[{x:0,y:h*0.7+f},{x:0,y:h*0.7-f}];while(q[1].x<w+f){d(q[0],q[1])}}function d(i,j){x.beginPath();x.moveTo(i.x,i.y);x.lineTo(j.x,j.y);var k=j.x+(z()*2-0.25)*f,n=y(j.y);x.lineTo(k,n);x.closePath();r-=u/-50;x.fillStyle="#"+(v(r)*127+128<<16|v(r+u/3)*127+128<<8|v(r+u/3*2)*127+128).toString(16);x.fill();q[0]=q[1];q[1]={x:k,y:n}}function y(p){var t=p+(z()*2-1.1)*f;return(t>h||t<0)?y(p):t}document.onclick=i;document.ontouchstart=i;i();     
    document.addEventListener('scroll',function(){
        if(document.documentElement.scrollTop > (1.5 * document.documentElement.clientHeight)){
            document.getElementById('back-to-top').style.display = 'block';
        }else if(document.body.scrollTop > (1.5 * document.getElementsByClassName('scroll')[0].clientHeight)){//万恶的IE
            document.getElementById('back-to-top').style.display = 'block';
        }else{
            document.getElementById('back-to-top').style.display = 'none';
        }
    })
    </script>
    <script src="<?php $this->options->themeUrl('prism/prism.js');?>"></script>
</body>
</html>
