document.addEventListener('DOMContentLoaded', () =>
{
    HamburgerMenu.Initialize();
    ResponsiveMenu.Initialize();
    Filters.Initialize();
});

const HamburgerMenu = {
    Initialize()
    {
        const menu = document.querySelector('#main-header-hamburger');

        if (!(menu instanceof Element))
        {
            return;
        }

        menu.addEventListener('click', () =>
        {
            const responsiveMenu = document.querySelector('#main-header .responsive-menu');

            if (!(responsiveMenu instanceof Element))
            {
                return;
            }

            responsiveMenu.classList.toggle('responsive-menu--open');
        });
    }
};

const ResponsiveMenu = {
    Initialize()
    {
        const menus = document.querySelectorAll('.responsive-menu');

        for (const menu of menus)
        {
            menu.addEventListener('click', this.callbacks.onClick);
        }
    },

    callbacks: {
        onClick(e)
        {
            if (e.target === this)
            {
                this.classList.remove('responsive-menu--open');
            }
        }
    }
};

const Filters = {
    Initialize()
    {
        const filters = document.querySelectorAll('.filter');

        for (filter of filters)
        {
            filter.addEventListener('click', this.callbacks.onClick);
        }
    },

    callbacks: {
        onClick(e)
        {
            if (e.target.classList.contains('filter__title'))
            {
                e.target.classList.toggle('filter__title--active')
            }
        }
    }
};
