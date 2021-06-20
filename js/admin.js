$(function () {
    $.browser = "";
    
    $("#adminDialog").dialog({
      autoOpen: false,
      width: 780,
      height: 550,
      modal: true,
      buttons: {
        "Grabar": save,
        "Cancelar": cancel
      }
    });

    $("#adminAddDialog").dialog({
      autoOpen: false,
      width: 600,
      height: 400,
      modal: true,
      buttons: {
        "Grabar": add,
        "Borrar": del,
        "Cancelar": cancelAdd
      }
    });

    $("#loginDialog").dialog({
      autoOpen: false,
      width: 400,
      height: 400,
      modal: true,
      buttons: {
        "Ingresar": ingresar,
        "Cancelar": cancelLogin
      }
    });
    $("#loginform").submit(function( event ) {
        ingresar();
        event.preventDefault();
    })

	$("#admin").click(function() {
	    $("#editContent").htmlarea('html', $("#content").html());
        $("#adminDialog").dialog("open");
    });     
    $("#adminAdd").click(function() {
        var pagina = getHash();
        $('.ui-dialog-title').text('Agregar '+pagina);
        $('.fileinput-button').show();
        $('#progress').show();
		$('#titulo').val("");
    	$('#lugar').val("");
    	$('#fecha').val("");
		$('#file').text("");
		$('#progress .bar').css('width', '0%');
		$('.ui-button:contains(Borrar)').hide();
        $("#adminAddDialog").dialog("open");
    });  	
    $("#loginLink").click(function() {
        $("#loginDialog").dialog("open");
    });  

});

function addEditHandlers() {
	$(".adminEdit").click(function(event) {
		var target = $( event.target );
		var childrens = target.parent().parent().children();
        $('.ui-dialog-title').text('Editar '+childrens.eq(0).text().replace(/\"/g, ""));
        $('.fileinput-button').hide();
        $('#progress').hide();
		$('#titulo').val(childrens.eq(0).text().replace(/\"/g, ""));
    	$('#lugar').val(childrens.eq(1).text());
    	$('#fecha').val(childrens.eq(2).text());
        var pagina = window.location.hash.replace("#", "");
		$('#file').text(childrens.eq(3).attr("href").replace('descargas/'+pagina+'/',''));
		$('#progress .bar').css('width', '0%');
		$('.ui-button:contains(Borrar)').show();
        $("#adminAddDialog").dialog("open");
    }); 
	
	var pagina = getHash();
    var url = 'descargas/'+pagina+'/';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('#file').text(file.name);
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .bar').css('width', progress + '%');
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');

}

function cancel() {
    $("#editContent").htmlarea('html', $("#content").html());
    $("#adminDialog").dialog("close");
}

function save() {
    var html = $("#editContent").htmlarea("html");
    $.ajax({
        type: "POST",
        url: ".",
		data: {"data":html, "pagina":getHash()},
        context: document.body
    }).done(function(data) {
        if (data === "true") {
			updatePage();
            $("#adminDialog").dialog("close");
        } else {
            window.alert(data);
            cancel();            
        }
    });
}

function cancelAdd() {
    $("#adminAddDialog").dialog("close");
}

function add() {
    var archivo = $('#file').text();
    var titulo = $('#titulo').val();
    var lugar = $('#lugar').val();
    var fecha = $('#fecha').val();
	if (archivo === "") {
		alert("Primero tiene que agregar el documento");
	} else {
		$.ajax({
			type: "POST",
			url: ".",
			data: {"archivo":archivo, "titulo":titulo, "lugar":lugar, "fecha":fecha, "pagina":getHash()},
			context: document.body
		}).done(function(data) {
			if (data === "true") {
				$("#adminAddDialog").dialog("close");
				updatePage();
			} else {
				window.alert(data);
				cancel();            
			}
		});
	}
}

function del() {
    var archivo = $('#file').text();
	if (archivo === "") {
		alert("Primero tiene que agregar el documento");
	} else {
		$.ajax({
			type: "POST",
			url: ".",
			data: {"delete":true, "archivo":archivo, "pagina":getHash()},
			context: document.body
		}).done(function(data) {
			if (data === "true") {
				$("#adminAddDialog").dialog("close");
				updatePage();
			} else {
				window.alert(data);
				cancel();            
			}
		});
	}
}

function cancelLogin() {
    $("#loginDialog").dialog("close");
}


function ingresar() {
	var user = $('#username').val();
    var pass = $('#password').val();

    $.ajax({
        type: "POST",
        url: ".",
		data: {"user":user, "pass":pass},
		context: document.body
    }).done(function(data) {
        if (data === "true") {
            $("#loginDialog").dialog("close");
			location.reload();
        } else {
            $("#error").text(data);
            cancel();            
        }
    });
}

