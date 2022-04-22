    <section class="footer">
      <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
        <a href="#" class="fab fa-pinterest"></a>
      </div>

      {{-- <div class="credit" style="font-size: 14px">created by <span>mr. web designer</span> | all rights reserved</div> --}}
    </section>
  </body>
  <script src="{{ asset('land/js/script.js') }}"></script>
  <script type="text/javascript">
    function tambahmkn(i) {
      var counter = parseInt(document.getElementById("countermkn" + i).innerHTML) + 1;
      var qty     = parseInt(document.getElementById("qtymkn" + i).value) + 1;
      document.getElementById("countermkn" + i).innerHTML = counter;
      document.getElementById("qtymkn" + i).value = qty;
    }

    function kurangmkn(i) {
        var counter = parseInt(document.getElementById("countermkn" + i).innerHTML);
        var qty     = parseInt(document.getElementById("qtymkn" + i).value);

        if (counter > 1) {
            counter -= 1;
            qty     -= 1;
        }

        document.getElementById("countermkn" + i).innerHTML = counter;
        document.getElementById("qtymkn" + i).value = qty;
    }

    function tambahmnm(i) {
      var counter = parseInt(document.getElementById("countermnm" + i).innerHTML) + 1;
      var qty     = parseInt(document.getElementById("qtymnm" + i).value) + 1;
      document.getElementById("countermnm" + i).innerHTML = counter;
      document.getElementById("qtymnm" + i).value = qty;
    }

    function kurangmnm(i) {
        var counter = parseInt(document.getElementById("countermnm" + i).innerHTML);
        var qty     = parseInt(document.getElementById("qtymnm" + i).value);

        if (counter > 1) {
            counter -= 1;
            qty     -= 1;
        }

        document.getElementById("countermnm" + i).innerHTML = counter;
        document.getElementById("qtymnm" + i).value = qty;
    }

</script>
</html>
