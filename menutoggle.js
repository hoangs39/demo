function toggleMenu(){
    var menuToggle = document.querySelector('.toggle');
    var navigation = document.querySelector('.navigation');
    navigation.classList.toggle('active');
    menuToggle.classList.toggle('active');
}