export class Menu {
    private id: string;

    constructor(id: string) {
        this.id = id;
    }

    /**
     * Bind the btn open and close the menu
     */
    public bindMobileBtn(id: string): Menu {
        const btn = document.getElementById(id);
        const body = document.querySelector("body");

        if (btn != null) {
            btn.addEventListener("click", (e: Event) => {
                btn.classList.toggle("open");
                document.getElementById(this.id).classList.toggle("open");
                body.classList.toggle("no-scroll");
            });
        }

        return this;
    }

    /**
     * Bind open sub menu
     */
    public bindSubMenu(): Menu {
        const itemsHasChildren = document.querySelectorAll(
            ".menu-item-has-children"
        );

        if (window.screen.width <= 992) {
            for (let i = 0; i < itemsHasChildren.length; i++) {
                const itemHasChildren = itemsHasChildren[i] as HTMLElement;
                let submenu = itemHasChildren.querySelector("ul");

                itemHasChildren
                    .querySelector("a")
                    .addEventListener("click", (e: Event) => {
                        e.preventDefault();
                        submenu.classList.toggle("opened");
                    });
            }
        }

        return this;
    }
}
