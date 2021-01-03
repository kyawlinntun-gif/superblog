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
                            <h3 class="card-title">Add New Post</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form">
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
                                    <has-error :form="form" field="description"></has-error>
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select id="category" class="form-control form-select form-select-lg mb-3"
                                        aria-label=".form-select-lg example" v-model="form.cat_id">
                                        <option selected disabled value="">Select One</option>
                                        <option v-for="(category, index) in getAllCategories" :key="index"
                                            :value="category.id">{{ category.name }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="file" id="photo" name="photo"
                                        :class="{ 'is-invalid': form.errors.has('photo') }"
                                        @change="changePhoto($event)">
                                    <img v-if="form.photo" :src="form.photo" alt="" width="80" height="80">
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
        name: 'New',
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
            this.$store.dispatch('allCategory')
        },
        computed: {
            getAllCategories() {
                return this.$store.getters.getCategory;
            }
        },
        methods: {
            changePhoto(event) {
                var file = event.target.files[0];
                var reader = new FileReader();
                reader.onload = event => {
                    // The file's text will be printed here
                    this.form.photo = event.target.result;
                };

                reader.readAsDataURL(file);
            }
        }
    }

</script>
