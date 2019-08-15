var currentCallback;

// override default browser alert
window.alert = function(msg, callback){
  $('.warndata').text('Data: '+msg[0]);
  $('.warnvalue').text('Value: '+msg[1]);
  $('.warndesc').text('Description: '+msg[2]);
  $('.delete-warn').css('animation', 'fadeIn 0.3s linear');
  $('.delete-warn').css('display', 'inline');
  setTimeout(function(){
    $('.delete-warn').css('animation', 'none');
  }, 300);
  currentCallback = callback;
}

$(document).ready(function() {

    $('.confirmBtn').click(function(){
        $('.delete-warn').css('animation', 'fadeOut 0.3s linear');
        setTimeout(function(){
         $('.delete-warn').css('animation', 'none');
            $('.delete-warn').css('display', 'none');
        }, 300);
        currentCallback();
    })

    $('.cancelBtn').click(function(){
        $('.delete-warn').css('animation', 'fadeOut 0.3s linear');
        setTimeout(function(){
         $('.delete-warn').css('animation', 'none');
            $('.delete-warn').css('display', 'none');
        }, 300);
        currentCallback();
    })
    
    $('#deleteBtn').on('click', function(){
        var warndata = $(this).attr('idata')
        var warnvalue = $(this).attr('ival')
        var warndesc = $(this).attr('idesc')
        alert([warndata, warnvalue, warndesc], function(){
          console.log("Callback executed");
        })
    });

    setTimeout(function(){
        alert('', function(){
            console.log("Callback executed");
        });
    }, 500);
});
