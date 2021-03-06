<?php $form =  $this->Form->create('Nmsmonitor', array(
                        //'class' => 'form-horizontal', 
                        //'role' => 'form',
                        'inputDefaults' => array(
                                        'format'    => array('before', 'label', 'between', 'input', 'error', 'after'),
                                            'div'   => array('class' => 'form-group'),
                                            'class' => array('form-control'),
                                            //'label' => array('class' => 'col-lg-2 control-label'),
                                            //'between' => '<div class="col-lg-6">',
                                            //'after' => '</div>',
                                            'error' => array('attributes' => array('wrap' => 'div', 'class' => 'alert alert-warning')),
)));

$options = array(
        'active' => 'active',
        'suspended' => 'suspended',
        'terminated' => 'terminated',
);

$status = $this->Form->input('devicestatus', array(
                                    'type' => 'select',
                                    'options' => $options,
                                    'label'=> 'Device Status',
                                    'default' => 'active',
                                    'class' => 'form-control'));
 ?>

<div id="pantblhlp1" class="panel panel-info">
    <div class="panel-heading">
        <h4><span class="glyphicon glyphicon-floppy-disk"></span> Create New Device</h4>
    </div>

    <?= $form;?>
    <div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
                <div class="form-group">
                    <label>Title</label>
                     <?= $this->Form->input('device', array('label'=> FALSE, 'class' => 'form-control')); ?>
                </div>

                 <div class="form-group">
                    <label>Description</label>
                     <?= $this->Form->input('devicedescr', array('type' => 'textarea', 'label'=> FALSE, 'class' => 'form-control')); ?>
                </div>
                 <div class="form-group">
                    <label>Ip Address</label>
                     <?= $this->Form->input('deviceip', array( 'label'=> FALSE, 'class' => 'form-control')); ?>
                </div>

                 <div class="form-group">
                    <?= $status;?>
                </div>

        </div> <!-- row -->
    </div> <!-- heading -->
</div> <!-- panel -->

<div class="panel-footer">
    <a class="btn btn-default" href="/Nmsmonitors/index"><span class="glyphicon glyphicon-hand-left"></span> Back</a>
    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span> Save</button>
</div>
<?= $this->Form->end(); ?>
</div>

