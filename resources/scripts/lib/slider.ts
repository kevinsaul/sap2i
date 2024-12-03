import { tns } from "tiny-slider/src/tiny-slider";

export class Slider {
    private container: string;
    private options: Object;

    constructor(container: string, options?: Object) {
        this.container = container;
        this.options = {
            container: this.container,
            mode: "gallery",
            items: 1,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayButtonOutput: false,
            mouseDrag: true,
            nav: true,
            navPosition: "bottom",
            controls: true,
            speed: 800
        };

        if (options != undefined && options != null) {
            this.options = { ...this.options, ...options };
        }

        this.load();
    }

    /**
     * Load slider by options
     */
    load(): Slider {
        const slider = document.querySelectorAll(this.container);
        if (slider.length == 0) {
            return this;
        }

        tns(this.options);

        return this;
    }
}
