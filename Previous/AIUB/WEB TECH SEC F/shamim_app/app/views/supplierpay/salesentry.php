<style>
    body>.container {
        padding: 0px;
        margin-bottom: 10px;
    }
</style>

<?php echo $this->dynform; ?>
<?php if (isset($this->prevmodify) && $this->prevmodify != "") { ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-2" style="text-align: center;"><strong>Previous Modified:</strong></div>
            <div class="col-sm-10"><?php echo $this->prevmodify ?></div>
        </div>
    </div>
<?php } ?>
<div class="panel panel-info">
    <div class="panel-heading">
        <div style="text-align: center;">
            <h4><strong>GRN List</strong></h4>
        </div>
    </div>
    <div class="panel-body">
        <?php echo $this->tablegrn; ?>
    </div>
    <div class="panel-heading">
        <div style="text-align: center;">
            <h4><strong>Payment List</strong></h4>
        </div>
    </div>
    <div class="panel-body">
        <?php echo $this->table; ?>
    </div>
</div>