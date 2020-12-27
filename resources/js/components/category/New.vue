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
                            <h3 class="card-title">Add New Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="addCategory">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="new-category">New Category</label>
                                    <input type="text" class="form-control" id="new-category"
                                        placeholder="Type New Category" v-model="form.cat_name" name="cat_name" :class="{ 'is-invalid': form.errors.has('cat_name') }">
                                    <has-error :form="form" field="cat_name"></has-error>
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
                cat_name: ''
            })
        }
    },
    methods: {
        addCategory() {
            // Submit the form via a POST request
            this.form.post('/category/add')
                .then(response => {
                    console.log(response);
                })
                .catch(errors => {
                    console.log(errors);
                });
        }
    }
}
</script>
