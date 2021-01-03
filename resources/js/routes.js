// Category
import AdminHomeComponent from './components/admin/AdminHome.vue';
import CategoryList from './components/category/List.vue';
import CategoryNew from './components/category/New.vue';
import CategoryEdit from './components/category/Edit.vue';
import PostNew from './components/post/New.vue';

// Post
import PostList from './components/post/List.vue';

const routes = [
    // Category
    { path: '/home', component: AdminHomeComponent },
    { path: '/category-list', component: CategoryList },
    { path: '/add-category', component: CategoryNew },
    { path: '/edit-category/:categoryId', component: CategoryEdit },

    // Post
    { path: '/post-list', component: PostList },
    { path: '/add-post', component: PostNew }
]

export default routes;