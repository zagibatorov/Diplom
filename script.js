//Переходы к блокам по кнопкам в хедере
let toAbout = document.getElementById('toAbout');
let toChar = document.getElementById('toChar');
let toMedia = document.getElementById('toMedia');
let toNews = document.getElementById('toNews');
let toFooter = document.getElementById('toFooter');

let aboutBlock = document.getElementById('aboutBlock');
let charBlock = document.getElementById('charBlock');
let mediaBlock = document.getElementById('mediaBlock');
let newsBlock = document.getElementById('newsBlock');
let footer = document.getElementById('footer');

toAbout.addEventListener('click', () => {
    aboutBlock.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });
});

toChar.addEventListener('click', () => {
    charBlock.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });
});

toMedia.addEventListener('click', () => {
    mediaBlock.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });
});

toNews.addEventListener('click', () => {
    newsBlock.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });
});

toFooter.addEventListener('click', () => {
    footer.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });
});



// Показ блока с авторизацией/регистрацией по нажатию кнопки
    let authBtn = document.getElementById('auth');
    let authRegBlock = document.querySelector('.authRegBlock');

    if(authBtn){
        authBtn.addEventListener('click', function(){
            authRegBlock.style.display = 'flex';
            authRegBlock.classList.add('authRegBlockActive');
        });
    }



// Показ блока с авторизацией/регистрацией на мобиле
    let authBtnMob = document.getElementById('authMob');

    if(authBtnMob){
        authBtnMob.addEventListener('click', function(){
            authRegBlock.style.display = 'flex';
            authRegBlock.classList.add('authRegBlockActive');
        });
    }



// Закрытие меню-бургера при клике вне его области
    document.addEventListener('click', function(e) {
        let menuBurger = document.querySelector('.menuBurger');
        let headerButtonsMobile = document.querySelector('.headerButtonsMobile');

        if (headerButtonsMobile && headerButtonsMobile.classList.contains('show')) {
            const isClickInsideMenu = headerButtonsMobile.contains(event.target);

            if (!isClickInsideMenu) {
                headerButtonsMobile.classList.remove('show');
            }
        }
    });



// // Показ блока с авторизацией/регистрацией в блоке с предложением скидки
//     let authRegBtn = document.querySelector('.authRegBtn');

//     if(authRegBtn){
//         authRegBtn.addEventListener('click', function(){
//             authRegBlock.classList.add('authRegBlockActive');
//         });
//     }



// Кнопка выхода из профиля
    let logoutBtn = document.getElementById('logout');

    if(logoutBtn){
        logoutBtn.addEventListener('click', function(){
            window.location.href = 'logout.php';
        });
    }

// Открытие профиля по нажатию кнопки
    let profileBtn = document.getElementById('profile');
    let profileBlock = document.querySelector('.profileBlock');

    if(profileBtn){
        profileBtn.addEventListener('click', function(){
            profileBlock.classList.add('activeProfile');
        });
    }


    document.addEventListener('click', function(event) {
        if (profileBlock && profileBlock.classList.contains('activeProfile')) {
            // Проверяем, был ли клик НЕ по кнопке профиля и НЕ внутри блока профиля
            const isClickOnProfileBtn = profileBtn && profileBtn.contains(event.target);
            const isClickInsideProfile = profileBlock.contains(event.target);
        
            // Если клик не по кнопке профиля и не внутри блока профиля - закрываем
            if (!isClickOnProfileBtn && !isClickInsideProfile) {
                profileBlock.classList.remove('activeProfile');
            } 
        }
    });

    let closeProfileBlockBtn = document.querySelector('.closeProfileBlockBtn');

    if(closeProfileBlockBtn){
        closeProfileBlockBtn.addEventListener('click', function(){
            profileBlock.classList.remove('activeProfile');
        });
    }


// Закрытие блока с авторизацией/регистрацией
    let closeAuthRegBtn = document.querySelector('.closeAuthRegBtn');

    closeAuthRegBtn.addEventListener('click', function(){
        if(authRegBlock.classList.contains('authRegBlockActive')){
            authRegBlock.classList.remove('authRegBlockActive');
        }
    });



// Закрытие окна создания новостей
    let closeCreateNewBlockBtn = document.querySelector('.closeCreateNewBlockBtn');

    closeCreateNewBlockBtn.addEventListener('click', () => {
        if(createNewBlock.classList.contains('createNewBlockActive')){
            createNewBlock.classList.remove('createNewBlockActive');
        }
    });



// Показ блока с предложением скидки через 60 секунд для неавторизованных пользователей
    // let requestBlock = document.querySelector('.requestBlock');
    // let closeRequestWindowBtn = document.querySelector('.closeRequestWindowBtn');

    // if(requestBlock){
    //     let timer = setTimeout(function() {
    //         requestBlock.classList.add('requestBlockActive');
    //         showDiscountCode();
    //     }, 1000);

    //     if(closeRequestWindowBtn){
    //         closeRequestWindowBtn.addEventListener('click', function(){
    //             requestBlock.classList.remove('requestBlockActive');
    //             clearTimeout(timer);
    //         });
    //     }
    // }

    

let backToTopBtn = document.querySelector('.backToTopBtn');

function toggleBackToTopBtn(){
    if (window.scrollY > 300) {
        backToTopBtn.classList.add('visible');
    } else {
        backToTopBtn.classList.remove('visible');
    }
}

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

if (backToTopBtn) {
    window.addEventListener('scroll', toggleBackToTopBtn);
    backToTopBtn.addEventListener('click', scrollToTop);

    toggleBackToTopBtn()
}

//Показ блока создания новостей для админа
let createNewBlock = document.querySelector('.createNewBlock');
let openCreateNewBlock = document.querySelector('.openCreateNewBlock');

if(openCreateNewBlock){
    openCreateNewBlock.addEventListener('click', () => {
        createNewBlock.classList.add('createNewBlockActive');
    });
}



//Переходы к блокам по кнопкам в хедере на мобиле

let toAboutMob = document.getElementById('toAboutMob');
let toCharMob = document.getElementById('toCharMob');
let toMediaMob = document.getElementById('toMediaMob');
let toNewsMob = document.getElementById('toNewsMob');
let toFooterMob = document.getElementById('toFooterMob');

toAboutMob.addEventListener('click', () => {
    aboutBlock.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });
});

toCharMob.addEventListener('click', () => {
    charBlock.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });
});

toMediaMob.addEventListener('click', () => {
    mediaBlock.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });
});

toNewsMob.addEventListener('click', () => {
    newsBlock.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });9
});

toFooterMob.addEventListener('click', () => {
    footer.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });
});



//Чубрики

let imgs = document.querySelectorAll('.imgPart img');

console.log(imgs);
imgs.forEach(img => {
    img.addEventListener('mouseenter', () => {
            img.classList.add('jumping');
    });
    img.addEventListener('mouseleave', () => {
            img.classList.remove('jumping');
    })
})



//Слайд карточек

let chars = document.querySelectorAll('.char');
let pages = document.querySelectorAll('.cardNum');
let controls = document.querySelectorAll('.controls');
let imgIndex = 0;

function show(index){
    chars[imgIndex].classList.remove('active');
    pages[imgIndex].classList.remove('pageActive');

    chars[index].classList.add('active');
    pages[index].classList.add('pageActive');

    imgIndex = index;
}

controls.forEach((e) => {
    e.addEventListener('click', () => {
        const isPrev = event.currentTarget.classList.contains('prev');
        const isNext = event.currentTarget.classList.contains('next');
        if(isPrev){
            let index = imgIndex - 1;

            if(index < 0){
                index = chars.length - 1;
            }

            show(index);
        } else if(isNext){
            let index = imgIndex + 1;

            if(index >= chars.length){
                index = 0;
            }
            
            show(index);
        }
    })
})

show(imgIndex);



//Объёмные карточки

chars.forEach(char => {
    char.addEventListener('mousemove', function(e){

        const rect = this.getBoundingClientRect(); //объект координат карточки

        const x = e.clientX - rect.left; //позиция курсора по X
        const y = e.clientY - rect.top; //позиция курсора по Y

        // Проценты от ширины/высоты
        const xPercent = Math.floor((x / rect.width ) * 100);
        const yPercent = Math.floor((y / rect.height ) * 100);

        // Угол наклона на основе позиции курсора
        const tiltX = ((yPercent - 50) / 5); // Наклон по X
        const tiltY = ((50 - xPercent) / 5); // Наклон по X

        this.style.transform = `
            scale(1.1)
            perspective(1000px)
            rotateX(${tiltX}deg)
            rotateY(${tiltY}deg)
        `;
    });
            
    char.addEventListener('mouseleave', function() {
        // Возвращаем карточку в исходное состояние
        this.style.transform = 'scale(1)';
    });

});



//Открытие картинок во весь экран по нажатию в Медиа

let imgsMedia = document.querySelectorAll('.imgMedia');

let imgMediaTopLeft = document.querySelector('.imgMediaFullTL');
let imgMediaTopRight = document.querySelector('.imgMediaFullTR');
let imgMediaBottomLeft = document.querySelector('.imgMediaFullBL');
let imgMediaBottomRight = document.querySelector('.imgMediaFullBR');


imgsMedia[0].addEventListener('click', function(){
    imgMediaTopLeft.classList.remove('imgMediaInactive');
    imgMediaTopLeft.classList.add('imgMediaVisible');
});

imgsMedia[1].addEventListener('click', function(){
    imgMediaTopRight.classList.remove('imgMediaInactive');
    imgMediaTopRight.classList.add('imgMediaVisible');
});

imgsMedia[2].addEventListener('click', function(){
    imgMediaBottomLeft.classList.remove('imgMediaInactive');
    imgMediaBottomLeft.classList.add('imgMediaVisible');
});

imgsMedia[3].addEventListener('click', function(){
    imgMediaBottomRight.classList.remove('imgMediaInactive');
    imgMediaBottomRight.classList.add('imgMediaVisible');
});



//Закрытие картинок

const closeBtnTL = document.querySelector('.closeBtnTL');
const closeBtnTR = document.querySelector('.closeBtnTR');
const closeBtnBL = document.querySelector('.closeBtnBL');
const closeBtnBR = document.querySelector('.closeBtnBR');

closeBtnTL.addEventListener('click', function(){
    imgMediaTopLeft.classList.remove('imgMediaVisible');
    imgMediaTopLeft.classList.add('imgMediaInactive');
});

closeBtnTR.addEventListener('click', function(){
    imgMediaTopRight.classList.remove('imgMediaVisible');
    imgMediaTopRight.classList.add('imgMediaInactive');
});

closeBtnBL.addEventListener('click', function(){
    imgMediaBottomLeft.classList.remove('imgMediaVisible');
    imgMediaBottomLeft.classList.add('imgMediaInactive');
});

closeBtnBR.addEventListener('click', function(){
    imgMediaBottomRight.classList.remove('imgMediaVisible');
    imgMediaBottomRight.classList.add('imgMediaInactive');
});



//Открытие меню-бургера

let burgerMenu = document.querySelector('.menuBurger');
let headerButtonsMobile = document.querySelector('.headerButtonsMobile');

burgerMenu.addEventListener('click', () => {
    if (!headerButtonsMobile.classList.contains('show')) {
        headerButtonsMobile.style.display = 'flex';
        setTimeout(() => {
            headerButtonsMobile.classList.add('show');
        }, 10);
    } else {
        headerButtonsMobile.classList.remove('show');
        setTimeout(() => {
            if (!headerButtonsMobile.classList.contains('show')) {
                headerButtonsMobile.style.display = 'none';
            }
        }, 500);
    }
})



// Функция для проверки видимости элемента
function isElementInViewport(elem) {
    const rect = elem.getBoundingClientRect();
    return (
        rect.top <= (window.innerHeight || document.documentElement.clientHeight) * 0.9 &&
        rect.bottom >= 0
    );
}



// Функция для обработки прокрутки
function handleScroll() {
    let header = document.querySelector('.header');
    let mainScreen = document.querySelector('.mainScreen');
    let about = document.querySelector('.about'); 
    let characters = document.querySelector('.characters');
    let media = document.querySelector('.media');
    let news = document.querySelector('.news');
    let footer = document.querySelector('.footer');

    if(isElementInViewport(header)){
        header.classList.add('visible');
    }

    if (isElementInViewport(mainScreen)) {
        mainScreen.classList.add('visible');
    }

    if (isElementInViewport(about)) {
        about.classList.add('visible');
    }    
    
    if (isElementInViewport(characters)) {
        characters.classList.add('visible');
    }

    if (isElementInViewport(media)) {
        media.classList.add('visible');
    }

    if (isElementInViewport(news)) {
        news.classList.add('visible');
    }

    if (isElementInViewport(footer)) {
        footer.classList.add('visible');
    }
    
}

// Добавляем обработчик события прокрутки
window.addEventListener('scroll', handleScroll);

// Также проверяем при загрузке страницы (на случай если элемент уже в viewport)
window.addEventListener('load', handleScroll);



// Генератор кода для скидки

function generateCode(){
    let code = [];

    for(let i = 0; i < 6; i++){
        code.push(Math.floor(Math.random() * 10));
    }

    return code.join('');
}

console.log(generateCode());

function showDiscountCode(){
    let discountCodeBlock = document.querySelector('.discountCode');
    if(discountCodeBlock){
        let code = generateCode();
        discountCodeBlock.textContent = code;
        discountCodeBlock.style.fontSize = '30px';
        discountCodeBlock.style.fontWeight = 'bold';
        discountCodeBlock.style.fontFamily = 'PressStart2P';
        discountCodeBlock.style.marginTop = '30px';
        discountCodeBlock.style.textAlign = 'center';
    }
}

// let getCodeBtn = document.querySelector('.getCodeBtn');
// let discountBlock = document.querySelector('.discountCode');

// if(getCodeBtn){
//     getCodeBtn.addEventListener('click', () => {
//         code = generateCode();
//         discountBlock.textContent = code;
//     });
// }


// AJAX создание новости
const createForm = document.getElementById('createNewsForm');
if(createForm){
    createForm.addEventListener('submit', function(e){
        e.preventDefault();
        
        const formData = new FormData(this);
        
        fetch('ajax_create.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(news => {
            let imageHtml = '';
            if(news.image_path){
                imageHtml = `<img src="${news.image_path}" alt="News image">`;
            } else {
                imageHtml = '<div class="no-image">Нет изображения</div>';
            }
            
            // Проверяем атрибут у контейнера
            const container = document.querySelector('.newsContainer');
            const isAdmin = container.dataset.isAdmin === 'true';
            
            let deleteBtnHtml = '';
            if (isAdmin) {
                deleteBtnHtml = `<button class="deleteNewBtn" data-id="${news.id}">Удалить</button>`;
            }
            
            const newsHtml = `
                <div class="new" data-id="${news.id}">
                    <div class="newsImage">${imageHtml}</div>
                    <div class="newsHeader"><h1>${news.header}</h1></div>
                    <div class="newsText"><p>${news.content}</p></div>
                    ${deleteBtnHtml}
                </div>
            `;
            
            const noNews = container.querySelector('p');
            if(noNews && noNews.textContent === 'Новостей пока нет'){
                noNews.remove();
            }
            container.insertAdjacentHTML('afterbegin', newsHtml);
            
            document.querySelector('.createNewBlock').classList.remove('createNewBlockActive');
            createForm.reset();
        });
    });
}

// AJAX удаление новости
document.addEventListener('click', function(e){
    if(e.target.classList.contains('deleteNewBtn')){
        const newsId = e.target.dataset.id;
        const newsElement = e.target.closest('.new');
        
        if(confirm('Удалить новость?')){
            fetch('ajax_delete.php?id=' + newsId)
            .then(response => response.json())
            .then(() => {
                newsElement.remove();
                // Если новостей не осталось
                const container = document.querySelector('.newsContainer');
                if(container.children.length === 0){
                    container.innerHTML = '<p style="color: white; width: 100%; text-align: center;">Новостей пока нет</p>';
                }
            });
        }
    }
});
