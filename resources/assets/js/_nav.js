export default {
    items: [
        {
            name: 'Search',
            url: '/search',
            icon: 'icon-magnifier'
        },
        {
            name: 'Cases',
            url: '/cases',
            icon: 'icon-layers'
        },
        {
            title: true,
            name: 'Data Source'
        },
        {
            name: 'UN Sanctions List',
            url: '/unscr',
            icon: 'icon-layers',
            children: [
                {
                    name: 'Individual',
                    url: '/unscr/individu',
                    icon: 'icon-people'
                },
                {
                    name: 'Entity',
                    url: '/unscr/entity',
                    icon: 'icon-grid'
                }
            ],
        },
        {
            name: 'Fiu Report',
            url: '/fiureport',
            icon: 'icon-grid'
        },
        {
            name: 'Crimes',
            url: '/crimes',
            icon: 'icon-grid'
        }
    ]
}
