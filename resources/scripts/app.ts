// import global from './global.js';
import { Menu } from "./lib/menu";
// import { Map } from './lib/map';
import { Slider } from './lib/slider';
import AOS from 'aos';


export class AppComponent {
    constructor() {
        const menu = new Menu("primary_menu");
        menu.bindMobileBtn("open_mobile");

        new Slider( '#slider_home' , {
            items: 1,
            slideBy: 'page',
            autoplay: true,
            controls: false
        });

        AOS.init({ once: true });

        const tnsCarousel = document.querySelectorAll('#slide-logos');
        tnsCarousel.forEach(slider => {
            new Slider('#slide-logos', {
                container: slider,
                items: 6,
                nav: true,
                autoplay: true,
                swipeAngle: false,
                controls: false,
                animateIn: 'tns-fadeIn',
            });
        });
    }
}

window.addEventListener("DOMContentLoaded", function() {
    new AppComponent();
});
