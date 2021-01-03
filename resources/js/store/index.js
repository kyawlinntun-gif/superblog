import Axios from "axios";

export default {
    state: {
        categories: [],
        posts: []
    },
    getters: {
        getCategory(state) {
            return state.categories;
        },
        getPost(state) {
            return state.posts;
        }
    },
    actions: {
        allCategory(content) {
            Axios.get('/category')
                .then(response => {
                    content.commit('categories', response.data.categories);
                })
        },
        allPost(content) {
            Axios.get('/post')
                .then(response => {
                    // return response;
                    content.commit('posts', response.data.posts);
                })
        }
    },
    mutations: {
        categories(state, data)
        {
            return state.categories = data;
        },
        posts(state, payload)
        {
            return state.posts = payload;
        }
    }
}