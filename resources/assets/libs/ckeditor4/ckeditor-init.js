function initCKEditor() {
  let ckeditorInline = $('.js-ckeditor-inline:not(.js-ckeditor-inline-enabled)');
  let ckeditorFull = $('.js-ckeditor:not(.js-ckeditor-enabled)');
  CKEDITOR.config.filebrowserBrowseUrl = '/admin/elfinder/ckeditor';
  CKEDITOR.config.extraPlugins = 'codesnippet,contents,colorbutton,colordialog,font,emoji,copyformatting,embedsemantic,find,iframe,justify,showblocks,bidi,div,image2';
  CKEDITOR.config.codeSnippet_theme = 'monokai_sublime';
  CKEDITOR.config.height = 600;
  CKEDITOR.config.language = window.locale;
  CKEDITOR.config.colorButton_enableAutomatic = true;
  CKEDITOR.config.colorButton_historyRowLimit = 1;
  CKEDITOR.config.colorButton_renderContentColors = true;
  CKEDITOR.config.colorButton_enableMore = true;
  CKEDITOR.config.extraAllowedContent = 'img[title,loading]';
  CKEDITOR.config.image2_prefillDimensions = false;

  // Init inline text editor
  if (ckeditorInline.length) {
    ckeditorInline.each((index, element) => {
      let el = $(element);
      el.attr('contenteditable', 'true');

      // Add .js-ckeditor-inline-enabled class to tag it as activated
      el.addClass('js-ckeditor-inline-enabled');
    })

    CKEDITOR.inline('js-ckeditor-inline');
  }

  // Init full text editor
  if (ckeditorFull.length) {
    ckeditorFull.each((index, element) => {
      let el = $(element);

      // Add .js-ckeditor-enabled class to tag it as activated
      el.addClass('js-ckeditor-enabled');
    })

    CKEDITOR.replaceAll(function (textarea, config) {
      if ($(textarea).hasClass('js-ckeditor') && $(textarea).hasClass('js-ckeditor-enabled')) {
        config.codeSnippet_theme = 'monokai_sublime';
        return true;
      }
      return false;
    });
  }

  const LOADING_LAZY = 'lazy';
  const LOADING_EAGER = 'eager';

  /**
   * For image add `loading` attribute with the correct value.
   * Default value is `lazy`.
   *
   * @see: https://ckeditor.com/old/forums/CKEditor-3.x/Modify-Existing-Plugin
   * @see: https://ckeditor.com/docs/ckeditor4/latest/guide/dev_howtos_dialog_windows.html
   * @see: https://github.com/jahilldev/ckeditor-lazy-load/blob/master/lazyload/plugin.js
   */
  // eslint-disable-next-line no-undef
  CKEDITOR.on('dialogDefinition', ev => {
    // Take the dialog window name and its definition from the event data.
    const dialogDefinition = ev.data.definition;

    // Only edit the image dialog.
    if ('image2' !== ev.data.name) {
      return;
    }

    dialogDefinition.addContents({
      label: 'Loading lazy',
      elements: [
        {
          type: 'checkbox',
          label: 'Load the image lazy?',
          default: 'checked',
          setup(self) {
            let element = $(self.element.$);
            let imgElement = element;
            if (element.prop('tagName') === 'FIGURE') {
              imgElement = element.find('img');
            }
            if (imgElement.attr('loading') === LOADING_EAGER) {
              this.getInputElement().$.click();
            }
          },
          onChange() {
            if (null === this.getDialog().getSelectedElement()) {
              return;
            }
            let loadingAttributeValue = LOADING_EAGER;
            if (this.getValue()) {
              loadingAttributeValue = LOADING_LAZY;
            }
            this.getDialog().getSelectedElement().setAttribute('loading', loadingAttributeValue);
          },
          commit(self) {
            let element = $(self.element.$);
            let imgElement = element;
            if (element.prop('tagName') !== 'IMG') {
              imgElement = element.find('img');
            }
            let loadingAttributeValue = LOADING_EAGER;
            if (this.getValue()) {
              loadingAttributeValue = LOADING_LAZY;
            }
            imgElement.attr('loading', loadingAttributeValue);
            imgElement.attr('fetchpriority', 'low')
          },
        },
      ],
    });
  });
}

$(document).ready(function () {
  initCKEditor();
});