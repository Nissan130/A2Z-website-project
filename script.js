// toggle menu icon 

let menuIcon = document.querySelector('#menu');
let navBar = document.querySelector('.navbar');
let searchBox = document.querySelector('#searchBox');

menuIcon.onclick = () => {
    menuIcon.classList.toggle('bx-x');
    searchBox.classList.toggle('active_search_box');
    navBar.classList.toggle('active');
};


// click event on logo image 
document.querySelector('.logo_image').addEventListener('click', function(){
       window.location.href = "index.php";
});


// viewing other images in product details 
document.addEventListener("DOMContentLoaded", function() {
    const otherImages = document.querySelectorAll('.other_img');
    const mainImage = document.querySelector('.img_main');

    otherImages.forEach(image => {
        image.addEventListener('mouseover', function() {
            const newSrc = this.src;
            mainImage.src = newSrc;
        });
    });
});


// //hide the search box when menu item is clicked
// document.addEventListener('DOMContentLoaded', function() {
//     document.getElementById('menu').addEventListener('click', function() {
//         var searchBox = document.getElementById('searchBox');
//         searchBox.classList.toggle('hidden');

//         console.log(searchBox.classList);
//     });
// });



// script for category and brand select options 
        
        document.querySelectorAll('.select-btn').forEach(button => {
            button.addEventListener('click', () => {
                button.parentElement.classList.toggle('active');
            });
        });

        document.querySelectorAll('.search input').forEach(input => {
            input.addEventListener('input', (e) => {
                const searchTerm = e.target.value.toLowerCase();
                const options = e.target.closest('.content').querySelectorAll('.options li');
                options.forEach(option => {
                    const text = option.textContent.toLowerCase();
                    option.style.display = text.includes(searchTerm) ? '' : 'none';
                });
            });
        });

        document.querySelectorAll('.options li').forEach(option => {
            option.addEventListener('click', () => {
                const wrapper = option.closest('.wrapper');
                const link = option.querySelector('a');
                if (link) {
                    window.location.href = link.href;
                }
                wrapper.querySelector('.select-btn span').textContent = option.textContent;
                wrapper.classList.remove('active');
            });
        });


//updating the cart item quantity
document.querySelectorAll('.quantity').forEach(function(input) {
    input.addEventListener('input', function() {
        const price = parseFloat(this.dataset.price);
        const quantity = parseInt(this.value);
        const totalPriceElement = this.closest('tr').querySelector('.total_price');
        const newTotalPrice = price * quantity;

        totalPriceElement.textContent = newTotalPrice;

        // totalPriceElement.textContent = newTotalPrice.toFixed(2);

        updateSubtotal();
    });
});

function updateSubtotal() {
    let subtotal = 0;
    document.querySelectorAll('.total_price').forEach(function(element) {
        subtotal += parseFloat(element.textContent);
    });

    document.querySelector('.subtotal').textContent = subtotal;

    // document.querySelector('.subtotal').textContent = subtotal.toFixed(2);
}