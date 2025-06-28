

export function setupBurgerMenu (burgerIcon, burgerMenu, close) {
    close.addEventListener('click', () => {
        burgerMenu.classList.remove('active');
        burgerMenu.classList.add('hidden');

        document.querySelectorAll('.active-btn').forEach(e => {
            e.disabled = false;
        });
    });

    burgerIcon.addEventListener('click', () => {
        burgerMenu.classList.add('active');
        burgerMenu.classList.remove('hidden');

        document.querySelectorAll('.active-btn').forEach(e => {
            e.disabled = true;
        });

    });
}