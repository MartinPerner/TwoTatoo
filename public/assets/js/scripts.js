
document.addEventListener('DOMContentLoaded', function() {
    // Initialise Materialize Carousel
    var carouselElems = document.querySelectorAll('.carousel');
    M.Carousel.init(carouselElems);

    // Initialise Materialize Materialboxed
    var materialboxElems = document.querySelectorAll('.materialboxed');
    M.Materialbox.init(materialboxElems);

    // Alert message for maxLength comment
    let textarea = document.querySelector('textarea[name="comment[content]"]');
    
    textarea.addEventListener('input', function() {
        let maxLength = this.getAttribute('maxlength');
        let currentLength = this.value.length;

        if (currentLength >= maxLength) {
            alert('Vous avez atteint la limite de ' + maxLength + ' caractères');
        }
    });
});


window.onload = function() {
    // Sidenav for mobile
    var elems = document.querySelectorAll('.sidenav');
    var options = {
        edge: 'left', // 'left' pour le faire glisser de la gauche, 'right' pour le faire glisser de la droite
        draggable: true // Permet de glisser pour ouvrir et fermer le sidenav
    };
    var instances = M.Sidenav.init(elems, options);
};


// This code creates a map centered on Paris.
function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: {lat: 48.842926, lng: 2.291302} 
    });
  }

window.gm_authFailure = function() {
alert('Erreur d\'authentification Google Maps.');
};



// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("navbar").style.padding = "10px 10px";
    document.getElementById("logo").style.fontSize = "25px";
  } else {
    document.getElementById("navbar").style.padding = "30px 10px";
    document.getElementById("logo").style.fontSize = "35px";
  }
}