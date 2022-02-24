var currentUrl = window.location.href;
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
setLoader(true);

$(document).ready(function(e){

    // $('select').select2();

    setLoader(false);
    $("#mainModal").modal("hide");
    $(document).on('submit', '.frmStore', function (e) {
        const sortData=[];
        setLoader(true);
        e.preventDefault();
        t = $(this);
        // console.log(t.attr('action'));
        var formData = new FormData(this);
        $.ajax({
            url: t.attr('action'),
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                // console.log(data);
                setModal(false);
                showToast('success', data.message);
                

            },
            error: function (e) {
                showToast('danger', 'Something went wrong please try again');
                var errors = e.responseJSON.data.errors;
                setFormErrors(t.attr("id"), errors);
            },
            complete: function(){
                setLoader(false);
                refreshDashboardActions();

                if ($('.tblGalleryList').length > 0) {
                    listUserGalleries();
                }
                if ($('.tblExhibitionList').length > 0) {
                    listUserExhibition();
                }
                var table=$("#gallery_table").children();
                table.sortable({
                items: 'tr:not(tr:first-child)',
                cursor: 'pointer',
                axis: 'y',
                dropOnEmpty: false,
                start: function (e, ui) {
                    ui.item.addClass("selected");
                },
                stop: function (e, ui) {
                    ui.item.removeClass("selected");
                    $(this).find("tr").each(function (index) {
                          if(index>0){
                            sortData[index-1]=$(this).find("td").eq(8).html();
                        }
                    });
                    $.ajax({
                        type:'GET',
                        url:"gallery/position",
                        data:{sortData:sortData},
                        success:function(res){
                            // alert('success');

                        }
                    });                    
                  
                }
            });

            }
        });
        return false;
    });
    $(document).on('submit', '.frmDelete', function (e) {
        e.preventDefault();
        t = $(this);
        var formData = new FormData(this);
        var delete_section_type = $(this).attr('id');

        Swal.fire({ 
		  title: 'Are you sure you want to delete this ' + delete_section_type + '?',
		  text:'',
		  icon:'warning',
		  showDenyButton: false,
		  showCancelButton: true,
		  confirmButtonColor: 'red',
		  confirmButtonText: 'Delete',
		}).then((result) => {
		  /* Read more about isConfirmed, isDenied below */
		  if (result.isConfirmed) {
		        setLoader(true);
		        $.ajax({
                    url: t.attr('action'),
                    type: "GET",
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) {
                        // console.log(data);
                        // setModal(false);
                        showToast('success', data.message);
                        // getAjaxContent(window.location.href, 'table-content', 'footerPagination', true);
                    },
                    error: function (data) {
                        console.log(data);
                        showToast('danger', 'Something went wrong please try again');
                    },
                    complete: function(){
                        setLoader(false);
                        refreshDashboardActions();
        
                        if ($('.tblGalleryList').length > 0) {
                            listUserGalleries();
                        }
        
                        if ($('.tblExhibitionList').length > 0) {
                            listUserExhibition();
                        }
                    }
                });
                return false;  
		  }
		})
    });

    $(document).on('keyup', '#user_name', function (e) {
        e.preventDefault();
        var val = $(this).val();
        if (val.length > 3) {
            setLoader(true);            
            var fd = new FormData();
            fd.append('user_name', val);
            fd.append('_token', $('meta[name="csrf-token"]').attr("content"));
            $.ajax({
                url: APP_URL + '/check-user-name',
                type: "POST",
                data: fd,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    if (data.status == 'success') {
                        // $('#btnSubmitRegister').removeAttr('disabled');
                        $('.invalid_user_name_feedback').hide();
                    }else{
                        // $('#btnSubmitRegister').attr('disabled','');
                        $('.invalid_user_name_feedback strong').html(data.message);
                        $('.invalid_user_name_feedback').show();
                    }
                },
                error: function (data) {
                    // $('#btnSubmitRegister').attr('disabled','');
                    $('.invalid_user_name_feedback strong').html('name already exits');
                    $('.invalid_user_name_feedback').show();
                },
                complete: function(){
                    setLoader(false);
                }
            });
        }
    });

    $(document).on('click', '#btnDelete', function (e) {
        e.preventDefault();

        if(confirm('This action will delete the profile picture, are you sure ?')){
            setLoader(true);
            t = $(this);
            $.ajax({
                url: t.attr('href'),
                type: "GET",
                success: function (data) {
                    // console.log(data);

                    setModal(false);
                    showToast('success', data.message);
                },
                error: function (data) {
                    console.log(data);
                    showToast('danger', 'Something went wrong please try again');

                },
                complete: function(){
                    setLoader(false);
                    refreshDashboardActions();
                }
            });
        }

        return false;
    });

    $(document).on('click' , '.removePortfolioUrl', function(e){
        e.preventDefault();
        
        Swal.fire({ 
		  title: 'Are you sure want delete this link?',
		  text:'',
		  icon:'warning',
		  showDenyButton: false,
		  showCancelButton: true,
		  confirmButtonColor: 'red',
		  confirmButtonText: 'Delete',
		}).then((result) => {
		  /* Read more about isConfirmed, isDenied below */
		  if (result.isConfirmed) {
		       $(this).parents('.card').remove();
		  }
		})
						
    });
    


    $(document).on('click' , '.imagedownload', function(e){
                $.ajax({
                url: "image-download",
                type: "GET",
                success: function (data) {
                    $('.cvdiv').remove();
                    // console.log(data);

                    // setModal(false);
                    // showToast('success', data.message);
                },
                error: function (data) {
                    console.log(data);
                    showToast('danger', 'Something went wrong please try again');

                },
                complete: function(){
                    setLoader(false);
                    refreshDashboardActions();
                }
            });
            });

    $(document).on('click' , '#deletecv', function(e){
                $.ajax({
                url: "cv/delete",
                type: "GET",
                success: function (data) {
                    $('.cvdiv').remove();
                    // console.log(data);

                    // setModal(false);
                    // showToast('success', data.message);
                },
                error: function (data) {
                    console.log(data);
                    showToast('danger', 'Something went wrong please try again');

                },
                complete: function(){
                    setLoader(false);
                    refreshDashboardActions();
                }
            });



               // 
  
    });

    $(document).on('click' , '.addPortfolioUrl', function(e){
        e.preventDefault();
        var html = '<li><input type="hidden" name="portfolio_url[position][]" id="position"><div class="card mb-3">';
        html += '<div class="card-body">';
        html += '<div class="row">';
        html += ' <div class="col">';
        html += '<div class="input-group">';
        html += '<div class="input-group-prepend">';
        html += '<span class="input-group-text my-handle"><i class="fas fa-arrows-alt"></i></span>';                                   
        html += '</div>';
        html += '<input type="text" class="form-control" placeholder="Enter Title" aria-label="Enter Url" aria-describedby="basic-addon2" name="portfolio_url[title][]" maxlength="35" required>';
        html += '<input type="text" class="form-control" placeholder="yourwebsite.com" aria-label="Enter Url" aria-describedby="basic-addon2" name="portfolio_url[url][]" required>';
        html += '<div class="input-group-append">';
        html += '<button class="btn btn-danger removePortfolioUrl" type="button"><i class="fas fa-trash"></i></button>';       
        html += '</div></div></div></div>';
        html += '</div>';
        html += '</div></li>';
        $('.url_container1').append(html);
    });

    $(document).on('change' , '.featured_url', function(e){
        if ($('.featured_url:checked').length > 4) {
            $(this).prop('checked', false);
            alert("Maximum Upto 4 social urls can be marked as featured.");
        }
    });
});


function setLoader(flag) {
    if (flag) {
        $("#loader").show();
    } else {
        $("#loader").hide();
    }
}

function setFormErrors(frmId, errors) {
    $.each(errors, function (i, v) {
        $("#" + frmId + ' input[name="' + i + '"]').addClass("is-invalid");
        $("#" + frmId + ' select[name="' + i + '"]').addClass("is-invalid");
        $("#" + frmId + " span." + i + "_error").html(v[0]);
    });
}

$(document)
    .on("ajaxStart", function () {
        console.log('ajaxStart');
        setLoader(true);
    })
    .on("ajaxStop", function () {
        console.log('ajaxStop');
        setLoader(false);
    });


function showToast(type = "danger", message = "Empty notification called") {
    Lobibox.notify(type, {
        msg: message,
        sound: false,
        rounded: true,
        closable: false,
        delay: 5000,
        icon: true,
        iconSource: "fontAwesome",
        position: "top center",
    });
}

function editModal(url, title) {
    if (url != "") {
        setModal(false);
        setLoader(true);
        $.ajax({
            url: url,
            type: "GET",
            success: function (data) {
                setModal(true, title, data);
            },
            error: function (data) {
                alert('Something went wrong, please try again');
            },
            complete: function(){
                setLoader(false);
                refreshDashboardActions();
              // $('#sortable').draggable();
              // var el = document.getElementById('sortable');
              // var el = document.getElementById('sortable');
               Sortable.create(sortable, { /* options */ 
                        swapThreshold: 1,// Enable swap plugin
                        ghostClass: 'blue-background-class', // The class applied to the hovered swap item
                        animation: 150,
                        // filter: ".input-group",
                        handle: ".my-handle",
                        // filter: ".form-control",
                        onEnd: function (/**Event*/evt) {
                    $("li").each(function (index) {
                     //alert(index);
                    $(this).find("#liposition").val(index);
                        
                    });
                            }
               });
                 $("li").each(function (index) {
                     //alert(index);
                    $(this).find("#liposition").val(index);
                        
                    });
                  
                // $("#sortable").sortable({
                //   cursor: 'move',
                // axis: 'y',
                // dropOnEmpty: false,
               
                // start: function (e, ui) {
                //     ui.item.addClass("selected");
                // },
                // stop: function (e, ui) {
                //     ui.item.removeClass("selected");
                //     $(this).find("li").each(function (index) {

                //     $(this).find("#position").val(index);
                        
                //     });
     
                // }

                // });
                
                // $("#sortable").sortable();
               //  var e2 = document.getElementById('sortable');
               //   Sortable.create(e2, { /* options */ 
               //          swap: true, // Enable swap plugin
               //          swapClass: 'highlight', // The class applied to the hovered swap item
               //          animation: 150


               // });
                // $('#url_sortable').sortable({
                // cursor: 'pointer',
                // axis: 'y',
                // dropOnEmpty: false,
               
                // start: function (e, ui) {
                //     ui.item.addClass("selected");
                // },
                // stop: function (e, ui) {
                //     ui.item.removeClass("selected");
                //     $(this).find("li").each(function (index) {
                //     $(this).find("#liposition").val(index);
                        
                //     });
     
                // }
                    
                //     });


                          
            }
        });
        return false;
    }
}

function setModal(flag = true, title, content) {
    if (flag) {
        $("#mainModal #mainModalLabel").html(title);
        $("#mainModal .modal-content").html(content);
        $("#mainModal").modal("show");
    } else {
        $("#mainModal #mainModalLabel").html("");
        $("#mainModal .modal-body").html("");
        $("#mainModal").modal("hide");
    }
}

function refreshDashboardActions(){
    setLoader(true);
    var url = APP_URL + "/me/dashboard/ajax";
    $.ajax({
        url: url,
        type: "GET",
        success: function (data) {
            $('.actions-container').html(data);
        },
        error: function (data) {
            alert('Something went wrong, please try again');
        },
        complete: function(){
            setLoader(false);
        }
    });
}
function listUserGalleries() {
    setLoader(true);
    var url = APP_URL + "/me/gallery";
    $.ajax({
        url: url,
        type: "GET",
        success: function (data) {
            $('.tblGalleryList').html(data);
        },
        error: function (data) {
            alert('Something went wrong, please try again');
        },
        complete: function(){
            setLoader(false);
        }
    });
}
function listUserExhibition() {
    var type = $('#exhibitionType').val();
    setLoader(true);
    var url = APP_URL + "/me/exhibitions/";
    $.ajax({
        url: url,
        type: "GET",
        success: function (data) {
            $('.tblExhibitionList').html(data);
        },
        error: function (data) {
            alert('Something went wrong, please try again');
        },
        complete: function(){
            setLoader(false);
        }
    });
}
$("#search_user_exhibition").submit(function(e){
    e.preventDefault();
    $.ajax({
        type:'GET',
        url:"exhibitions/search",
        data:$("#search_user_exhibition").serialize(),
        success:function(data){

             $('.tblExhibitionList').html(data);
         },
        error: function (data) {
            alert('Something went wrong, please try again');
        },
        complete: function(){
            setLoader(false);
        }
    });
});
 function preview_image(event)
{  
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}


$(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic1').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
        $("form#profile_image_form").submit();
    });
    
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });

    function selectchange()
    {
        alert('hi');
        $("#type_of_artist").change();
    }


});


