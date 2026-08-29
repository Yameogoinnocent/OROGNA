import './bootstrap';
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

document.addEventListener('DOMContentLoaded',()=>{
 document.documentElement.classList.add('js-reveal');
 const els=document.querySelectorAll('.reveal');
 if('IntersectionObserver' in window){const io=new IntersectionObserver(entries=>entries.forEach(e=>{if(e.isIntersecting){e.target.classList.add('is-visible');io.unobserve(e.target)}}),{threshold:.08});els.forEach(e=>io.observe(e));}else els.forEach(e=>e.classList.add('is-visible'));
 const header=document.querySelector('[data-header]');
 if(header){const f=()=>header.classList.toggle('shadow-lg',window.scrollY>20);f();window.addEventListener('scroll',f,{passive:true});}
});
