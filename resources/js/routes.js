import VueRouter from 'vue-router';

import Dashboard from './pages/Dashboard'
import Temperature from "./pages/Temperature"
import Humidity from "./pages/Humidity"
import Ground from "./pages/Ground"
import Reports from "./pages/Reports"
import Configurations from './pages/Configurations'
import Notification from './pages/Notification'
import Profile from './pages/Profile'
import Login from './pages/Login'



const routes = [
    {
        path:'/home',
        name: 'Dashboard',
        component: Dashboard
    },
    {
        path: '/temperatura',
        name: 'Temperature',
        component: Temperature
    },
    {
        path: '/ambiente',
        name: 'Humidity',
        component: Humidity
    },
    {
        path: '/suelo',
        name: 'Ground',
        component: Ground
    },
    {
        path: '/reportes',
        name: 'Reports',
        component: Reports
    },
    {
        path: '/configuraciones',
        name: 'Configurations',
        component: Configurations
    },
    {
        path: '/alertas',
        name: 'Notification',
        component: Notification
    },
    {
        path: '/perfil',
        name: 'Profile',
        component: Profile
    },
    {
        path: '/',
        name: 'Login',
        component: Login
    }
];

export default new VueRouter({
    routes
})