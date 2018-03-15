import Vue from 'vue'
import Router from 'vue-router'

// Containers
import Full from '../containers/Full'

import Search from '../views/Search.vue'
import Cases from '../views/kasus/KasusIndex.vue'
import UnscrIndividu from '../views/unscr/IndividualIndex.vue'
import FiuReport from '../views/Fiurep.vue'

Vue.use(Router)

export default new Router({
    mode: 'hash', // Demo is living in GitHub.io, so required!
    linkActiveClass: 'open active',
    scrollBehavior: () => ({ y: 0 }),
    routes: [
        {
            path: '/',
            redirect: '/search',
            name: 'Home',
            component: Full,
            children: [
                {
                    path: 'search',
                    name: 'Search',
                    component: Search
                },
                {
                    path: 'cases',
                    name: 'Cases',
                    component: Cases
                },
                {
                    path: 'unscr',
                    redirect: '/unscr/individu',
                    name: 'Unscr',
                    component: {
                        render (c) { return c('router-view') }
                    },
                    children: [
                        {
                            path: 'individu',
                            name: 'UnscrIndividu',
                            component: UnscrIndividu
                        },
                        {
                            path: 'entity',
                            name: 'UnscrEntity',
                            component: UnscrIndividu
                        }
                    ]
                },
                {
                    path: 'fiureport',
                    name: 'FiuReport',
                    component: FiuReport
                }
            ]
        }
    ]
})
