$.fn.customCheck = function(settings) {
    var config = {'default': 0, 'from': 'data'};
    if (settings){$.extend(config, settings);}

    function getValue(element){         
        if(config.from == 'data'){
          var value = element.data('value');
        } else if (config.from == 'title'){
          var value = element.attr('title');
        }

        return value;
    }

   return this.each(function(){
        var ul = $(this); 
        var links = ul.find('a'); 
        var hidden = ul.next(); 

        ul.find('li').each(function(){
          var li = $(this);
          var link = li.find('a');

          link.html(getValue(link));
        });

        links.click(function(){
          links.removeClass('active');
          $(this).addClass('active');
          hidden.attr('value', getValue($(this)));
        });

        default_link = links.eq(config.default);
        value_link = getValue(default_link);
        hidden.attr('value', value_link);
       
   });
};