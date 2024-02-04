<header class="shadow-main py-3 lg:px-20 px-6 w-full z-[100] h-auto flex justify-between items-center sticky bg-white">
    <a href="?path=/"><img src="images/logo.svg" alt="logo Waw.travel" class="h-8 w-auto lg:h-12"></a>

    <!-- Laptop Navigation -->
    <nav class="hidden lg:flex items-center font-second">
        <ul class="flex items-center gap-2 lg:gap-8 text-base">
            <li><a href="?path=/" class="nav-link relative duration-800 block
    after:absolute after:content-[''] after:top-full after:h-0.5 after:w-full after:left-0 after:bg-blue after:rounded-full after:origin-right after:scale-x-0 after:transition-transform after:duration-500
    hover:after:origin-left hover:after:scale-x-100">Accueil</a></li>
            <li><a href="?path=/roadtrips" class="nav-link relative duration-800 block
    after:absolute after:content-[''] after:top-full after:h-0.5 after:w-full after:left-0 after:bg-blue after:rounded-full after:origin-right after:scale-x-0 after:transition-transform after:duration-500
    hover:after:origin-left hover:after:scale-x-100">Carnet de voyage</a></li>
            <li><a href="?path=/profil" class="nav-link relative duration-800 block
    after:absolute after:content-[''] after:top-full after:h-0.5 after:w-full after:left-0 after:bg-blue after:rounded-full after:origin-right after:scale-x-0 after:transition-transform after:duration-500
    hover:after:origin-left hover:after:scale-x-100">Mon profil</a></li>
        </ul>
    </nav>

    <!-- icon burger menu -->
    <div id="burgerIcon" class="lg:hidden cursor-pointer flex flex-col items-center">
        <img id="burgerIconImg" src="images/icons/menu.svg" alt="menu icon" class="w-8 text-black">
    </div>

    <!-- Mobile Navigation -->
    <nav id="mobileNav" class="hidden lg:hidden font-second absolute top-14 py-2 text-base left-0 w-full bg-white shadow-second z-50 border-t border-blue">
        <ul class="flex items-center gap-1 flex-col">
            <li><a href="?path=/" class="nav-link nav-link-mobile relative duration-800 block
    after:absolute after:content-[''] after:top-full after:h-0.5 after:w-full after:left-0 after:bg-blue after:rounded-full after:origin-right after:scale-x-0 after:transition-transform after:duration-500
    hover:after:origin-left hover:after:scale-x-100">Accueil</a></li>
            <li><a href="?path=/roadtrips" class="nav-link nav-link-mobile relative duration-800 block
    after:absolute after:content-[''] after:top-full after:h-0.5 after:w-full after:left-0 after:bg-blue after:rounded-full after:origin-right after:scale-x-0 after:transition-transform after:duration-500
    hover:after:origin-left hover:after:scale-x-100">Carnet de voyage</a></li>
            <li><a href="?path=/profil" class="nav-link nav-link-mobile relative duration-800 block
    after:absolute after:content-[''] after:top-full after:h-0.5 after:w-full after:left-0 after:bg-blue after:rounded-full after:origin-right after:scale-x-0 after:transition-transform after:duration-500
    hover:after:origin-left hover:after:scale-x-100">Mon profil</a></li>
        </ul>
    </nav>
</header>

<script>
    var currentPath = window.location.search;

    // style active link
    var activeLink = document.querySelector('.nav-link[href="' + currentPath + '"]');
    var activeLinkMobile = document.querySelector('.nav-link-mobile[href="' + currentPath + '"]');
    if (activeLink) {
        activeLink.classList.replace('after:scale-x-0','after:scale-x-100');
        activeLinkMobile.classList.add('text-blue');
    }
    document.getElementById('burgerIcon').addEventListener('click', function() {
        var mobileNav = document.getElementById('mobileNav');
        mobileNav.classList.toggle('hidden');

        // change icon burger menu
        var burgerIconImg = document.getElementById('burgerIconImg');
        burgerIconImg.src = mobileNav.classList.contains('hidden') ? 'images/icons/menu.svg' : 'images/icons/close.svg';
    });
</script>