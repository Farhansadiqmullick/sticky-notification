;(function($){
$(document).ready(function(){
    let closeBtn = document.querySelector('.close_bar');
    closeBtn.addEventListener('click', function(e){
        let closeParent = e.currentTarget.parentElement;
        closeParent.style.setProperty('display', 'none');
    });

    /* ****** new with fixt tiem ****** */
    const offerEnd = document.querySelector('#offer_limit');
        if (offerEnd) {
          const offerTime = document
            .querySelector('#offer_limit')
            .getAttribute('data-limit');
          // formage days/hours/minutes/seconds
          const newInterval = 3 * 24 * 60 * 60 * 1000;
          let countDownTime = new Date(offerTime).getTime();
          setInterval(() => {
            let now = new Date().getTime();
            let time = countDownTime - now;
            if (time <= 0) {
              countDownTime = countDownTime + newInterval;
            }
          }, 1);
          console.log(offerTime);
          setInterval(() => {
            let now = new Date().getTime();
            let time = countDownTime - now;
            let days = Math.floor(time / (1000 * 60 * 60 * 24));
            let hours = Math.floor((time % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((time % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((time % (1000 * 60)) / 1000);
            const FormatMe = (n) => (n < 10 ? '0' + n : n);
            if (document.getElementById('offer_limit')) {
              document.getElementById('offer_limit').innerHTML = `
              <ul>
                  <li><p class='time'>${FormatMe(
                    days
                  )}  <span>:</span></p> <span>Days</span></li>
                  <li><p class='time'>${FormatMe(
                    hours
                  )}  <span>:</span></p> <span>Hours</span></li>
                  <li><p class='time'>${FormatMe(
                    minutes
                  )}  <span>:</span></p> <span>Minutes</span></li>
                  <li><p class='time n-dot'>${FormatMe(
                    seconds
                  )}</p> <span>Seconds</span></li>
              </ul>
              `;
            }
          }, 1000);
        }

});


})(jQuery);