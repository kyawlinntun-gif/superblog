import Axios from "axios";

export default {
    state: {
        categories: [],
    },
    getters: {
        getCategory(state) {
            return state.categories;
        }
    },
    actions: {
        allCategory(content) {
            Axios.get('/category')
                .then(response => {
                    content.commit('categories', response.data.categories);
                })
        }
    },
    mutations: {
        categories(state, data)
        {
            return state.categories = data;
        }
    }
}