// Enable hidden nav bar
const navi = document.querySelector(".navi");
let lastScrollY = window.scrollY;

window.addEventListener("scroll", () => {
    if (lastScrollY < window.scrollY) 
    {
        navi.classList.add("navi--hidden");
       
    } 
    else
    {
       
        navi.classList.remove("navi--hidden");
    }

    lastScrollY = window.scrollY;
});

const nav = document.querySelector('.navi');

 window.addEventListener('scroll', () => {
    if (window.scrollY >= 50) 
    {
        nav.classList.add('active_nav');
    }
    else
    {
        nav.classList.remove('active_nav');
    }
})
// JavaScript to add active class to shopName when nav is active
document.addEventListener('DOMContentLoaded', function () {
    const navi = document.querySelector(".navi");
    const shopName = document.querySelector('.shopName');

    window.addEventListener('scroll', () => {
        if (navi.classList.contains('active_nav')) {
            shopName.classList.add('active_shop');
        } else {
            shopName.classList.remove('active_shop');
        }
    });
});

// Track mouse position relative to navTitle elements
const navTitles = document.querySelectorAll('.navTitle');

navTitles.forEach(navTitle => {
    navTitle.addEventListener('mouseover', () => {
        navTitle.querySelector('.submenu').style.opacity = 1;
        navTitle.querySelector('.submenu').style.visibility = 'visible';
    });

    navTitle.addEventListener('mouseout', () => {
        navTitle.querySelector('.submenu').style.opacity = 0;
        navTitle.querySelector('.submenu').style.visibility = 'hidden';
    });
   
});

// Change image src on submenu item hover
// const submenuItems = document.querySelectorAll('.submenu li');

// submenuItems.forEach(item => {
//     item.addEventListener('mouseenter', () => {
//         const submenuImg = item.closest('.submenu').querySelector('.submenu-img');
//         // Change src attribute based on submenu item text
//         switch (item.textContent.trim()) {
//             case 'Necklaces':
//                 submenuImg.src = 'image/1.png';
//                 break;
//             case 'Earings':
//                 submenuImg.src = 'image/2.png';
//                 break;
//             case 'Rings':
//                 submenuImg.src = 'image/3.png';
//                 break;
//             // Add cases for other submenu items if needed
//             default:
//                 // Default image or do nothing
//                 break;
//         }
//     });

//     item.addEventListener('mouseleave', () => {
//         // Reset image src when mouse leaves submenu item
//         item.closest('.submenu').querySelector('.submenu-img').src = '';
//     });
// });



// const videos = document.querySelectorAll('.background-video');
// let currentVideoIndex = 0;

// function playVideo(index) {
//     videos.forEach((video, i) => {
//         if (i === index) {
//             video.style.opacity = 1;
//             video.play();
//         } else {
//             video.style.opacity = 0;
//             video.pause();
//         }
//     });
//     // adjustButtonScale(index);
// }

// function showVideo(index) {
//     currentVideoIndex = index;
//     playVideo(currentVideoIndex);
// }
// function nextVideo() {
//     currentVideoIndex++;
//     if (currentVideoIndex >= videos.length) {
//         currentVideoIndex = 0;
//     }
//     playVideo(currentVideoIndex);
//      adjustButtonScale(currentVideoIndex);
// }

// function prevVideo() {
//     currentVideoIndex--;
//     if (currentVideoIndex < 0) {
//         currentVideoIndex = videos.length - 1;
//     }
//     playVideo(currentVideoIndex);
//     adjustButtonScale(currentVideoIndex);
// }

// document.getElementById('nextBtn').addEventListener('click', nextVideo);
// document.getElementById('prevBtn').addEventListener('click', prevVideo);

// document.getElementById('btn1').addEventListener('click', function() {
//     showVideo(0); // Index of video1
   
// });

// document.getElementById('btn2').addEventListener('click', function() {
//     showVideo(1); // Index of video2
    
// });

// playVideo(currentVideoIndex);

// const btn1 = document.getElementById('btn1');
// const btn2 = document.getElementById('btn2');

// btn1.addEventListener('click', function() {
//     btn1.style.transform = 'scale(1)';
//     btn2.style.transform = 'scale(0.4)';
// });

// btn2.addEventListener('click', function() {
//     btn2.style.transform = 'scale(1)';
//     btn1.style.transform = 'scale(0.4)';
// });
// function adjustButtonScale(index) {
//     if (index === 0) {
//         btn1.style.transform = 'scale(1)';
//         btn2.style.transform = 'scale(0.4)';
//     } else {
//         btn1.style.transform = 'scale(0.4)';
//         btn2.style.transform = 'scale(1)';
//     }
// }
// adjustButtonScale(currentVideoIndex);

const images = document.querySelectorAll('.background-video');
let currentImageIndex = 0;

function showImage(index) {
    currentImageIndex = index;
    playImage(currentImageIndex);
    adjustButtonScale(index); // Adjust button scale after showing the image
}

function playImage(index) {
    images.forEach((image, i) => {
        if (i === index) {
            image.style.opacity = 1;
        } else {
            image.style.opacity = 0;
        }
    });
}

function nextImage() {
    currentImageIndex++;
    if (currentImageIndex >= images.length) {
        currentImageIndex = 0;
    }
    playImage(currentImageIndex);
    adjustButtonScale(currentImageIndex); // Adjust button scale after changing image
}

function prevImage() {
    currentImageIndex--;
    if (currentImageIndex < 0) {
        currentImageIndex = images.length - 1;
    }
    playImage(currentImageIndex);
    adjustButtonScale(currentImageIndex); // Adjust button scale after changing image
}

document.getElementById('nextBtn').addEventListener('click', nextImage);
document.getElementById('prevBtn').addEventListener('click', prevImage);

document.getElementById('btn1').addEventListener('click', function() {
    showImage(0); // Index of image1
});

document.getElementById('btn2').addEventListener('click', function() {
    showImage(1); // Index of image2
});

playImage(currentImageIndex);

const btn1 = document.getElementById('btn1');
const btn2 = document.getElementById('btn2');

function adjustButtonScale(index) {
    if (index === 0) {
        btn1.style.transform = 'scale(1)';
        btn2.style.transform = 'scale(0.4)';
    } else {
        btn1.style.transform = 'scale(0.4)';
        btn2.style.transform = 'scale(1)';
    }
}

adjustButtonScale(currentImageIndex); // Adjust button scale initially


// document.addEventListener('DOMContentLoaded', function () {
//     const burgerMenu = document.querySelector('.burger-menu');
//     const navigation = document.querySelector('.navigation');

//     burgerMenu.addEventListener('click', function () {
//         navigation.classList.toggle('show');
//     });
// });

// document.querySelector('.close-menu').addEventListener('click', function() {
//    document.querySelector('.navigation').classList.remove('show');
// });




/*=============== SHOW MENU ===============*/
//  const showMenu = (toggleId, navId) =>{
//      const toggle = document.getElementById(toggleId),
//            nav = document.getElementById(navId)

//      toggle.addEventListener('click', () =>{
//          // Add show-menu class to nav menu
//         nav.classList.toggle('show-menu')
//          // Add show-icon to show and hide menu icon
//          toggle.classList.toggle('show-icon')
//    })
//   }
 
document.addEventListener("DOMContentLoaded", function () {
    var toggleMenuButton = document.querySelector(".nav__toggle-menu");
    var toggleCloseButton = document.querySelector(".nav__toggle-close");
    var navigation = document.querySelector(".navigation");
  
    toggleMenuButton.addEventListener("click", function () {
      navigation.classList.add("show");
      toggleMenuButton.style.display = "none";
      toggleCloseButton.style.display = "block";
    });
  
    toggleCloseButton.addEventListener("click", function () {
      navigation.classList.remove("show");
      toggleMenuButton.style.display = "block";
      toggleCloseButton.style.display = "none";
    });
  });
  



 




 

