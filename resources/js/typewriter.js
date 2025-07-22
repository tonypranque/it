import Typewriter from 'typewriter-effect/dist/core';

export function initTypewriter(appName) {
    const header = document.getElementById('welcome-header');
    if (!header) return;

    // Создаем отдельный элемент для неизменяемого текста
    const staticText = document.createElement('span');
    staticText.textContent = 'Хакермены ';
    staticText.style.display = 'inline'; // Чтобы текст был в одной строке

    // Очищаем header и добавляем staticText
    header.innerHTML = '';
    header.appendChild(staticText);

    // Создаем span для изменяемого текста
    const dynamicText = document.createElement('span');
    header.appendChild(dynamicText);

    const typewriter = new Typewriter(dynamicText, {
        strings: [
            'наведут порядок в вашей компьютерной сети',
            'помогут с Bitrix, 1С:Предприятие и другими системами',
            'настроят и оптимизируют вашу IT-инфраструктуру',
            'сделают резервное копирование и восстановление данных',
        ],
        autoStart: true,
        loop: true,
        delay: 25,
        deleteSpeed: 0.1,
        pauseFor: 2000,
    });

    typewriter.start();
}
