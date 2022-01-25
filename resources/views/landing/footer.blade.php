    
    <section class="footer">
      <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
        <a href="#" class="fab fa-pinterest"></a>
      </div>
  
      <div class="links">
        <a href="#">home</a>
        <a href="#">about</a>
        <a href="#">menu</a>
        <a href="#">products</a>
      </div>
  
      {{-- <div class="credit" style="font-size: 14px">created by <span>mr. web designer</span> | all rights reserved</div> --}}
    </section>
  </body>
  <script src="{{ asset('land/js/script.js') }}"></script>
  <script type="text/javascript">
    function tambah(i) {
      var counter = parseInt(document.getElementById("counter" + i).innerHTML) + 1;
      var qty     = parseInt(document.getElementById("qty" + i).value) + 1;
      document.getElementById("counter" + i).innerHTML = counter;
      document.getElementById("qty" + i).value = qty;
    }

    function kurang(i) {
        var counter = parseInt(document.getElementById("counter" + i).innerHTML);
        var qty     = parseInt(document.getElementById("qty" + i).value);
        
        if (counter > 1) {
            counter -= 1;
            qty     -= 1;
        }
        
        document.getElementById("counter" + i).innerHTML = counter;
        document.getElementById("qty" + i).value = qty;
    }

    function cartin(i) {
      var counter = parseInt(document.getElementById("cartqty" + i).innerHTML) + 1;
      var qty     = parseInt(document.getElementById("qty" + i).value) + 1;
      document.getElementById("cartqty" + i).innerHTML = counter;
    }

    function cartdec(i) {
        var counter = parseInt(document.getElementById("cartqty" + i).innerHTML);
        
        if (counter > 1) {
            counter -= 1;
        }
        
        document.getElementById("cartqty" + i).innerHTML = counter;
        
    }
</script>
</html>