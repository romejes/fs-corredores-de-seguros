import 'bootstrap/js/src/collapse';

export class MobileMenu {
  constructor(elementMenu) {
    this.element = $(elementMenu);
    this.linksHasSubmenu = this.element.find('.has-submenu a');
    this.init();
  }

  init() {
    this.linksHasSubmenu.on('click', ev => {
      const submenu = $(ev.target).next('.submenu');
      $(submenu).collapse();
    });
  }

  toggle() {
    if (this.element.hasClass('show')) {
      this.close();
    } else {
      this.open();
    }
  }

  open() {
    this.element.addClass('show');
  }

  close() {
    this.element.removeClass('show');
  }
}
