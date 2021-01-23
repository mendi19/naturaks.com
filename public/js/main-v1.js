function validateforms(formid,classinput,ajaxfuntiontype,pathtoajax,redirectto,submit_button_class,display_errorid,submit_button_text,swal_or_no){
    $(formid).validate({
        submit: {
            settings: {
                inputContainer: '.form-group',
                scrollToError:true
            },
     
            callback: {
                onSubmit: function (node, formData) {
                      /*
                              swal_or_no
                              0  - no swal - redirect only
                              1  - swal yes
                              2  - no swal - show normal response in error DIV ID
                              3 - Swal yes with DELETE DIV
                              4 - NO Swal with DELETE DIV
                      */
                      if(ajaxfuntiontype == "global_call"){
                          globalajaxcall_v1(pathtoajax,formid,redirectto,submit_button_class,display_errorid,submit_button_text,swal_or_no);
                      }                      
                }
            }
        },
        dynamic: {
            settings: {
                trigger: 'focusout'
            },
            callback: {
                onSuccess: function (node, input, keyCode) {
                    if ($(input).val()) {
                        $(input).parent().find('.form-label').removeClass('red').addClass('green');
                    }
                },
                onError: function (node, input, keyCode, error) {
                    $(input).parent().find('.form-label').removeClass('green');
                }
            }
        }   
    });
}


function loadingbutton(display_errorid,submit_button_class){
          $(display_errorid).html('');
          $(submit_button_class).attr("disabled", true);
          $(submit_button_class).html("<i class='fa fa-spinner fa-spin'></i> Loading");
}
function globalajaxcall_v1(pathtoajax,formid,redirectto,submit_button_class,display_errorid,submit_button_text,swal_or_no){
     var token     = $("meta[name=csrf-token]").attr("content"),
      api_token = $("meta[name=api-token]").attr("content"),
                    data = new FormData(),
                    arr = $(formid).serializeArray(),
                    cartcheckout = 0,
                    errors={};

              //console.log(arr);
          for(i in arr){
            data.append(arr[i]['name'],arr[i]['value']);
            if(arr[i]['name'] == 'idscart'){
              cartcheckout = 1;
            }

            if(arr[i]['name'] == 'payment_method'){
              if(arr[i]['value'] == 1){
                cartcheckout = 0;
              }
            }
          }

        

          data.append('_token',token);
          
          var dataM = new FormData($(formid)[0]);
          dataM.append('api_token',api_token);

         if(typeof CKEDITOR != 'undefined'){
            if(CKEDITOR.instances.editor1){
               var editorData = CKEDITOR.instances.editor1.getData() || '';
               dataM.append('editorData',editorData);
            }
            
            if(CKEDITOR.instances.editor2){
               var editor2 = CKEDITOR.instances.editor2.getData() || '';
               dataM.append('editor2',editor2);
            }

            if(CKEDITOR.instances.editor3){
               var editor3 = CKEDITOR.instances.editor3.getData() || '';
               dataM.append('editor3',editor3);
            }
         
            if(CKEDITOR.instances.editor4){
               var editor4 = CKEDITOR.instances.editor4.getData() || '';
               dataM.append('editor4',editor4);
            }

           }
         
          
          loadingbutton(display_errorid,submit_button_class);
         $.ajax({
                type: 'POST',
                url: pathtoajax,
                data: dataM,
                cache: false,
                dataType : 'json',   
                contentType: false,
                processData: false,
                enctype: 'multipart/form-data',
                headers:{'X-CSRF-Token': token},
                success: function(response) {
                    if(response.msg == 'error'){
                            showerrormessage(response.message,'danger',0,4000,display_errorid);
                            $(submit_button_class).attr("disabled", false);
                            $(submit_button_class).html(submit_button_text);

                    }else{
                       if(cartcheckout == 1){
                          if (sessionStorage.cart){
                           sessionStorage.removeItem('cart');
                          }
                       }
                    
                    if(swal_or_no == 1 || swal_or_no == 3)
                        {
                            if(swal_or_no == 3){
                              $(formid).addClass('hidden');
                            }
                            swal({
                                          title: "Great",
                                          text: unescapeHtml(response.message),
                                          type: "success",
                                          showCancelButton: false,
                                          confirmButtonClass: "btn-success",
                                          confirmButtonText: "Ok",
                                          closeOnConfirm: false,
                                          closeOnCancel: false
                                        },
                                        function(isConfirm) {
                                          if (isConfirm) {
                                                  if(redirectto != "" && redirectto != undefined){
                                                      var redr =redirectto.replace("&amp;", "&");
                                                       window.location = redr;
                                                  }else{
                                                       location.reload();
                                                  }
                                                 
                                          }
                                        }
                                 );
                      }
                      else if(swal_or_no == 0)
                      {
                            if(response.redlinklogin && response.redlinklogin != ''){
                                  window.location = response.redlinklogin;
                            }else{
                               if(redirectto != "" && redirectto != undefined){
                                          var redr = redirectto.replace("amp;","");
                                                           window.location = redr;
                                }else{
                                    if(response.redlink && response.redlink != ''){
                                        window.location = response.redlink;
                                    }else{
                                      location.reload();
                                    }
                                }
                            }
                      }else{
                            showerrormessage(response.message,'success',0,4000,display_errorid);
                      }
                    }
                },
                error: function(response) {
                  console.log("ERROR=");
                  var errors={};
                  console.log(response.responseJSON);
                  this.errors = response.responseJSON.errors;
                  var makeerror = "";
                  $.each( this.errors, function( key, value ) {
                    makeerror+= value+"<br>";
                  });

                  $.each( response.responseJSON, function( key, value ) {
                            makeerror+= value+"<br>";
                  });
                    
                     if(response.responseJSON.message){
                          makeerror = response.responseJSON.message;
                    }

                    if(response.responseJSON.errors){
                      var  makeerror ='';
                       $.each( response.responseJSON.errors, function( key, value ) {
                         makeerror += value +"<br>";
                       });
                    }
                    //console.log(makeerror);
                   showerrormessage(makeerror,'error',0,14000,display_errorid);
                   $(submit_button_class).attr("disabled", false);
                   $(submit_button_class).html(submit_button_text);
                }
            });
}


function showerrormessage(message,classtype,appendorno,timetohideerror,display_errorid){
  if(appendorno == 0){
      $(display_errorid).html("<div class='alert-v2 alert-v2-"+classtype+"' style='100%'>"+message+"</div>");
  }else{
      $(display_errorid).append("<div class='alert-v2 alert-v2-"+classtype+"' style='100%'>"+message+"</div>");
  }

  $(display_errorid).fadeTo(timetohideerror, 500).slideUp(500, function(){
      $(display_errorid).slideUp(500);
  }); 
}


function validateforms_direct(formid,divid,pathtoajax,redirectto,submit_button_class,display_errorid,submit_button_text,swal_or_no){
     var token     = $("meta[name=csrf-token]").attr("content"),
      api_token = $("meta[name=api-token]").attr("content"),
                    data = new FormData(),
                    arr = $(formid).serializeArray(),
                    cartcheckout = 0;

              console.log(arr);
          for(i in arr){
            data.append(arr[i]['name'],arr[i]['value']);
            if(arr[i]['name'] == 'idscart2'){
              cartcheckout = 1;
            }

            if(arr[i]['name'] == 'payment_method'){
              if(arr[i]['value'] == 1){
                cartcheckout = 0;
              }
            }
            
          }

          data.append('_token',token);
          var dataM = new FormData($(formid)[0]);
          dataM.append('api_token',api_token);
          loadingbutton(display_errorid,submit_button_class);
         $.ajax({
                type: 'POST',
                url: pathtoajax,
                data: dataM,
                cache: false,
                dataType : 'json',   
                contentType: false,
                processData: false,
                enctype: 'multipart/form-data',
                headers:{'X-CSRF-Token': token},
                success: function(response) {
                    if(response.msg == 'error'){
                            showerrormessage(response.message,'danger',0,4000,display_errorid);
                            $(submit_button_class).attr("disabled", false);
                            $(submit_button_class).html(submit_button_text);

                    }else{
                       if(cartcheckout == 1){
                          if (localStorage.cart){
                           localStorage.removeItem('cart');
                          }
                       }
                    
                    if(swal_or_no == 1 || swal_or_no == 3)
                        {
                            if(swal_or_no == 3){
                              $(divid).addClass('hidden');
                            }
                            swal({
                                          title: "Great",
                                          text: response.message,
                                          type: "success",
                                          showCancelButton: false,
                                          confirmButtonClass: "btn-success",
                                          confirmButtonText: "Ok",
                                          closeOnConfirm: false,
                                          closeOnCancel: false
                                        },
                                        function(isConfirm) {
                                          if (isConfirm) {
                                                  if(redirectto != "" && redirectto != undefined){
                                                      var redr =redirectto.replace("&amp;", "&");
                                                       window.location = redr;
                                                  }else{
                                                       location.reload();
                                                  }
                                                 
                                          }
                                        }
                                 );
                      }
                      else if(swal_or_no == 0)
                      {
                            if(response.redlinklogin && response.redlinklogin != ''){
                                  window.location = response.redlinklogin;
                            }else{
                               if(redirectto != "" && redirectto != undefined){
                                          var redr = redirectto.replace("amp;","");
                                                           window.location = redr;
                                }else{
                                    if(response.redlink && response.redlink != ''){
                                        window.location = response.redlink;
                                    }else{
                                      location.reload();
                                    }
                                }
                            }
                      }else{
                            showerrormessage(response.message,'success',0,4000,display_errorid);
                      }
                    }
                },
                error: function(response) {
                }
            });
}






function deleteOptionW(ID_DATA,pathtoajax,redirectto,submit_button_class,display_errorid,submit_button_text,swal_or_no,removeDIV){
       var id = ID_DATA;
       var token     = $("meta[name=csrf-token]").attr("content"),
        api_token = $("meta[name=api-token]").attr("content"),
           data = new FormData(),
           errors = {};
           data.append('request_type','ajax');
           data.append('_token',token);
           data.append('id',ID_DATA);

           data.append('api_token',api_token);

       
        swal({
              title: "Are you sure?",
              text: "You will not be able to recover this!",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Yes, do it!",
              cancelButtonText: "No, cancel pls!",
              closeOnConfirm: false,
              closeOnCancel: false
            },
            function(isConfirm) {
              if (isConfirm) {
                 loadingbutton(display_errorid,submit_button_class);
                 $.ajax({
                        type: 'POST',
                        url: pathtoajax,
                        data: data,
                        cache: false,
                        dataType : 'json',   
                        contentType: false,
                        processData: false,
                        enctype: 'multipart/form-data',
                        headers:{'X-CSRF-Token': token},
                        success: function(response) {
                          swal(response.msg,response.message,response.msg);
                          if(response.msg == 'success'){
                            $(removeDIV).remove();
                             if(swal_or_no == 100){
                               location.reload();
                             }
                          }
                        },
                      error: function(response) {
                         swal.close();
                       //   swal(response.msg,response.message,response.msg);
                          this.errors = response.responseJSON.errors;
                          var makeerror = "";
                          $.each( this.errors, function( key, value ) {
                            makeerror+= value+"<br>";
                          });
                          //console.log(response.responseJSON);
                          $.each( response.responseJSON, function( key, value ) {
                             makeerror = value+"<br>";
                          });
                           if(response.responseJSON.message){
                                 makeerror = response.responseJSON.message;
                            }

                           showerrormessage(makeerror,'error',0,5000,display_errorid);
                           $(submit_button_class).attr("disabled", false);
                           $(submit_button_class).html(submit_button_text);
                        }
                    });
              } else {
                swal({
                  title: "Cancelled",
                  text: "Your data is safe :)",
                  type: "error",
                  confirmButtonClass: "btn-danger"
                });
              }
            });


}

function filldropdownbasedon(pathtoajax,id,selectid,returnDataType,firstOPtion){
   var token     = $("meta[name=csrf-token]").attr("content"),
       api_token = $("meta[name=api-token]").attr("content"),
       data = new FormData();
 
       data.append('_token',token);
       data.append('api_token',api_token);        
       data.append('id',id);      
       $.ajax({
                type: 'POST',
                url: pathtoajax,
                data: data,
                cache: false,
                dataType : 'json',   
                contentType: false,
                processData: false,
                enctype: 'multipart/form-data',
                headers:{'X-CSRF-Token': token},
                success: function(response) {
                  if(response.msg == 'success'){
                    var makeoptions=firstOPtion;
                    $.each(response.data,function(index,value){
                        var valName = "";
                        if(returnDataType == 'city'){valName = value['name'];}
                        if(returnDataType == 'user'){valName = value['name'];}
                        makeoptions += "<option value='"+value['id']+"'>"+valName+"</option>";
                    });

                    $(selectid).html(makeoptions);
                  }
                },
                error: function(response) {
                  console.log(response.responseJSON.errors);
                }
            });
}

$.fn.digits = function(){ 
    return this.each(function(){ 
        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") ); 
    })
}

     function unescapeHtml(safe) {
    return safe.replace(/&amp;/g, '&')
        .replace(/&lt;/g, '<')
        .replace(/&gt;/g, '>')
        .replace(/&quot;/g, '"')
        .replace(/&#039;/g, "'");
}