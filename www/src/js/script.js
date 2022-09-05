const profileBtn = document.getElementById('profileBtn');
const menu = document.getElementById('menu');

console.log(profileBtn);
console.log(menu);

profileBtn.addEventListener('click', (e) => {
    if (menu.classList.contains('hidden')) {
        menu.classList.remove('hidden');
    }
    else {
        menu.classList.add('hidden');
    }
});