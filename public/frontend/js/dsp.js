$((function(){$("#solution_type").on("change",(function(){"Product"===$(this).val()?$("#has-api-div").removeClass("hide").slideDown():$("#has-api-div").addClass("hide").slideUp()})),$('input[name="has_api"]').on("change",(function(){"1"===$(this).val()?$("#api-description").removeClass("hide").slideDown():$("#api-description").addClass("hide").slideUp()})),$("#addProjectButton").on("click",(function(){$("#projectId").val(0),$("#addAddProjectModal").modal()})),$(".js-edit").on("click",(function(){$("#projectId").val($(this).data("id")),$("#project_name").val($(this).data("name")),$("#client_name").val($(this).data("client_name")),$("#project_description").val($(this).data("description")),$("#start_date").val($(this).data("start_date")),$("#end_date").val($(this).data("end_date")),$("#addAddProjectModal").modal()})),$("#addSolutionButton").on("click",(function(){$("#solutionId").val(0),$("#addAddSolutionModal").modal()})),$(".js-edit-solution").on("click",(function(){$("#solutionId").val($(this).data("id"));var a=$("#solution_type");a.val($(this).data("type")),$("#solution_name").val($(this).data("name")),$("#solution_description").val($(this).data("description")),$("#api_name").val($(this).data("api_name")),$("#api_link").val($(this).data("api_link")),$("#api_description").val($(this).data("api_description")),$("#cp_name").val($(this).data("cp_name")),$("#cp_email").val($(this).data("cp_email")),$("#cp_phone").val($(this).data("cp_phone"));var i=$(this).data("has_api"),t=$(":radio[name='has_api']");$.each(t,(function(a,t){parseInt($(t).val())===parseInt(i)&&$(t).prop("checked",!0)})),1===i?$("#api-description").removeClass("hide").slideDown():$("#api-description").addClass("hide").slideUp(),$("#addAddSolutionModal").modal(),a.trigger("change")})),$("#formSaveProject").on("submit",(function(a){a.preventDefault();var i=$(this),t=i.find(":submit");if(i.valid()){t.addClass("spinner spinner-right spinner-white").prop("disabled",!0);var n=i.serializeArray();n.push({name:"application_id",value:$("#application_id").val()}),$.ajax({url:i.attr("action"),method:i.attr("method"),data:n,completed:function(a){},success:function(a){location.reload()},error:function(a){t.removeClass("spinner spinner-right spinner-white").prop("disabled",!1)}})}}));var a=$("#formSaveSolution");a.validate(),a.on("submit",(function(a){a.preventDefault();var i=$(this),t=i.find(":submit");if(i.valid()){t.addClass("spinner spinner-right spinner-white").prop("disabled",!0);var n=new FormData(this);n.append("application_id",$("#application_id").val()),$.ajax({url:i.attr("action"),method:i.attr("method"),data:n,dataType:"json",cache:!1,contentType:!1,processData:!1,completed:function(a){},success:function(a){location.reload()},error:function(a){showErrors(a),t.removeClass("spinner spinner-right spinner-white").prop("disabled",!1)}})}})),$("#province_id").on("change",(function(){$(this).val()&&function(a,i){if(a){var t=$("#district_id");t.empty(),t.append("<option value=''>CHOOSE</option>"),$.getJSON("/districts/"+a).done((function(a){a.forEach((function(a){t.append("<option value='"+a.id+"' >"+a.name+"</option>")})),t.val(i)}))}}($(this).val(),null)})),$("#district_id").on("change",(function(){$(this).val()&&function(a,i){if(a){var t=$("#sector_id");t.empty(),t.append('<option value="">CHOOSE</option>'),$.getJSON("/sectors/"+a,(function(a){$.each(a,(function(a,i){t.append('<option value="'+i.id+'">'+i.name+"</option>")})),t.val(i)}))}}($(this).val(),null)})),$("#sector_id").on("change",(function(){var a,i;$(this).val()&&(a=$(this).val(),i=null,a&&$.getJSON("/cells/"+a,(function(a){var t=$("#cell_id");t.empty(),t.append('<option value="">CHOOSE</option>'),$.each(a,(function(a,i){t.append('<option value="'+i.id+'">'+i.name+"</option>")})),t.val(i)})))})),$("#cell_id").on("change",(function(){var a,i;$(this).val()&&(a=$(this).val(),i=null,a&&$.getJSON("/villages/"+a,(function(a){var t=$("#village_id");t.empty(),t.append('<option value="">CHOOSE</option>'),$.each(a,(function(a,i){t.append('<option value="'+i.id+'">'+i.name+"</option>")})),t.val(i)})))}))}));
//# sourceMappingURL=dsp.js.map