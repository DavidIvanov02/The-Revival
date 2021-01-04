<?php
    include ("admin_header.php");
?>

<div class="container" style="margin-top: 30px;">
    
    <div class="row" align="center">
        <div class="col-md-12">
            <h1>Система за новините</h1>
        </div>
    </div>
    
    <div class="row">
        
        <div class="col-md-3">
            <a href="<?php echo Base_url();?>news/" class="btn btn-primary">Виж новина ---></a><br></br>
        </div>
        
        <div class="col-md-3">
             <a href="<?php echo Base_url();?>admin/add_news.php" class="btn btn-primary">Добави новина ---></a><br></br>
        </div>
        
        <div class="col-md-3">
             <a href="<?php echo Base_url();?>news/" class="btn btn-primary">Редактирай новина ---></a><br></br>
        </div>
        
        <div class="col-md-3">
             <a href="<?php echo Base_url();?>news/" class="btn btn-primary">Премахни новина ---></a><br></br>
        </div>
    </div>
    
</div>

<?php
    include ("../template/js.php");
    include ("../template/footer.php");
?>