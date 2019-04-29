import VueRouter from 'vue-router';

import Dashboard from './pages/Dashboard'
import Temperature from "./pages/Temperature"
import Humidity from "./pages/Humidity"
import Reports from "./pages/Reports"
import Configurations from './pages/Configurations'
import Notification from './pages/Notification'
import Profile from './pages/Profile'



const routes = [
    {
        path:'/',
        name: 'Dashboard',
        component: Dashboard
    },
    {
        path: '/temperatura',
        name: 'Temperature',
        component: Temperature
    },
    {
        path: '/humedad',
        name: 'Humidity',
        component: Humidity
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
    }
];

export default new VueRouter({
    routes
})