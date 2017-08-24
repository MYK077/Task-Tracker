//create a function to run build multiple-times

function build(mode){

	$('#log').load('log.php?mode='+mode);

	tally();

}

function tally(){

	$('#tally').load('log.php?mode=tally');
}


$(document).ready(function(){

	build('build');

	setInterval(function(){
		
		build('build');

	}, 30000);

	//Restore
   
   $('#btn-mode').on('click', function(event){
     
     event.preventDefault();

     var mode = $(this).data('mode');

     if(mode == 'restore'){ 

        build('restore');

        $('#label').html('Live');
        $(this).data('mode','live');
     }

     else{ 

        build('build');
        $('#label').html('Restore');
        $(this).data('mode','restore');
     }	

   });

  //Submit Task
  $("#form-new").submit(function(e){

     e.preventDefault();
     
     var form = $(this);

     var task = $('#task').val();

     var data = form.serialize();

     //console.log(task);


     

     $.ajax({
  //type: 'POST',

  url: 'log.php?mode=new',
  data: data,
  dataType: 'json',

  //if the file was loaded successfully we could do other things with it

  success: function(){
   // console.log(data);
   // console.log('build');    
    build('build');

  } 
   
  });

  });
   
    //REMOVE Task
    $('#log').on('click', '.btn-remove', function(){

   	//this will grab the data id attribute

   	 var id = $(this).data('id');
     
     $.ajax({
        
        url:'log.php?mode=remove&id='+id,
        //if successful go ahead and rebuild
        success: function(){

        	build('build');
        }

      });

   });

    //STOP task
   $('#log').on('click', '.btn-stop', function(){

   	//this will grab the data id attribute

   	 var id = $(this).data('id');

   	 // var buttonId = $(this).data('id');
     // console.log(buttonId);
    
     // $(this).prop('disabled',true);
        
     // $(this).submit(false);


     
     $.ajax({
        
        url:'log.php?mode=stop&id='+id,
        //if successful go ahead and rebuild
        success: function(){

        	 build('build');
        }

      });

   });
     
    //Reactivate-task 
    $('#log').on('click', '.btn-restore', function(){

   	//this will grab the data id attribute

   	 var id = $(this).data('id');
     
     $.ajax({
        
        url:'log.php?mode=reactivate&id='+id,
        //if successful go ahead and rebuild
        success: function(){

        	build('restore');
        }

      });

   });
   
        
   
});
