if (!RedactorPlugins) var RedactorPlugins = {};

RedactorPlugins.inlinestyles = function()
{
  return {
    init: function()
    {
      if ('buttonsAdd' in this.opts) {
        var buttonsAdd = this.inlinestyles.prepareButtonsAddConfig(this.opts.buttonsAdd);
        var buttonsAddAfter = 'buttonsAddAfter' in this.opts ? this.opts.buttonsAddAfter : 'italic';

        this.inlinestyles.addButtons(buttonsAdd, buttonsAddAfter);
      }
    },

    addButtons: function(buttonsAdd, buttonsAddAfter)
    {
      $.each(buttonsAdd, $.proxy(function(i, s) {
        var pos = 'addAfter' in s ? s.addAfter : buttonsAddAfter;

        var btn = this.button.addAfter(pos, s.key, Craft.t(s.title));

        if (!('dropdown' in s)) {
          // Add button functionality
          this.button.addCallback(btn, function() {
            this.inlinestyles.applyFormat(s.args, s.clear);
          });
        } else {
          // Add dropdown functionality
          var dropdown = {};

          $.each(s.dropdown, $.proxy(function(o, g) {
            dropdown[g.key] = {
              title: Craft.t(g.title),
              func: function() {
                this.inlinestyles.applyFormat(g.args, g.clear);
              }
            };
          }, this));

          this.button.addDropdown(btn, dropdown);
        }
      }, this));
    },

    applyFormat: function(args, clear)
    {
      if (clear) {
        this.inline.removeFormat();
      }

      if (typeof args !== 'undefined') {
        var type = (this.utils.isBlockTag(args[0])) ? 'block' : 'inline';

        switch(args.length) {
          case 1: this[type].format(args[0]); break;
          case 2: this[type].format(args[0], args[1]); break;
          case 3: this[type].format(args[0], args[1], args[2]); break;
          case 4: this[type].format(args[0], args[1], args[2], args[3]); break;
          default: throw new Error('Illegal argument count');
        }
      }
    },

    prepareButtonsAddConfig: function(buttonsAdd)
    {
      buttonsAdd = this.inlinestyles.restructureObject(buttonsAdd);

      return buttonsAdd.reverse();
    },

    restructureObject: function(obj)
    {
      // Did they use the right syntax?
      if (!typeof obj === 'object' && obj !== null) {
        return [];
      }

      // Add a "key" property to every element, use the element's index or create
      // one from the "title" property
      var arr = [];
      var keys = Object.keys(obj);

      for (var i = 0; i < keys.length; i++) {
        var el = obj[keys[i]];

        if (typeof el === 'object' && el !== null) {
          // Is this an array like object (numeric keys)?
          if (keys[i] == i) {
            el['key'] = this.inlinestyles.createKeyFromString(el.title);
          } else {
            el['key'] = keys[i];
          }

          // Is this a dropdown configuration?
          if ('dropdown' in el) {
            el['dropdown'] = this.inlinestyles.restructureObject(el.dropdown);
          }

          arr.push(el);
        }
      }

      return arr;
    },

    createKeyFromString: function(str)
    {
      return str.replace(/[^a-zA-Z]/g, '').toLowerCase();
    },
  };
};
