<template>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="card-title mb-0">Post List</h3> <router-link to="/add-post" class="btn btn-primary ml-auto">Add Post</router-link>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SI</th>
                                        <th>User</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Photo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(post, index) in getAllPosts" :key="index">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ post.user ? post.user.name : null }}</td>
                                        <td>{{ post.category ? post.category.name : null }}</td>
                                        <td>{{ post.title | sortLength(20, "---") }}</td>
                                        <td>{{ post.description | sortLength(40, "...") }}</td>
                                        <td><img :src="ourImage(post.photo)" alt="" width="40" height="50"></td>
                                        <td class="d-flex"><router-link :to="`/edit-post/${post.id}`" class="btn btn-sm btn-primary">Edit</router-link><button class="btn btn-sm btn-primary ml-2" @click.prevent="deletePost(post.id)">Delete</button></td>
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
        this.$store.dispatch('allPost');
    },
    computed: {
        getAllPosts() {
            return this.$store.getters.getPost;
        }
    },
    methods: {
        ourImage(image)
        {
            return 'uploadimage/' + image;
        },
        deletePost(postId)
        {
            axios.delete('/post/'+ postId)
                .then(response => {
                    
                    // allCategory
                    this.$store.dispatch('allPost');

                    // Toast
                    Toast.fire({
                        icon: 'success',
                        title: 'Post deleted successfully'
                    });

                })
                .catch(errors => {
                    console.log(errors);
                })
        }
    }
}
</script>
