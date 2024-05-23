const element = document.getElementById('recall-window-number');
const element1 = document.getElementById('recall-block-phone');
const maskOptions = {
    mask: '+{7}(000)000-00-00'
};
const mask = IMask(element, maskOptions);
const mask1 = IMask(element1, maskOptions);


Fancybox.bind("[data-fancybox]", {
});

let ancors = document.querySelectorAll('.header-nav a')
ancors.forEach(ancor => {
    ancor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});




const mobMenu = document.querySelector('.mob-menu');
const menuBtn = document.querySelector('.menu-btn');

function toggleMenu(mobMenu) {
    if (mobMenu.classList.contains('menu--active')) {
        mobMenu.classList.remove('menu--active');
        mobMenu.style.height = 0;
    } else {
    mobMenu.classList.add('menu--active');
    mobMenu.style.height = document.documentElement.clientHeight + 'px';
    }
}

document.querySelector('.menu-btn').onclick = () => {
    toggleMenu(mobMenu)
}

document.querySelector('.close-menu').onclick = () => {
    toggleMenu(mobMenu)
}

let mobileAncors = document.querySelectorAll('.mob-menu__wrapper ul li a');
mobileAncors.forEach(ancor => {
    ancor.addEventListener('click', function (e) {
        e.preventDefault();
        toggleMenu(mobMenu)
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});


const sendMessage = async (data, listSelector, successSelector) => {
    const url = '/api/telegram';

    try {
        const response = await fetch(url, {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        });
        const json = await response.json();
        if(json['err'] === 'none') {
            listSelector.style.display = 'none';
            successSelector.style.display = 'flex';
        }
    } catch (error) {
        console.error('Ошибка:', error);
    }
}

document.querySelector('.recall-window__btn').onclick = () => {
    let name = document.getElementById('recall-window-person');
    let phone = document.getElementById('recall-window-number');
    let policy = document.getElementById('policy-checkbox')
    let flag = 0;
    let errors = document.querySelectorAll('.err-text');

    errors.forEach(err => {
        err.classList.add('hidden')
    });

    if(!policy.checked) {
        policy.parentNode.parentNode.querySelector('.err-text').classList.remove('hidden')
        flag++
    }

    if(name.value.length < 3) {
        name.parentNode.querySelector('.err-text').classList.remove('hidden')
        flag++
    }

    if(phone.value.length < 16) {
        phone.parentNode.querySelector('.err-text').classList.remove('hidden')
        flag++
    }

    if(flag < 1) {
        let data = {
            name: name.value,
            phone: phone.value
        }

        const listSelector = document.querySelector('.fancy-recall-box-wrapper')
        const successSelector = document.querySelector('.fancy-recall-box-success')
        sendMessage(data, listSelector, successSelector)
    }
}

document.querySelector('.send-recall').onclick = () => {
    let name = document.getElementById('recall-block-name')
    let phone = document.getElementById('recall-block-phone')
    let email = document.getElementById('recall-block-email')
    let message = document.getElementById('recall-block-message')
    let flag = 0;

    let errors = document.querySelectorAll('.err-block');

    errors.forEach(err => {
        err.classList.add('hidden')
    });

    if(name.value.length < 3) {
        name.parentNode.querySelector('.err-block').classList.remove('hidden')
        flag++
    }

    if(phone.value.length < 16) {
        phone.parentNode.querySelector('.err-block').classList.remove('hidden')
        flag++
    }

    let re = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i;
    let validMail = re.test(email.value);

    if(!validMail) {
        email.parentNode.querySelector('.err-block').classList.remove('hidden')
        flag++
    }

    if(message.value.length < 10) {
        message.parentNode.querySelector('.err-block').classList.remove('hidden')
        flag++
    }

    if(flag < 1) {
        let obj = {
            name: name.value,
            phone: phone.value,
            email: email.value,
            message: message.value
        }

        const listSelector = document.querySelector('.recall-block__input-list')
        const successSelector = document.querySelector('.recall-block-success')
        sendMessage(obj, listSelector, successSelector)
    }
}
