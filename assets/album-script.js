// Указываем папку, где лежат все фотографии
const folder = (window.SCHOOL_ASSETS || "") + "/album/";

const albumsData = {
    summer2021: {
        title: "Наше спортивное лето, 2021",
        photos: [
            "075.jpg", "093.jpg", "097.jpg", "099.jpg", "105.jpg", "144.jpg", 
            "1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg", "6.jpg",
            "76WYQEh4a1Q8.jpg", "boUcwV2vp3E4.jpg", "guGSRsl9nsw6.jpg", "H5TRQk1KfP83.jpg",
            "tk_ksahsgL47.jpg", "u6mfDVSW8fs8.jpg", "viber_image.jpg", "WyxB1RUP0ws7.jpg",
            "xrPnBjytaog9.jpg", "xUz5WzefchU2.jpg", "ZSGWbFFshqg10.jpg", "zyjEiKcTPEs7.jpg"
        ]
    },
    motherday: {
        title: "Первенство Могилевской городской СДЮШОР №4 по кроссу",
        photos: [
            "IMG_2587.jpg", "P1020717.jpg", "P1020718.jpg", "P1020720.jpg", "P1020722.jpg", 
            "P1020723.jpg", "P1020725.jpg", "P1020726.jpg", "P1020727.jpg", "P1020728.jpg",
            "DSC_0148.jpg", "DSC_0151.jpg", "DSC_6175.jpg", "DSC_6186.jpg", "DSC_6208.jpg", 
            "DSC_6278.jpg", "IMG_a0ea5999ad.jpg", "IMG_a08ac2a76c.jpg"
        ]
    },
    republic2019: {
        title: "Первенство Республики Беларусь по лыжероллерам и кроссу (2019)",
        photos: [
            "___1.jpg", "___2.jpg", "___3.jpg", "___4.jpg", "___5.jpg", "___6.jpg", 
            "___7.jpg", "___8.jpg", "___10.jpg", "___11.jpg", "___12.jpg", "___14.jpg", "___15.jpg",
            "IMG_0444be8f3d.jpg", "IMG_2cb50407b7.jpg", "IMG_3c744e8653.jpg", "IMG_78e4e6d705.jpg"
        ]
    },
    winterstart: {
        title: "Начало зимнего сезона по горнолыжному спорту",
        photos: [
            "1 (1).jpg", "1 (2).jpg", "1 (3).jpg", "2 (1).jpg", "2 (2).jpg", "2 (3).jpg", "2 (4).jpg",
            "3 (1).jpg", "3 (2).jpg", "3 (3).jpg", "3 (4).jpg", "4 (1).jpg", "4 (2).jpg", "4 (3).jpg", "4 (4).jpg",
            "5 (1).jpg", "5 (2).jpg", "5 (3).jpg", "5 (4).jpg", "5.jpg",
            "6 (1).jpg", "6 (2).jpg", "6 (3).jpg", "6.jpg",
            "7 (1).jpg", "7 (2).jpg", "7 (3).jpg", "7.jpg",
            "8 (1).jpg", "8 (2).jpg", "8 (3).jpg", "8.jpg",
            "9 (1).jpg", "9 (2).jpg", "9.jpg", "10 (1).jpg", "10 (2).jpg", "10.jpg",
            "11 (1).jpg", "11.jpg", "12 (1).jpg", "12.jpg", "13 (1).jpg", "13.jpg", "14.jpg",
            "3VUbLeCV_je10.jpg", "5VKV298EB_Q3.jpg", "7jCMEmz_YwE5.jpg"
        ]
    },
    skatingint: {
        title: "Международные соревнования по конькобежному спорту",
        photos: [
            "IMG_2dc182dfe0.jpg", "IMG_4cc4dcd086.jpg", "IMG_940c9274d7.jpg", "IMG_2635.jpg",
            "IMG_2625.jpg", 
            "IMG_4420_JWC_E_rfUrt_3.000m_Men_Yury_Lavsky.JPG",
            "IMG_4497_JWC_E_rfUrt_3.000m_Men_Aleks_Luk_and_Yury_Lavsky.JPG",
            "IMG_4453_JWC_E_rfUrt_3.000m_Men_Maksim_Dubovsky.JPG",
            "IMG_8109badf32de.jpg", "IMG_88631fb42ad8.jpg", "IMG_b36dc50e93.jpg", 
            "IMG_b49b7b80e579.jpg", "IMG_be943f9edc.jpg", "IMG_decc55a3fd.jpg", "IMG_f2aa22aa38.jpg"
        ]
    },
    xmas: {
        title: "Конькобежный спорт. Рождественские эстафеты",
        photos: [
            "P1020717.jpg", "P1020726.jpg", "P1020727.jpg", "P1020728.jpg",
            "DSC_0148.jpg", "DSC_0151.jpg", "DSC_6175.jpg", "DSC_6186.jpg"
        ]
    },
    silichi: {
        title: "Горнолыжный спорт. Тренировка в РГЦ 'Силичи'",
        photos: [
            "IMG_8637.jpg", "IMG_8904.jpg", "IMG_9759.jpg", "IMG_9760.jpg",
            "IMG_3c744e8653.jpg", "IMG_78e4e6d705.jpg"
        ]
    },
    balticcup: {
        title: "Международные соревнования 'Baltic Cup'",
        photos: [
            "IMG_8637.jpg", "IMG_8904.jpg", "IMG_9759.jpg", "IMG_9760.jpg",
            "3VUbLeCV_je10.jpg", "5VKV298EB_Q3.jpg", "7jCMEmz_YwE5.jpg"
        ]
    },
    summer2015: {
        title: "Лето - 2015 (Лагерь)",
        photos: [
            "76WYQEh4a1Q8.jpg", "boUcwV2vp3E4.jpg", "guGSRsl9nsw6.jpg", "H5TRQk1KfP83.jpg",
            "he4lduMwmR08.jpg", "IMG_0444be8f3d.jpg", "IMG_2cb50407b7.jpg", "IMG_3c744e8653.jpg",
            "3VUbLeCV_je10.jpg", "5VKV298EB_Q3.jpg", "7jCMEmz_YwE5.jpg",
            "tk_ksahsgL47.jpg", "u6mfDVSW8fs8.jpg", "viber_image.jpg",
            "WyxB1RUP0ws7.jpg", "xrPnBjytaog9.jpg", "xUz5WzefchU2.jpg",
            "ZSGWbFFshqg10.jpg", "zyjEiKcTPEs7.jpg"
        ]
    }
};

// Получаем ID альбома из адресной строки
const urlParams = new URLSearchParams(window.location.search);
const albumId = urlParams.get('id');
const albumData = albumsData[albumId];

// Рендерим галерею, если данные найдены
if (albumData) {
    document.getElementById('album-title').textContent = albumData.title;
    const container = document.getElementById('gallery-container');
    container.innerHTML = ''; 

    albumData.photos.forEach(photo => {
        const a = document.createElement('a');
        const fullPath = folder + photo;
        a.href = encodeURI(fullPath);
        a.className = 'gallery-item';
        
        const img = document.createElement('img');
        img.src = encodeURI(fullPath);
        img.alt = 'Фото';
        
        // Обработка ошибки: скрываем родительский блок целиком
        img.onerror = function() {
            this.parentElement.style.display = 'none';
        };

        a.appendChild(img);
        container.appendChild(a);
    });

    // Перезапускаем Lightbox
    if (typeof initLightbox === 'function') {
        initLightbox();
    }
} else {
    document.getElementById('album-title').textContent = "Альбом не найден";
}