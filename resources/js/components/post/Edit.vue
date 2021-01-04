<template>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Post</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="addPost">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Add New Post</label>
                                    <input type="text" class="form-control" id="title" placeholder="Type New Post"
                                        v-model="form.title" name="title"
                                        :class="{ 'is-invalid': form.errors.has('title') }">
                                    <has-error :form="form" field="title"></has-error>
                                </div>
                                <div class="form-group">
                                    <label for="description">Add New Description</label>
                                    <markdown-editor height="auto" v-model="form.description"></markdown-editor>
                                    <span v-if="form.errors.has('description')" class="text-danger">{{ form.errors.get('description') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select id="category" class="form-control form-select form-select-lg mb-3"
                                        aria-label=".form-select-lg example" v-model="form.cat_id" name="cat_id">
                                        <option selected disabled value="">Select One</option>
                                        <option v-for="(category, index) in getAllCategories" :key="index"
                                            :value="category.id">{{ category.name }}</option>
                                    </select>
                                    <span v-if="form.errors.has('cat_id')" class="text-danger">{{ form.errors.get('cat_id') }}</span>
                                </div>
                                <div class="form-group">
                                    <input type="file" id="photo" name="photo"
                                        :class="{ 'is-invalid': form.errors.has('photo') }"
                                        @change="changePhoto($event)">
                                    <img v-if="form.photo" :src="uploadImage()" alt="" width="80" height="80">
                                    <has-error :form="form" field="photo"></has-error>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</template>

<script>
    export default {
        name: 'Edit',
        data() {
            return {
                form: new Form({
                    title: '',
                    description: '',
                    cat_id: '',
                    photo: ''
                })
            }
        },
        mounted() {

            this.$store.dispatch('allCategory');

            // console.log(this.$route.params.postId);
            axios.get('/post/' + this.$route.params.postId)
                .then(response => {
                    // console.log(response);
                    this.form.fill(response.data.post);
                })
                .catch(errors => {
                    console.log(errors);
                });

            // console.log(this.form.photo.length);
        },
        computed: {
            getAllCategories() {
                return this.$store.getters.getCategory;
            }
        },
        methods: {
            changePhoto(event) {
                var file = event.target.files[0];
                // console.log(file.size, file.type);
                // console.log(file);

                if (file.size > 1048576) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Image Size',
                            text: 'Image Size Wrong!',
                        })
                }
                else if(!(file.type === 'image/jpeg' || file.type === 'image/png'))
                {
                    Swal.fire({
                            icon: 'error',
                            title: 'Image Type',
                            text: 'Image Type Wrong!',
                        })
                }
                else
                {
                    var reader = new FileReader();
                    reader.onload = event => {
                        // The file's text will be printed here
                        this.form.photo = event.target.result;
                        // console.log(this.form.photo);
                    };

                    reader.readAsDataURL(file);
                }
            },
            addPost() {
                this.form.post('/post')
                        .then(response => {
                            // console.log(response);

                            this.$router.push('/post-list');

                            // Toast
                            Toast.fire({
                                icon: 'success',
                                title: 'Post added successfully'
                            });

                        })
                        .catch(errors => {
                            console.log(errors);
                        });
            },
            uploadImage() {
                let img = this.form.photo;
                // console.log(img.length);
                if(img.length > 100)
                {
                    return this.form.photo;
                }

                return '/uploadimage/' + this.form.photo;
            }
        }
    }

</script>
