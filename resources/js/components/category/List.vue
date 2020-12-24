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
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Category Name</td>
                                        <td class="d-flex"><button class="btn btn-primary">Edit</button><button class="btn btn-primary ml-2">Delete</button></td>
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
