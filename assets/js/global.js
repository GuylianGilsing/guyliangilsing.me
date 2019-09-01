document.addEventListener('DOMContentLoaded', function(){
    // Setup the mobile nav.
    MobileNav();
})

let mobileNavDisableScroll = false;
let mobileNavCurScrollPosition = 0;

// Adds the mobile nav functionality.
function MobileNav()
{
    // Add toggle functionality to the mobile icon.
    document.querySelector(".mobile-icon").addEventListener('click', MobileNavToggle);

    // Check the size of the window in order to toggle the mobile nav.
    window.addEventListener('resize', MobileNavCheckResize);

    // Intercepts the window scroll eventhandler and blocks it when the mobile nav is open.
    window.addEventListener('scroll', MobileNavScrolling);
}

// Checks the screen resize.
function MobileNavCheckResize()
{
    if(this.innerWidth > 967)
    {
        document.querySelector("header.mainnav nav > ul").className = "";
    }
}

// Toggles the mobile nav.
function MobileNavToggle()
{
    let nav = document.querySelector("header.mainnav nav > ul");

    if(nav.className.indexOf("mobile-open") == -1)
    {
        // Show the nav.
        nav.className = "mobile-open";
        mobileNavCurScrollPosition = window.scrollY;
        mobileNavDisableScroll = true;
    }
    else
    {
        // Close the nav.
        nav.className = "";
        mobileNavDisableScroll = false;
    }
}

// Intercepts the window scroll eventhandler and blocks it when the mobile nav is open.
function MobileNavScrolling(e)
{
    if(mobileNavDisableScroll)
    {
        e.preventDefault();
        window.scroll(0, mobileNavCurScrollPosition);
    }
}