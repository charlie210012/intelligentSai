$('#ownTransfer').submit(function (e) { 
    e.preventDefault();
    var datos = $(this).serialize();
    $.ajax({
        type: "POST",
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        url:  '/transaction',
        data: datos,
        success: function(r){
            console.log(r);
            $('#ownModal').modal('hide');
            if(r['status']=="Error"){
                Swal.fire({        
                title: '¡Atención!',
                text: r['mensaje'], 
                icon: 'error',
                }).then((result)=>{
                    $('#ownModal').modal('show');
                });
            }else{
                Swal.fire({        
                title: '¡Felicidades!',
                text: r['mensaje'],
                icon: 'success',
                 }).then((result) =>{
                        location.reload();
                 });
                    
            }
            
            
        }
        
    })
    return false

});

$('#otherTransfer').submit(function (e) { 
    e.preventDefault();
    var datos = $(this).serialize();
    $.ajax({
        type: "POST",
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        url:  '/transaction',
        data: datos,
        success: function(r){
            $('#otherModal').modal('hide');
            if(r['status']=="Error"){
                Swal.fire({        
                title: '¡Atención!',
                text: r['mensaje'], 
                icon: 'error',
                }).then((result)=>{
                    $('#otherModal').modal('show');
                });
            }else{
                Swal.fire({        
                title: '¡Felicidades!',
                text: r['mensaje'],
                icon: 'success',
                 }).then((result) =>{
                        location.reload();
                 });
                    
            }
            
            
        }
        
    })
    return false

});

$('#registerOther').submit(function (e) { 
    e.preventDefault();
    var datos = $(this).serialize();
    $.ajax({
        type: "POST",
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        url:  '/registerAccount',
        data: datos,
        success: function(r){
            $('#registerOtherModal').modal('hide');
            if(r['status']=="Error"){
                Swal.fire({        
                title: '¡Atención!',
                text: r['mensaje'], 
                icon: 'error',
                }).then((result)=>{
                    $('#registerOtherModal').modal('show');
                });
            }else{
                Swal.fire({        
                title: '¡Felicidades!',
                text: r['mensaje'],
                icon: 'success',
                 }).then((result) =>{
                        location.reload();
                 });
                    
            }
            
            
        }
        
    })
    return false

});

function reports(){
    id = document.getElementById('account_report').value;

    if(id!==0){
        document.getElementById("reportTable").style.display = "block";
    }else{
        document.getElementById("reportTable").style.display = "none";
    }

    $.ajax({
        type:'GET',
        url: "/report/"+id,
        data:id,
        success: function(r){
            console.log(r)
            $('#transactions').DataTable({
                "language":{
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                    },
                destroy: true,
                "aaData" : r,
                "columns": [
                    {"data": "fecha"},
                    {"data": "cuenta_origen"},
                    {"data": "cuenta_destino"},
                    {"data": "valor"},
                    {"data": "Tipo_transaccion"}
                ],
            });       
                
        }
    });
}

 
