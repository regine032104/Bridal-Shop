(function(){
  function ready(fn){ if(document.readyState!=='loading'){ fn(); } else { document.addEventListener('DOMContentLoaded', fn); } }
  ready(function(){
    document.addEventListener('submit', function(e){
      var form = e.target;
      if (form && form.classList && form.classList.contains('direct-order-form')){
        var ok = window.confirm('Place this order now?');
        if (!ok) e.preventDefault();
      }
    });
    document.addEventListener('click', function(e){
      var link = e.target.closest('.needs-address');
      if (link){
        var ok = window.confirm('You need to add your address before ordering. Go to profile now?');
        if (!ok) e.preventDefault();
      }
    });
  });
})();
