<div class="box box-primary">
                <div class="box-header">
                    <div class="box-title"> <button class="btn btn-sm btn-primary " id="window-add-open"><i class="fa fa-plus"></i></button> Users Data  </div>
                </div>
                <div class="box-body">
                
        
<div class="row">
     <div class="col-md-12">  <br>
      </div>
     <div class="col-md-12"> 
        <?php
            require_once 'page.user.create.php'

        ?>

     </div>
</div>
   
   <div id="tableuser"></div>
   </div>
            </div>
<script>

   $(document).ready(function() {     
    
        var DS = dataSource("users","json.users.list", 10);

        $("#tableuser").kendoGrid({
            dataSource: DS,  
            autoBind: false,
            pageable: true,
            height: 400,
            columns: [
                { field: "user_id", title: "user_id", hidden: true },
                { field: "user_fullname", title: "Fullname" },
                { field: "user_email", title: "Email" },
                { field: "user_username", title: "Username" },
                {
                 command: [{
                     name: 'edit', click: edit, template: '<div class="btn-group">' +
                         '<a class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i>' +
                         'Action<span class="caret"></span></a>' +
                         '<ul class="dropdown-menu" style="top: 70%">' +
                         '<li><a class="k-grid-edit" id="btn-edit"><i class="fa fa-pencil"></i> Edit</a></li>'
                 },
                  { name: 'delrow', click: destroy, template: '<li><a class="k-grid-delrow" id="btn-delete"><i class="fa fa-trash"></i> Delete</a></li></ul></div>' }], title: 'Actions'
                }
            ]
        });
        
        DS.read()

      var addvalidator = $("#addvalidator").kendoValidator().data("kendoValidator");
      
      var modaladd = $("#modal-add");

      $("#window-add-open").click(function () {
         $("span.k-tooltip-validation").hide();
         modaladd.modal("show");
      });

      $("#btn-post").on("click", function (e) {
            e.preventDefault();
            if (addvalidator.validate() === false) {
                return false;
            }
            
            runJsonPost("users", "json.users.add", {
                user_id      : $("#user_id").val(),
                user_fullname: $("#user_fullname").val(),
                user_password: $("#user_password").val(),
                user_username: $("#user_username").val(),
                user_email: $("#user_email").val(),
            }, function onSuccess(response) {

                modaladd.modal("hide");
                DS.read()
                clear();

            }, function onError(result) {

            });

        });

      function clear(){
        $("#user_fullname").val(null)
        $("#user_password").val(null)
        $("#user_username").val(null)
        $("#user_email").val(null)
      }

      function edit(e) {
        e.preventDefault ? e.preventDefault() : e.returnValue = false;
        $("span.k-tooltip-validation").hide();
        var grid = this;
        var row = $(e.currentTarget).closest("tr");
        var selectedItem = grid.dataItem(row);
        
        runJsonPost("users", "json.users.getbyid", {
            user_id: selectedItem.user_id
        }, function onSuccess(response){
            
            var result = response[0]

            $("#user_id").val(result.user_id)
            $("#user_fullname").val(result.user_fullname)
            $("#user_email").val(result.user_email)
            $("#user_username").val(result.user_username)

        }, function onError(err){

        })

        modaladd.modal("show")
      }

      function destroy(e) {
        e.preventDefault ? e.preventDefault() : e.returnValue = false;
        var grid = this;
        var row = $(e.currentTarget).closest("tr");
        var selectedItem = grid.dataItem(row);


      }
      

   });
</script>