<template>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="card-title mb-0">Category List</h3> <router-link to="/add-category" class="btn btn-primary ml-auto">Add Category</router-link>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SI</th>
                                        <th>Category Name</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(category, index) in getAllCategory" :key="category.id">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ category.name }}</td>
                                        <td>{{ category.created_at | timeFormat }}</td>
                                        <td class="d-flex"><router-link :to="`/edit-category/${category.id}`" class="btn btn-sm btn-primary">Edit</router-link><button class="btn btn-sm btn-primary ml-2" @click.prevent="deleteCategory(category.id)">Delete</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</template>

<script>
export default {
    name: 'List',
    mounted() {
        this.$store.dispatch('allCategory')
    },
    computed: {
        getAllCategory() {
            return this.$store.getters.getCategory;
        }
    },
    methods: {
        deleteCategory(id) {
            axios.delete(`/category/${id}`)
                    .then(response => {

                        // allCategory
                        this.$store.dispatch('allCategory');

                        // Toast
                        Toast.fire({
                            icon: 'success',
                            title: 'Category deleted successfully'
                        });

                    })
                    .catch(errors => {
                        console.log(errors);
                    })
        }
    }
}
</script>
