document.addEventListener('DOMContentLoaded', () => {
    const marioContainer = document.querySelector('.mario-container');
    const mario = document.querySelector('.mario');
    const footer = document.querySelector('footer');

    let position = 0;
    let speed = window.innerWidth < 640 ? 1 : 2; // Меньшая скорость на мобильных
    let direction = 'right';

    function moveMario() {
        const footerWidth = footer.offsetWidth;
        const marioWidth = marioContainer.offsetWidth;
        const maxPosition = footerWidth - marioWidth;

        // Обновляем позицию
        if (direction === 'right') {
            position += speed;
            mario.classList.remove('left');
            mario.classList.add('right');
        } else {
            position -= speed;
            mario.classList.remove('right');
            mario.classList.add('left');
        }

        // Проверка границ
        if (position >= maxPosition) {
            direction = 'left';
        } else if (position <= 0) {
            direction = 'right';
        }

        // Применяем позицию
        marioContainer.style.left = `${position}px`;
    }

    // Запускаем анимацию, только когда футер виден
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting) {
            mario.style.animationPlayState = 'running';
            marioContainer.__animationFrame = requestAnimationFrame(function animate() {
                moveMario();
                marioContainer.__animationFrame = requestAnimationFrame(animate);
            });
        } else {
            mario.style.animationPlayState = 'paused';
            cancelAnimationFrame(marioContainer.__animationFrame);
        }
    }, { threshold: 0.1 });

    observer.observe(footer);
});
