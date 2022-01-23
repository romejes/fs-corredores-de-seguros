import 'bootstrap/js/src/tab';

export class DesktopMenu {
  constructor(elementMenu) {
    this.element = $(elementMenu);
    this.linksHasSubmenu = $('li.has-submenu');
    this.init();
  }

  init() {
    this.linksHasSubmenu.on('mouseover', ev => {
      const linkHasSubmenu = $(ev.target);
      linkHasSubmenu
        .parent('li')
        .addClass('open-submenu')
        .find('.submenu')
        .addClass('show');
      $('#cover-main').addClass('show');
    });

    this.linksHasSubmenu.on('mouseleave', ev => {
      const linkWithSubmenu = $('li.open-submenu');
      linkWithSubmenu
        .removeClass('open-submenu')
        .find('.submenu')
        .removeClass('show');
      $('#cover-main').removeClass('show');
    });
  }

  /*isParent(refNode, otherNode) {
    var parent = otherNode.parentNode;
    do {
      if (refNode == parent) {
        return true;
      } else {
        parent = parent.parentNode;
      }
    } while (parent);
    return false;
  }*/
}
