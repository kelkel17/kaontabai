         $(document).ready(function(){
                $('#search').keyup(function(){
                     var txt = $(this).val();
                     
                      if(txt == ''){
                          $('#map').show();
                      } else{
                     //   $('#result').html('');
                     $('#map').hide();
                                                 var dataString = "search="+txt;
                                                 console.log(dataString);
                        $.ajax({
                            url: "../../Controller/CustomersController/search.php",
                            method: "post",
                            data: dataString,
                            dataType:"text",
                            success:function(data){
                              if(data == 'Data not Found'){
                                  $('#result').html('');
                              }else{
                                   $('#result').html(data);
                              }
                            },
                        });
                     }
                    });
                 });

     for(var j = 0; j < 2; j++){
                if(j == 0){
                document.getElementById('div'+j).style.display = '';
                 console.log(j);
                }else{
               document.getElementById('div'+j).style.display = 'none';
                console.log(j);
                }
            }
            var opt = document.getElementById('filter');
            opt.onchange = function(){
                //document.getElementById('div0').style.display = 'none';
                for(var i = 0; i < 2; i++){
                   // alert(i);
                document.getElementById('div'+i).style.display = 'none';
                }
                document.getElementById('div'+ this.value).style.display = '';
            }
    

