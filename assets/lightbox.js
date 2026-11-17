function initLightbox() {
    // Создаем окно лайтбокса, если его еще нет
    if (!document.querySelector('.lightbox-overlay')) {
        const overlay = document.createElement('div');
        overlay.className = 'lightbox-overlay';
        overlay.innerHTML = `<span class="lightbox-close">&times;</span><img class="lightbox-image" src="">`;
        document.body.appendChild(overlay);

        // Закрытие по клику
        overlay.addEventListener('click', (e) => {
            if (e.target !== overlay.querySelector('.lightbox-image')) {
                overlay.classList.remove('active');
            }
        });
    }

    const overlay = document.querySelector('.lightbox-overlay');
    const imgContainer = overlay.querySelector('.lightbox-image');

    // Вешаем событие на все картинки в галерее
    document.querySelectorAll('.gallery-item').forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault();
            const imgSrc = item.getAttribute('href');
            imgContainer.src = imgSrc;
            overlay.classList.add('active');
        });
    });
}