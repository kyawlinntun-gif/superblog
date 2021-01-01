import AdminHomeComponent from './components/admin/AdminHome.vue';
import CategoryList from './components/category/List.vue';
import CategoryNew from './components/category/New.vue';
import CategoryEdit from './components/category/Edit.vue';

const routes = [
    { path: '/home', component: AdminHomeComponent },
    { path: '/category-list', component: CategoryList },
    { path: '/add-category', component: CategoryNew },
    { path: '/edit-category/:categoryId', component: CategoryEdit }
]

export default routes;