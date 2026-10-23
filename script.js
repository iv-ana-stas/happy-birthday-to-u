document.addEventListener('DOMContentLoaded', () => {
    const wishButton = document.getElementById('wish-btn');
    const wishContainer = document.getElementById('wish-container');
    const checkButton = document.getElementById('check-btn');
    const checkResult = document.getElementById('check-result');
    const checkboxes = document.querySelectorAll('.daddy-check');

    const replayAnimation = element => {
        element.style.animation = 'none';
        void element.offsetHeight;
        element.style.animation = 'fadeIn 0.8s ease-in-out';
    };

    if (wishButton && wishContainer) {
        wishButton.addEventListener('click', async () => {
            const originalText = wishButton.textContent;
            wishButton.disabled = true;
            wishButton.textContent = 'Загрузка...';

            try {
                const response = await fetch(window.location.href, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'get_wish=1'
                });

                if (!response.ok) {
                    throw new Error('Не удалось получить пожелание');
                }

                wishContainer.textContent = await response.text();
                wishContainer.hidden = false;
                replayAnimation(wishContainer);
            } catch {
                wishContainer.textContent = 'Не удалось загрузить пожелание. Попробуй ещё раз.';
                wishContainer.hidden = false;
                replayAnimation(wishContainer);
            } finally {
                wishButton.disabled = false;
                wishButton.textContent = originalText;
            }
        });
    }

    if (checkButton && checkResult) {
        checkButton.addEventListener('click', () => {
            const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);

            checkResult.textContent = allChecked
                ? 'Данные приняты! Подтверждаю: ты официально лучший дядя. Жди торт!'
                : 'Не все пункты подтверждены. Попробуй ещё раз ;)';
            checkResult.style.color = allChecked ? '#fbefaa' : '#f7a4a4';
            checkResult.hidden = false;
            replayAnimation(checkResult);
        });
    }
    console.log("%cПривет!", "font-size: 20px; font-weight: bold; color: #fbefaa;");
    console.log("%cИсходный код этого безобразия лежит здесь: https://github.com/iv-ana-stas/happy-birthday-to-u", "font-size: 	14px; color: #fdfeef;");
});
