<?php
$search = '
<form action ="/Nmsmonitors/search" method="GET">
<div class="input-group custom-search-form">
    <input type="text" name="keyword" class="form-control" placeholder="Search...">
    <span class="input-group-btn">
        <button class="btn btn-default" type="button">
            <i class="fa fa-search"></i>
        </button>
    </span>
    </div>
</form>
    ';

echo $search_bar ='
<div class="row">
    <div class="col-md-8"></div>
    <div class="col-md-4">'.$search.'</div>
    </div>'; 

?>
<br />
<form action ="/Nmsmonitors/mass_delete" method="POST">
<?php

$create  = '<span><a class="btn btn-primary" href="/Nmsmonitors/add"><span class="glyphicon glyphicon-plus-sign"></span> Create</a></span>';;
$delete  = '<span><button type="submit" class="btn btn-danger" onclick="if (confirm(&quot;Are you sure to delete these nmsmonitors ?&quot;)) { document.post_57624a6f587b2226536133.submit(); } event.returnValue = false; return false;"><span class="glyphicon glyphicon-trash"></span> Delete</button></span>';;
$paginator = $this->Element('paginator');
$footer ="<table style='width:100%;height:20px'  border='0'><tr><td>{$delete}&nbsp;{$create}</td><td><span class='pull-right'>{$paginator}</span></td></tr></table>";

echo $this->Table->create( 
       array( 
           'bordered' => TRUE, 
           'condensed' => TRUE, 
           'hover' => '#FB1', 
           'responsive' => TRUE, 
           'striped' => TRUE, 
           'cols_width' => array( '20px','20px', '100px', '20px', '10px','60px' ), 
           'panel_class' => 'panel-info', 
           'panel_heading' => '<h4><span class="glyphicon glyphicon-tasks"></span> Nmsmonitor Management Panel</h4>', 
           'panel_body' => '', 
           'panel_footer' => $footer, 
           'style' => '' ) 
       );


#debug($users);
if($nmsmonitors){
Foreach( $nmsmonitors as $nmsmonitor ){

    $checkbox = $this->Form->checkbox('checkList.', 
                                        array( 
                                               'value'  => $nmsmonitor['Nmsmonitor']['id'],
                                               'id'     => 'nmsmonitor'.$nmsmonitor['Nmsmonitor']['id'], 
                                               'error' => false, 
                                               'placeholder' => false,
                                               'div'=>false,
                                               'label'=>false,
                                               'class' => '', 
                                               'data-off-text'=>'No', 
                                               'data-on-text' =>'Yes', 
                                               'hiddenField'=>true) 
                                     );

    $delete = $this->Form->postLink(
                    'Delete',
                    array('controller' => 'Nmsmonitors', 'action' => 'delete', $nmsmonitor['Nmsmonitor']['id']),
                    array(  
                            'confirm' => 'Are you sure you wish to delete this nmsmonitor ?',
                            'class'   => 'btn btn-outline btn-danger'
                        )
                );


    $data[] = array( 
            "<center>{$checkbox}</center>",
            $nmsmonitor['Nmsmonitor']['id'],  
            $nmsmonitor['Nmsmonitor']['device'],  
            $nmsmonitor['Nmsmonitor']['deviceip'],  
            $nmsmonitor['Nmsmonitor']['devicestatus'],  
            $nmsmonitor['User']['username'],  
            "<center><a class='btn btn-outline btn-success' href='/Nmsmonitors/view/{$nmsmonitor['Nmsmonitor']['id']}'><span class='glyphicon glyphicon-search'></span></a> <a class='btn btn-outline btn-primary' href='/Nmsmonitors/edit/{$nmsmonitor['Nmsmonitor']['id']}'><span class='glyphicon glyphicon-edit'></span></a> <a class='btn btn-outline btn-danger' href='/Nmsmonitors/delete/{$nmsmonitor['Nmsmonitor']['id']}'><span class='glyphicon glyphicon-trash'></span></a></center>"
            #"<center><a class='btn btn-outline btn-primary' href='/Nmsmonitors/edit/{$nmsmonitor['Nmsmonitor']['id']}'>Edit</a> <a class='btn btn-outline btn-primary' href='/Nmsmonitors/delete/{$nmsmonitor['Nmsmonitor']['id']}'>Delete</a </center>"
        );
}

#debug($data);
$sort_id            = $this->Paginator->sort('id','<span class="glyphicon glyphicon-sort"></span> ID',array('escape' => FALSE) );
$sort_device        = $this->Paginator->sort('device', '<span class="glyphicon glyphicon-sort"></span> Device',array('escape' => FALSE));
$sort_deviceip      = $this->Paginator->sort('deviceip', '<span class="glyphicon glyphicon-sort"></span> IP Address',array('escape' => FALSE));
$sort_devicestatus  = $this->Paginator->sort('devicestatus', '<span class="glyphicon glyphicon-sort"></span> Status',array('escape' => FALSE));

echo $this->Table->tableHeaders( array('', $sort_id, $sort_device, $sort_deviceip, $sort_devicestatus,'Created by', null ) );
echo $this->Table->tableCells( $data );
#echo $this->Table->tableCells( array(
#            array( '1', 'John', 'Doh', '1970-01-01'),
#            array( '2', 'Max', 'Damage', '1980-12-12'),
#            array( '3', 'Jane', 'Cake', '1985-06-06'),
#            ) );


#echo $this->Table->tableFromData( $users, array( 'header' => TRUE ) );

echo $this->Table->end();
} else {
    #echo $create;
}
?>
</form>
