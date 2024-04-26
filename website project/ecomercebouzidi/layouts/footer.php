

<footer class="mt-5 py-5">
           <div class="row container mx-auto pt-5">
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <img src="" alt="">
                <p class="pd-2">we provide the best products for the modt affotdable proces</p>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pd-2">Featured</h5>
                <ul class="text-uppercase">
                    <li><a href="">men</a></li>
                    <li><a href="">women</a></li>
                    <li><a href="">boys</a></li>
                    <li><a href="">grils</a></li>
                    <li><a href="">new arrivals</a></li>
                    <li><a href="">clothes</a></li>
                
                </ul>
                
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pd-2">sitings:</h5>
                <ul class="text-uppercase">
                    <li><a href="">Dake mode:</a><div class="toggle-switch" style="position: relative;top: 20px;left:20px;">
                <input type="checkbox" id="toggle"  class="toggle-input">
                <label for="toggle" class="toggle-label"></label>
                 </div></li>
                    
                   <div style="position: relative;top: 70px;"><i class="fab fa-facebook" style="padding-right: 10px;font-size: 30px;"></i>  <i class="fab fa-instagram" style="padding-right: 10px;font-size: 30px;"></i>  <i class="fab fa-youtube" style="padding-right: 10px;font-size: 30px;"></i>  <i class="fab fa-twitter" style="padding-right: 10px;font-size: 30px;"></i></div>
                
                </ul>
                
               
                
            </div>
           </div>
      </footer>
      <script>
    const bar = document.getElementById('bar');
    const close = document.getElementById('close');

    const nav = document.getElementById('navbar');

    if (bar) {
        bar.addEventListener('click', () => {
            nav.classList.add('active')
        })
    }
    if (close) {
        close.addEventListener('click', () => {
            nav.classList.remove('active')
        })
    }

</script>  
<script>
 const darkModeToggle = document.getElementById('toggle');
const body = document.body;
const darkModeKey = 'darkMode';

// تحقق من وجود حالة الوضع المحفوظة في localStorage
if (localStorage.getItem(darkModeKey) === 'true') {
  body.classList.add('dark-mode');
}

// تعديل وضع الظلام عند النقر على زر التبديل
darkModeToggle.addEventListener('click', function() {
  body.classList.toggle('dark-mode');
  
  // تحديث حالة الوضع المحفوظة في localStorage
  if (body.classList.contains('dark-mode')) {
    localStorage.setItem(darkModeKey, 'true');
  } else {
    localStorage.setItem(darkModeKey, 'false');
  }
});
 </script>