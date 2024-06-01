<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Manage</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="alerts">
            <div class="alert alert-success">Success Message</div>
            <div class="alert alert-danger">Error Message</div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <h1>Computer Manage</h1>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Computers (<span id="total"></span>)</h4>
                    <button class="btn btn-primary" id="create">Create</button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Brand</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                   
                </tbody>
            </table>
        </div>
    </div>

    <!-- create computer model -->

    <div class="modal" id="create-computer">
        <div class="modal-body">
            <h3>Create Computer</h3>
            <div class="form-group">
                <label for=""><b>Enter Brand</b></label>
                <input type="text" placeholder="Enter brand" id="brand" class="form-control">
            </div>
            <div class="form-group">
                <label for=""><b>Enter Name</b></label>
                <input type="text" placeholder="Enter name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for=""><b>Enter Price</b></label>
                <input type="text" placeholder="Enter price" id="price" class="form-control">
            </div>
            <div class="form-group buttons">
                <button class="btn btn-success" type="submit" id="save">Save</button>
                <button class="btn btn-danger" type="submit" id="close">Close</button>
            </div>
        </div>
    </div>

    <!-- edit computer model -->

    <div class="modal" id="update-computer">
        <div class="modal-body">
            <h3>Update Computer</h3>
            <div class="form-group">
                <label for=""><b>Enter Brand</b></label>
                <input type="text" placeholder="Enter brand" id="edit_brand" class="form-control">
                <input type="hidden" placeholder="Id" id="id" class="form-control">
            </div>
            <div class="form-group">
                <label for=""><b>Enter Name</b></label>
                <input type="text" placeholder="Enter name" id="edit_name" class="form-control">
            </div>
            <div class="form-group">
                <label for=""><b>Enter Price</b></label>
                <input type="text" placeholder="Enter price" id="edit_price" class="form-control">
            </div>
            <div class="form-group buttons">
                <button class="btn btn-success" type="submit" id="update">Update</button>
                <button class="btn btn-danger" type="submit" id="update_close">Close</button>
            </div>
        </div>
    </div>

    <script src="js/app.js"></script>
</body>

</html>
