<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>
    <div class="app">
        <div class="layout">
            <!-- Header START -->
            <?php include 'config.php'; ?>
            <?php include 'header.php'; ?>
            <?php include 'sidebar.php';
            if(isset($_GET['key'])){
                $key = $_GET['key'];
                $action = 'edit';
                $sql = "SELECT * FROM `extinguisher` e WHERE e.id=$key";
                //echo $sql;
                $conn = $GLOBALS['con'];
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $image = !empty($row['image']) ? $row['image'] : 'assets/images/extinguisher/dummy_ext.jpg';
            }else{
                $action = 'add';
                $key = '';
            }
          
            
            ?>

            <!-- Page Container START -->
            <div class="page-container">

                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">Extinguisher List </h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                                <span class="breadcrumb-item active"><?php echo ucfirst($action); ?> Extinguisher</span>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row m-b-30">
                                <div class="col-lg-12">
                                    <form action="control/extinguishers_process.php?action=<?php echo $action; ?>" method="post" enctype= multipart/form-data >
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <label for="brand">brand</label>
                                                <input name="brand" type="text" class="form-control" id="brand" value="<?php echo isset($_GET['key'])?$row['brand']:''; ?>" required >
                                            </div>
                                            <div class="form-group col-md-7">
                                                <label for="build">color</label>
                                                <input name="color" type="text" class="form-control" id="build" min="1800" max="2500" value="<?php echo isset($_GET['key'])?$row['color']:''; ?>" >
                                                <?php if(isset($_GET['key'])){ ?><input type="hidden" name="key" value="<?php echo $key; ?>" > <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <label for="type">type</label>
                                                <input name="type" type="text" class="form-control" id="type" value="<?php echo isset($_GET['key'])?$row['type']:''; ?>">
                                            </div>
                                            <div class="form-group col-md-7">
                                                <label for="size">size</label>
                                                <input name="size" type="text" class="form-control" id="size" placeholder="size" value="<?php echo isset($_GET['key'])?$row['size']:''; ?>" required >
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <label for="loeschmittel">Loeschmittel</label>
                                                <input name="loeschmittel" type="text" class="form-control" id="loeschmittel" value="<?php echo isset($_GET['key'])?$row['loeschmittel']:''; ?>">
                                            </div>
                                            <div class="form-group col-md-7">
                                                <label for="hersteller">Hersteller</label>
                                                <input name="hersteller" type="text" class="form-control" id="hersteller" placeholder="hersteller" value="<?php echo isset($_GET['key'])?$row['hersteller']:''; ?>" >
                                            </div>
                                        </div>  
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <label for="image">Image</label>
                                                <input name="image" type="file" class="form-control" id="image" >
                                            </div>
                                            <div class="form-group col-md-7">
                                               <?php if(isset($_GET['key'])){  ?><img src="<?php echo $image; ?>" style="height:150px; width: auto;" /> <?php } ?>
                                            </div>
                                        </div>  

                                        <button type="submit" class="btn btn-primary"><?php echo ($action =='add')?'Create':'Update'; ?></button> &nbsp; 
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Wrapper END -->

                <!-- Footer START -->
                <?php include 'footer.php'; ?>
                <!-- Footer END -->
            </div>
            <!-- Page Container END -->
        </div>
    </div>
    <?php include 'foot.php'; ?>
</body>
</html>