
/*=========scroll Y =======*/

function scrollHeader(){
    const menu = document.getElementById('header');
    let header_2 = document.querySelector('.header-2');
    let header_1 = document.querySelector('.header_top');

    if(this.scrollY > 20){
        header_2.style.top = '0';
        header_1.style.display = 'none'
    } else {
        header_2.style.top = '58px';
         header_1.style.display = 'flex'
    }
}

window.addEventListener('scroll',scrollHeader);



/*=========show scroll=======*/

function scrollTop() {
  const scrollTop = document.getElementById('scroll-top');

  if(this.scrollY > 200){
    scrollTop.style.visibility = 'visible'
    scrollTop.style.bottom = '10%'
} else {
  scrollTop.style.visibility = 'hidden'
  scrollTop.style.bottom = '0rem'
}
}

window.addEventListener('scroll',scrollTop)

/*=========menu bars=======*/

let menyu = document.querySelector('.menu');
let menuBtn = document.querySelector('#menu-btn');

menuBtn.onclick = () => {
    menuBtn.classList.toggle('fa-times');
    menyu.classList.toggle('active');
}

const card = document.querySelector('.img_all')
const cardItem = document.querySelector('.all');
const halfHeight = cardItem.offsetHeight/2;

card.addEventListener('mousemove',startRotate);
card.addEventListener('mouseout',stopRotate);

function startRotate(e) {
    cardItem.style.transform = 'rotateX(' + -(e.offsetY - halfHeight)/20 + 'deg) rotateY(' + (e.offsetX - halfHeight)/20 + 'deg)';   
}

function stopRotate(e) {
    cardItem.style.transform = 'rotate(0)';
}
console.log("Salom")
/*=========scrollReveal=======*/

// const sr = ScrollReveal ({
//   origin: 'top',
//   distance: '30px',
//   duration: 2000,
//   reset:true
// })

// sr.reveal('.image-bloks img, .text h1',{
//   interval: 200
// })

/*=========register js=============*/
function switchForm(className, e) {
	e.preventDefault();
	const allForm = document.querySelectorAll('form');
	const form = document.querySelector(`form.${className}`);

	allForm.forEach(item=> {
		item.classList.remove('active');
	})
	form.classList.add('active');
}


const registerPassword = document.querySelector('form.register #password');
const registerConfirmPassword = document.querySelector('form.register #confirm-pass');

registerPassword.addEventListener('input', function () {
	registerConfirmPassword.pattern = `${this.value}`;
})



/* Video Explanatio - https://youtu.be/-0VuZEYIYuI */
document.querySelectorAll('.custom-select').forEach(setupSelector);

function setupSelector(selector) {
  selector.addEventListener('change', e => {
    console.log('changed', e.target.value)
  })

  selector.addEventListener('mousedown', e => {
    if(window.innerWidth >= 420) {// override look for non mobile
      e.preventDefault();

      const select = selector.children[0];
      const dropDown = document.createElement('ul');
      dropDown.className = "selector-options";

      [...select.children].forEach(option => {
        const dropDownOption = document.createElement('li');
        dropDownOption.textContent = option.textContent;

        dropDownOption.addEventListener('mousedown', (e) => {
          e.stopPropagation();
          select.value = option.value;
          selector.value = option.value;
          select.dispatchEvent(new Event('change'));
          selector.dispatchEvent(new Event('change'));
          dropDown.remove();
        });

        dropDown.appendChild(dropDownOption);   
      });

      selector.appendChild(dropDown);

      // handle click out
      document.addEventListener('click', (e) => {
        if(!selector.contains(e.target)) {
          dropDown.remove();
        }
      });
    }
  });
}



/*
Reference: http://jsfiddle.net/BB3JK/47/
*/

$('select').each(function(){
  var $this = $(this), numberOfOptions = $(this).children('option').length;

  $this.addClass('select-hidden'); 
  $this.wrap('<div class="select"></div>');
  $this.after('<div class="select-styled"></div>');

  var $styledSelect = $this.next('div.select-styled');
  $styledSelect.text($this.children('option').eq(0).text());

  var $list = $('<ul />', {
      'class': 'select-options'
  }).insertAfter($styledSelect);

  for (var i = 0; i < numberOfOptions; i++) {
      $('<li />', {
          text: $this.children('option').eq(i).text(),
          rel: $this.children('option').eq(i).val()
      }).appendTo($list);
  }

  var $listItems = $list.children('li');

  $styledSelect.click(function(e) {
      e.stopPropagation();
      $('div.select-styled.active').not(this).each(function(){
          $(this).removeClass('active').next('ul.select-options').hide();
      });
      $(this).toggleClass('active').next('ul.select-options').toggle();
  });

  $listItems.click(function(e) {
      e.stopPropagation();
      $styledSelect.text($(this).text()).removeClass('active');
      $this.val($(this).attr('rel'));
      $list.hide();
      //console.log($this.val());
  });

  $(document).click(function() {
      $styledSelect.removeClass('active');
      $list.hide();
  });

});
console.log('hello')